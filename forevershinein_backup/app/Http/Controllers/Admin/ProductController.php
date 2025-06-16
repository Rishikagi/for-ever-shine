<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Variantproduct;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
		
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	 
	 
    public function add(Request $request){

		if($request->isMethod('post')){
			
			$rules=[
				'id'=>'numeric|required',
				'category_id'=>'numeric|required',
				'variant_id'=>'required',
				'name'=>'string|required|unique:products,name,'.$request->post('id'),
				'short_description'=>'required',
				'description'=>'required',
			];
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()){
				$message = "";
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				}
				
				return response(array('message'=>$message),403);
				
			}else{
				
				$chkAlreadyExistName=Product::where([
													['name','=',$request->post('name')],
													['category_id','=',$request->post('category_id')],
													['recyclebin_status','=','0'],
													['id','!=',$request->post('id')]
													])->first();
				
				if($chkAlreadyExistName){
					
					return response(array('message'=>"Product name already exist with this selected category."),403);
					
				}else{
					
					try{
						if((int) $request->post('id')>0){
							
							$product=Product::find($request->post('id'));
						}else{
							
							$product=new Product();
						
						}
						
						$variants=$request->post('variant_id');
						sort($variants);
						
						$product->category_id=$request->post('category_id');
						$product->variant_id=implode(',',$variants);
						$product->name=$request->post('name');
						$product->short_description=$request->post('short_description');
						$product->description=$request->post('description');
						$product->sort_order=$request->post('sort_order');
						
						$product->save();
						
						if((int) $request->post('id')>0){
							
							return response(array('message'=>'Product updated successfully.','reset'=>false),200);
						}else{
							
							return response(array('message'=>'Product added successfully.','reset'=>true,'product_addattribute_url'=>url('admin/catalog/product/add-variant-product/'.$product->id),'product_attribute'=>true),200);
						
						}
					}catch (\Exception $e){
				
						return response(array("message" => $e->getMessage()),403); 
					
					}
					 
				}
			}
			 
			return response(array('message'=>'Data not found.'),403);
		}
		$artisan=\App\Models\ArtisiansInfo::where('recyclebin_status','0')->where('status','1')->orderBy('name','ASC')->get();

		$category=\App\Models\Category::where('recyclebin_status','0')->where('status','1')->orderBy('name','ASC')->get();
		$variants=\App\Models\Variant::where('status','1')->orderBy('sort_order','ASC')->get();
		$result=[];
        return view('admin.catalog.product.add',compact('category','result','variants','artisan'));
    }
	
	public function productList(Request $request){
		
		$query=Product::where('recyclebin_status','0')->orderBy('id','DESC');
		
		$type="";
		$cate="";
		if($request->isMethod('post')){

			if(isset($request->category_id)){
				$query=$query->where('category_id',$request->category_id);
				$cate = $request->category_id;
			}

			if($request->type == '1'){

				$query=$query->where('status','1');

				$type="1";
		 	}elseif($request->type == '0'){
	
				$query=$query->where('status','0');
				$type="0"; 
		 	}

		}

		$result=$query->get();
		$category=\App\Models\Category::where('recyclebin_status','0')->where('status','1')->orderBy('name','ASC')->get();
		
		return view('admin.catalog.product.list',compact('result','type','category','cate'));
	}
	
	public function updateProduct(Request $request,$id){
		
		$result=Product::find($id);
		
		if($result){
			
			$artisan=\App\Models\ArtisiansInfo::where('recyclebin_status','0')->where('status','1')->orderBy('name','ASC')->get();
			$category=\App\Models\Category::where('recyclebin_status','0')->where('status','1')->orderBy('name','ASC')->get();
			$variants=\App\Models\Variant::where('status','1')->orderBy('sort_order','ASC')->get();
			return view('admin.catalog.product.add',compact('category','result','variants','artisan'));
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function deleteProduct(Request $request,$id){
		
		$result=Product::find($id);
		
		if($result){
			
			$category=Product::where('id',$id)->update(['recyclebin_status'=>'1','recyclebin_datetime'=>date('Y-m-d H:i:s')]);
			
			return redirect()->back()->with('adminsuccess','Category deleted successfully.');
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function changeStatus(Request $request){
		
		Product::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Product status changed successfully.'),200);
	}
	
	public function topSellingStatus(Request $request){
		
		Product::where('id',$request->post('id'))->update(['top_selling'=>$request->post('status')]);
		
		return response(array('message'=>'Featured product status changed successfully.'),200);
	}
	
	
	public function dealsofTheDay(Request $request){
		
		Product::where('id',$request->post('id'))->update(['deals_oftheday'=>$request->post('status')]);
		
		return response(array('message'=>'New product status changed successfully.'),200);
	}
	
	
	
	public function addVariantProduct(Request $request,$product_id){
		
		$parentProduct=Product::where('id',$product_id)->first();
		
		if($parentProduct){
			$variants=Variant::whereIn('id',explode(',',$parentProduct->variant_id))->where('status','1')->orderBy('sort_order','ASC')->get();
		}
		
		if($request->ajax()){

			$rules=[
				'id'=>'numeric|required',
				'product_id'=>'numeric|required',
				'sku_id'=>'required|unique:variantproducts,sku_id,'.$request->post('id'),
				'discount_type'=>'numeric|required|in:1,2',
				'discount_amount'=>'required',
				'stock'=>'required',
				'sale_price'=>'required',
				'package_label'=>'required',
				'meta_title'=>'required',
				'meta_keywords'=>'required',
				'meta_description'=>'required',
			];
			
			if($parentProduct->variant_id != 1){
				
				$rules['variant_attributes']='required';
				
			}

			if((int) $request->post('id')==0){
				
				$rules['uploadfile']='required';
				
			}
			
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()){
				$message = "";
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				}
				
				return response(array('message'=>$message),403);
				
			}else{
				
				// check parent product 
				if(!$parentProduct){
					
					return response(array('message'=>'Something went wrong. Please try again'),403);
					
				}else if($request->post('discount_type')=='1' && (int) $request->post('discount_amount')>=100){
					
					return response(array('message'=>'Discount value can not be 100% or more.'),403);
					
				}else if($request->post('discount_type')=='2' && ($request->post('sale_price')<=$request->post('discount_amount'))){
					
					return response(array('message'=>'Discount value can not be equal or more than to Sale Price.'),403);
					
				}else{

					try{


						$variantIds=[];
							
						if($variants){
							
							foreach($variants as $vari){
								
								$variantIds[]=$vari->id;
							}
						}else{
							$variantIds[]=1;
						}
						 
						sort($variantIds);
						if($parentProduct->variant_id != 1){

							$variantAttributes=$request->post('variant_attributes');

							$variantsCount = $variants->count();

						}else{
							$variantAttributes=[1];

							$variantsCount = 1;
						}
						
						
						// check exit attribute with variant
						
						$existAttributeResult=Variantproduct::where([
																	['product_id','=',$parentProduct->id],
																	['variant_id','=',implode(',',$variantIds)],
																	['recyclebin_status','=','0'],
																	['variant_attributes','=',implode(',',$variantAttributes)],
																	['id','!=',$request->post('id')],
																	])->first();
																	
						if($variantsCount!=count($variantAttributes)){
							
							return response(array('message'=>'Some attribute values are missing. Please try again.'),403);
							
						}else if($existAttributeResult){
							
							return response(array('message'=>'This attribute already exist.'),403);
							
						}else{
							
							$image_array = array();
							$productImage="";

							if(isset($request->uploadfile)){
								foreach($request->uploadfile as $image){

									if($image != 'undefined'){
										$image_update = strtotime(date('Y-m-d H:i:s')).'_'.rand(11,99).'.'.$image->getClientOriginalExtension();
										$image_array[] = $image_update;
										$destinationPath = public_path('/uploads/products');
										$image->move($destinationPath, $image_update);
									}
								}
							}
							
							if(!empty($request->post('images'))){
								
								$image_array=array_merge($request->post('images'),$image_array);
								
							}
							
							if(!empty($image_array) && $image_array[0]!=''){
							
								$productImage = implode(",",$image_array);
							}
				
					
							if((int) $request->post('id')>0){
								
								$variProduct=Variantproduct::find($request->post('id'));
							}else{
								
								$variProduct=new Variantproduct();
							
							} 
							

							$variProduct->product_id=$product_id;
							
							$variProduct->variant_attributes=implode(',',$variantAttributes);
							$variProduct->sku_id=$request->post('sku_id');
							$variProduct->slug=Str::slug($parentProduct->name.'-'.$request->post('sku_id'));
							$variProduct->sale_price=$request->post('sale_price');
							$variProduct->discount_type=$request->post('discount_type');   
							$variProduct->discount_amount=$request->post('discount_amount');   
							$variProduct->stock=$request->post('stock');   
							$variProduct->package_breadth=$request->post('package_breadth') ?? 0;   
							$variProduct->package_height=$request->post('package_height') ?? 0;   
							$variProduct->package_weight=$request->post('package_weight') ?? 0;   
							$variProduct->package_label=$request->post('package_label');   
							$variProduct->images=$productImage;
							$variProduct->how_use=$request->post('how_use');
							$variProduct->key_ingredient=$request->post('key_ingredient');
							$variProduct->specification=$request->post('specification');
							$variProduct->benefits=$request->post('benefits');
							$variProduct->ingredient=$request->post('ingredient');
							$variProduct->youtube=$request->post('youtube');
							$variProduct->meta_title=$request->post('meta_title');
							$variProduct->meta_keywords=$request->post('meta_keywords');
							$variProduct->meta_description=$request->post('meta_description');

							if($parentProduct->variant_id != 1){

								$variProduct->variant_id=implode(',',$variantIds);
	
							}else{
								$variProduct->variant_id=1;
							}
							$variProduct->save();
							
							
							if((int) $request->post('id')==0){
				
								return response(array('message'=>'Variant Product added successfully.','reset'=>true,'script'=>true),200);
								
							}else{
								
								return response(array('message'=>'Variant Product updated successfully.','reset'=>false),200);
							}
						
						}
					}catch (\Exception $e){
							
						return response(array("message" => $e->getMessage()),403); 
					
					}
					
				}
				
			}
			
			return response(array('message'=>'Data not found.'),403);
		}
		
		if($parentProduct){
			
			$result=[];
			return view('admin.catalog.product.add_variantproduct',compact('result','product_id','variants','parentProduct'));
			
		}else{
			
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
    }
	
	public function updateVariantProduct(Request $request,$product_id,$variProductId){
		
		$parentProduct=Product::where('id',$product_id)->first();
		$result=Variantproduct::where('product_id',$product_id)->where('id',$variProductId)->first();
		
		if($parentProduct && $result){
		
			$variants=Variant::whereIn('id',explode(',',$parentProduct->variant_id))->where('status','1')->orderBy('sort_order','ASC')->get();
			return view('admin.catalog.product.add_variantproduct',compact('result','product_id','variants','parentProduct'));
			
		}else{
			
			return redirect()->back()->with('angelaccentdminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function variantProductList(Request $request,$productId){
		
		$parentProduct=Product::where('recyclebin_status','0')->where('status','1')->where('id',$productId)->first();

		if($parentProduct){

			$result=Variantproduct::where('product_id',$productId)->where('recyclebin_status','0')->orderBy('id','DESC')->get();
	
			return view('admin.catalog.product.variantproductlist',compact('result','parentProduct'));
		
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
			
		}
	}
	
	public function deleteVariantProduct(Request $request,$id){
		
		$result=Variantproduct::find($id);
		
		if($result){
			
			$category=Variantproduct::where('id',$id)->update(['recyclebin_status'=>'1','recyclebin_datetime'=>date('Y-m-d H:i:s')]);
			
			return redirect()->back()->with('adminsuccess','Variant Product deleted successfully.');
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	
	public function changeVariantProductStatus(Request $request){
		
		Variantproduct::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Variant product status changed successfully.'),200);
	}
	
	
	public function addVariantAttribute(Request $request){
		
		if($request->isMethod('post')){
			
			$rules=[
				'id'=>'numeric|required',
				'variant_id'=>'numeric|required',
				'title'=>'required',
				'color'=>'required'
			];
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()){
				$message = "";
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				}
				
				return response(array('message'=>$message),403);
				
			}else{
				
				$chkAlreadyExistAttribute=\App\Models\Variant_attribute::where([
													['variant_id','=',$request->post('variant_id')],
													['title','=',$request->post('title')],
													['id','!=',$request->post('id')]
													])->first();
				
				if($chkAlreadyExistAttribute){
					
					return response(array('message'=>"This attribute already exist."),403);
					
				}else{
					
					try{
						
						if((int) $request->post('id')>0){
							
							$attribute=\App\Models\Variant_attribute::find($request->post('id'));
						}else{
							
							$attribute=new \App\Models\Variant_attribute();
						
						}
						
							$attribute->variant_id=$request->post('variant_id');
							$attribute->title=$request->post('title');
							$attribute->color=$request->post('color');
							$attribute->status='1';
						
						
						$attribute->save();
						
						if((int) $request->post('id')>0){
							
							return response(array('message'=>'Attribute updated successfully.','reset'=>false),200);
						}else{
							
							return response(array('message'=>'Attribute added successfully.','reset'=>true),200);
						
						}
					}catch (\Exception $e){
				
						return response(array("message" => $e->getMessage()),403); 
					
					}
					 
				}
			}
			return response(array('message'=>'Data not found.'),403);
		}
		
		$variants=\App\Models\Variant::where('status','1')->orderBy('name','ASC')->get();
		$result=[];
        return view('admin.catalog.product.add_variantattributes',compact('variants','result'));
		
	}
	
	public function attributeList(Request $request){
		
		$result=\App\Models\Variant_attribute::select('variants.name','variant_attributes.*')->orderBy('variant_attributes.id','DESC')->join('variants','variants.id','=','variant_attributes.variant_id')->where('variants.status','1')->where('variant_attributes.status','1')->get();
	
		return view('admin.catalog.product.variantattributelist',compact('result'));
	}
	
	public function deleteVariantAttribute(Request $request,$id){
		
		$result=\App\Models\Variant_attribute::find($id);
		
		if($result){
			
			$category=\App\Models\Variant_attribute::where('id',$id)->delete();
			
			return redirect()->back()->with('adminsuccess','Variant deleted successfully.');
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	
	
	public function updateVariantAttribute(Request $request,$id){
		 
		$result=\App\Models\Variant_attribute::where('id',$id)->first();
		
		if($result){
		
			$variants=\App\Models\Variant::where('status','1')->orderBy('name','ASC')->get();
			return view('admin.catalog.product.add_variantattributes',compact('variants','result'));
			
		}else{
			
			return redirect()->back()->with('angelaccentdminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function dealsofTheWeek(Request $request){
		
		Product::where('id',$request->post('id'))->update(['deals_oftheweek'=>$request->post('status')]);
		
		return response(array('message'=>'Deals of the week status changed successfully.'),200);
	}

	
	public function addVariant(Request $request){
		
		if($request->isMethod('post')){

			$rules=[
				'id'=>'numeric|required',
				'name'=>'string|required',
				'display_layout'=>'numeric|required',
			];
			
			
			if((int) $request->post('id')==0){
				
				$rules['attribute_value']='required';
				$rules['color']='required';
			} 
 
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()){
				$message = "";
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				}
				
				return response(array('message'=>$message),403);
				
				
			}elseif((count(array_unique(array(count(array_unique($request->post('attribute_value'))),count($request->post('color')),count($request->post('attribute_id'))))))!='1'){
				
				return response(array('message'=>'Something went wrong in variant attributes. Please check once.'),403);
				
			}else{
				
				$chkAlreadyExistVariant=\App\Models\Variant::where([
													['id','!=',$request->post('id')],
													['name','=',$request->post('name')],
												])->first();
				
				if($chkAlreadyExistVariant){
					
					return response(array('message'=>"This Variant already exist."),403);
					
				}else{
					
					try{
						
						if((int) $request->post('id')>0){
							
							$Variant=\App\Models\Variant::where('id',$request->post('id'))->first();
						}else{
							
							$Variant=new \App\Models\Variant();
						}
						
							$Variant->name=$request->post('name');
							$Variant->sort_order=$request->post('variant_sort_order');
							$Variant->display_layout=$request->post('display_layout');
							$Variant->status='1';
						
						
						$Variant->save();
						
						//add variant attributes
							
						if(!empty($request->post('attribute_value'))){
								
							foreach($request->post('attribute_value') as $key=>$attvalue){
								
								if($request->post('attribute_id')[$key]>0){
 
									$attribute=\App\Models\Variant_attribute::where('id',$request->post('attribute_id')[$key])->first();

								}else{

									$attribute=new \App\Models\Variant_attribute();
								}
								
								$attribute->variant_id=$Variant->id;
								$attribute->title=$attvalue;
								$attribute->sort_order=$request->post('sort_order')[$key];
								$attribute->color=$request->post('color')[$key];

								if(isset($request->post('status')[$key])){

									$attribute->status='1';

								}else{

									$attribute->status='0';

								}
								
								$attribute->save();
								
							}
						}
							
						
						if((int) $request->post('id')>0){
							
							return response(array('message'=>'Variant updated successfully.','reset'=>false,'script'=>true),200);
						}else{
							
							return response(array('message'=>'Variant added successfully.','reset'=>true),200);
						
						}
						
					}catch (\Exception $e){
				
						return response(array("message" => $e->getMessage()),403); 
					
					}
					 
				}
			}
			return response(array('message'=>'Data not found.'),403);
		}
		
		$result=[];
		$variantResult=[];
        return view('admin.catalog.product.add_variants',compact('result','variantResult'));
		
	}
		
	public function VariantList(Request $request){
		
		$result=\App\Models\Variant::orderBy('id','DESC')->get();
	
		return view('admin.catalog.product.list_variants',compact('result'));
	}
	
	public function updateVariant(Request $request,$id){
		 
		$result=\App\Models\Variant::where('id',$id)->first();
		
		if($result){
		
			$variantResult=\App\Models\Variant_attribute::where('variant_id',$result->id)->get();

			return view('admin.catalog.product.add_variants',compact('result','variantResult'));
			
		}else{
			
			return redirect()->back()->with('angelaccentdminerror','Something went wrong. Please try again.');
		}
		
	}
		
	public function statusVariant(Request $request){
		
		Variant::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Variant status changed successfully.'),200);
	}

	
	public function addVariantAttributeMultiple(Request $request){
		
		if($request->isMethod('post')){

			$rules=[
				'id'=>'required',
				'attribute_value'=>'required',
				'color'=>'required',
				'variant_id'=>'numeric|required',
			];
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()){
				$message = "";
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				}
				
				return response(array('message'=>$message),403);
				
				
			}elseif((count(array_unique(array(count(array_unique($request->post('attribute_value'))),count($request->post('color')),count($request->post('id'))))))!='1'){
				print_r($request->post('attribute_value')); die;
				return response(array('message'=>'Something went wrong in variant attributes. Please check once.'),403);
				
			}else{
					
				try{
					
						
					if(!empty($request->post('attribute_value'))){
							
						foreach($request->post('attribute_value') as $key=>$attvalue){
							
							

							$attribute=new \App\Models\Variant_attribute();
							
							$attribute->variant_id=$request->post('variant_id');
							$attribute->title=$attvalue;
							$attribute->sort_order=$request->post('sort_order')[$key];
							$attribute->color=$request->post('color')[$key];

							if(isset($request->post('status')[$key])){

								$attribute->status='1';

							}else{

								$attribute->status='0';

							}
							
							$attribute->save();
							
						}
					}

					$attribute= \App\Models\Variant_attribute::where('variant_id',$request->post('variant_id'))->get();

					$output ='';
					
					if($attribute){

						$selectedAttribute=[];

						if($request->post('attribute_product') && $request->post('attribute_product')>0){

							$attributes=\App\Helpers\commonHelper::getAttributeByparentId($request->post('variant_id'));
	
							$attributeData= \App\Models\Variantproduct::where('id',$request->post('attribute_product'))->first();
							
							$selectedAttribute=explode(',',$attributeData->variant_attributes);
							
	
						}
						
						$msg = "-- Select --";
						
						$output.= '<option value="">'.$msg.'</option>';
						

						foreach($attribute as $attr){

							$select = '';
						
							if(in_array($attr->id,$selectedAttribute)){
								$select = 'selected';
							}

							$name = ucfirst($attr->title);
							
							$output.= '<option value="'.$attr->id.'" '.$select.'>'.$name.'</option>';
						}
					}else{
						$msg = "Data Not Available";
						
						$output.= '<option value="">'.$msg.'</option>';
					}
					
					return response(array('message'=>'Variant attribute added successfully.','reset'=>true,'script'=>true,'output'=>$output,'attributeId'=>$request->post('variant_id')),200);
					
					
				}catch (\Exception $e){
			
					return response(array("message" => $e->getMessage()),403); 
				
				}
				
			}
		}
		
		
	}
	
	
	
	public function deleteVariant(Request $request,$id){
		 
		$result=\App\Models\Variant::where('id',$id)->first();
		
		if($result){
		
			\App\Models\Variant::where('id',$result->id)->delete();

			return redirect()->back()->with('success','Variant delete successfully');
			
		}else{
			
			return redirect()->back()->with('error','Something went wrong. Please try again.');
		}
		
	}
		

}
