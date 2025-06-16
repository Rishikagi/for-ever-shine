<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\ProductReview;
use Illuminate\Support\Str;

class ProductReviewController extends Controller
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
	
	public function Add(Request $request){
		
		
		if($request->ajax()){

			$rules=[
				'id'=>'numeric|required',
				'name'=>'string|required',
				'product_id'=>'required',
				'rating'=>'required',
				'comments'=>'required',
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
				
				try{

					$image_array = array();
					$productImage="";

					if(isset($request->uploadfile)){
						foreach($request->uploadfile as $image){

							if($image != 'undefined'){
								$image_update = strtotime(date('Y-m-d H:i:s')).'_'.rand(11,99).'.'.$image->getClientOriginalExtension();
								$image_array[] = $image_update;
								$destinationPath = public_path('/uploads/review');
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
						
						$productReview=ProductReview::find($request->post('id'));
					}else{
						
						$productReview=new ProductReview();
					
					} 
					
					$productReview->user_id=$request->post('name');
					$productReview->product_id=$request->post('product_id');
					$productReview->rate=$request->post('rating');
					$productReview->name=$request->post('name');
					$productReview->desc=$request->post('comments');
					$productReview->image=$productImage;
					$productReview->status='1';
					
					$productReview->save();
					
					
					if((int) $request->post('id')==0){
		
						return response(array('message'=>'Product Review added successfully.','reset'=>true,'script'=>true),200);
						
					}else{
						
						return response(array('message'=>'Product Review updated successfully.','reset'=>false),200);
					}
					
				}catch (\Exception $e){
						
					return response(array("message" => $e->getMessage()),403); 
				
				}
				
			}
			
			return response(array('message'=>'Data not found.'),403);
		}
		
		$result=[];

		$products = \App\Models\Variantproduct::select('variantproducts.*', 'products.name')->join('products','variantproducts.product_id','=','products.id')->orderBy('products.name','Asc')->get();
		
		return view('admin.catalog.product.collection.add',compact('result','products'));
	
		
    }
	
	public function Update(Request $request,$id){
		
		
		$result=ProductReview::where('id',$id)->first();
		
		if($result){
		
			$products = \App\Models\Variantproduct::select('variantproducts.*', 'products.name')->join('products','variantproducts.product_id','=','products.id')->orderBy('products.name','Asc')->get();

			return view('admin.catalog.product.collection.add',compact('result','products'));
			
		}else{
			
			return redirect()->back()->with('angelaccentdminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function List(Request $request){
		

		$result=ProductReview::orderBy('id','DESC')->get();

		return view('admin.catalog.product.collection.list',compact('result'));
		
	}
	
	public function Delete(Request $request,$id){
		
		$result=ProductReview::find($id);
		
		if($result){
			
			$category=ProductReview::where('id',$id)->delete();
			
			return redirect()->back()->with('adminsuccess','Product Review deleted successfully.');
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	
	public function Status(Request $request){
		
		ProductReview::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Product Review status changed successfully.'),200);
	}
	

}
