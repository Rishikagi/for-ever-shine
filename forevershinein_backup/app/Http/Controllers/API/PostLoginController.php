<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\commonHelper;
use DB; 
use Validator;
use App\Models\Event;
use Hash;
use Mail;
use Illuminate\Mail\Message;

class PostLoginController extends Controller
{

    public function changePassword(Request $request){

		$rules = [ 
			'old_password'=>'required|min:8',
			'password'=>'required',
			"confirm_password"=>"required|same:password|min:8"       
		];   
 
		$messages = array(
			'old_password.required' => "Old Password is required",
			'password.required' => "Password is required",
			'confirm_password.required' => "Confirm Password is required",
			'confirm_password.same' => "Password and confirm password must be same",
			'confirm_password.min' => "Password must be atleast min 8 digits"
		);
		
		
		$validator = Validator::make($request->json()->all(), $rules, $messages);
		
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
				
				if(Hash::check($request->json()->get('old_password'),$request->user()->password)==false){
					
					return response(array('message'=>"Old password doesn't match.Please try again."),403);
					
				}else{
					
					\App\models\User::where('id',$request->user()->id)
						->update(array('password'=>Hash::make($request->json()->get('password'))));
						
					return response(array('message'=>"Password updated successfully."),200);
				}
				
			}catch (\Exception $e){
				
				return response(array("message" => "Something went wrong.please try again"),403); 
				
			}
	   }
		 
	}
	
	function userProfile(Request $request){
		
		
		$data=[
			'id'=>$request->user()->id,
			'name'=>ucfirst($request->user()->name),
			'mobile'=>$request->user()->mobile,
			'email'=>$request->user()->email,
			'gender'=>$request->user()->gender,
			'designation_id'=>$request->user()->designation_id,
			'user_type'=>$request->user()->user_type,
			'country_id'=>$request->user()->country_id,
		];
		
		
		return response(array('message'=>"Profile data fetched successfully..","data"=>$data),200);
		
		
	}
	
	public function addAddress(Request $request){

		$rules = [ 
			'id'=>'required|numeric',  
		];   

		if($request->json()->get('id') == '0'){

			
	
			$rules['pincode']="required|digits:6";
			

			if($request->json()->get('type')=='2'){

				$rules['phone_code']='required';
				$rules['country_id']='required|exists:countries,id';
				$rules['state_id']='required|exists:states,id';
				$rules['city_id']='required|exists:cities,id';
			}

			$rules['name']='required|string';
			$rules['email']='required|email';
			$rules['country_id']='required|exists:countries,id';
			$rules['state_id']='required|exists:states,id';
			$rules['city_id']='required|exists:cities,id';
			$rules['mobile']='required';
			$rules['address_line1']='required';

			if($request->json()->get('billing_first_name') != '' && $request->json()->get('billing_last_name') != ''){

				$rules['billing_first_name']='required|string';
				$rules['billing_last_name']='required|string';
				$rules['billing_email']='required|email';
				$rules['billing_country_id']='required|exists:countries,id';
				$rules['billing_state_id']='required|exists:states,id';
				$rules['billing_city_id']='required|exists:cities,id';
				$rules['billing_mobile']='required';
				$rules['billing_address1']='required';
				$rules['billing_pin_code']='required';
			}
			
		}


		$validator = Validator::make($request->json()->all(), $rules);
		
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
		
				if($request->json()->get('id')>0){

					$address= \App\Models\Addressbook::find($request->json()->get('id'));

				}else{
					
					$address= new \App\Models\Addressbook();
				}
				

				$address->user_id=$request->user()->id;
				
				$address->name = $request->json()->get('name');
				$address->email = $request->json()->get('email');
				$address->mobile = $request->json()->get('mobile');
				$address->phone_code = $request->json()->get('phone_code') ?? '';
				$address->country_id = $request->json()->get('country_id');
				$address->state_id = $request->json()->get('state_id');
				$address->city_id = $request->json()->get('city_id');
				$address->address_line1 = $request->json()->get('address_line1');
				$address->address_line2 = $request->json()->get('address_line2');
				$address->pincode = $request->json()->get('pincode');
				$address->type= '1';
				$address->save();

				
				if($request->json()->get('billing_name') != ''){

					$address->billing_name=$request->json()->get('billing_name');
					$address->billing_email=$request->json()->get('billing_email');
					$address->billing_mobile=$request->json()->get('billing_mobile');
					$address->billing_country_id=$request->json()->get('billing_country_id');
					$address->billing_state_id=$request->json()->get('billing_state_id');
					$address->billing_city_id=$request->json()->get('billing_city_id');
					$address->billing_address_line1=$request->json()->get('billing_address1');
					$address->billing_pin_code=$request->json()->get('billing_pin_code');

				}
				
				if($request->json()->get('id')>0){
					
					return response(array('message'=>'Address updated successfully.'),200);
				}else{
					
					return response(array('message'=>'Address added successfully.'),200);
				}

			}catch (\Exception $e){
				
				return response(array("message" => "Something went wrong.please try again"),403); 
				
			}
	   }
		 
	}

	public function updateProfile(Request $request){
	
		try{
			
				$user= \App\Models\User::find($request->user()->id);

				$user->name=$request->json()->get('name');
				$user->gender=$request->json()->get('gender');
				$user->save();
				
				return response(array('message'=>'Profile updated successfully.'),200);
				
			
		}catch (\Exception $e){
			
			return response(array("message" => "Something went wrong.please try again"),403); 
			
		}
	}
	
	public function deleteAddress(Request $request){

		$rules = [ 
			'id'=>'required|numeric'      
		];   

		$validator = Validator::make($request->json()->all(), $rules);
		
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
				
				$address= \App\Models\Addressbook::where([
														['id','=',$request->json()->get('id')],						
														['user_id','=',$request->user()->id],						
														['recyclebin_status','=','0']						
														])->first();

				if(!$address){

					return response(array("message" => "invalid address id."),403); 

				}else{
					
					\App\Models\Addressbook::where('id',$request->json()->get('id'))->update(['recyclebin_status'=>'1','recyclebin_datetime'=>date('Y-m-d H:i:s')]);
					
					return response(array("message" => "Address deleted successfully."),200); 
				}
				
			}catch (\Exception $e){
				
				return response(array("message" => "Something went wrong.please try again"),403); 
				
			}
	   }
		 
	}
	
	public function addressList(Request $request){

		try{
				
			$address= \App\Models\Addressbook::where([						
													['user_id','=',$request->user()->id],						
													['recyclebin_status','=','0']						
													])->get();

			if(!$address){

				return response(array("message" => "Result not found."),404); 

			}else{
				
				$result=[];

				foreach($address as $raw){
				
					$result[]=[
						'id'=>$raw['id'],
						'name'=>ucfirst($raw['name']),
						'mobile'=>$raw['mobile'],
						'email'=>$raw['email'],
						'address_line1'=>$raw['address_line1'],
						'address_line2'=>$raw['address_line2'],
						'country_id'=>$raw['country_id'],
						'state_id'=>$raw['state_id'],
						'city_id'=>$raw['city_id'],
						'pincode'=>$raw['pincode'],
						'type'=>$raw['type'],
					];
				}
				
				return response(array("message" => "Address fetched successfully.","result"=>$result),200); 
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => "Something went wrong.please try again"),403); 
			
		}
		 
	}
	
	public function order(Request $request){

		try{
				
			$sales= \App\Models\Sales::where([
				['user_id','=',$request->user()->id]
				])->orderBy('id','desc')->get();

			if(!$sales){

				return response(array("message" => "Result not found."),404); 

			}else{
				
				$result=[];

				foreach($sales as $raw){
					
					if($raw['payment_type'] == '1'){
						$paymentType = 'Online';

					}else{
						$paymentType = 'COD';
					}
					$result[]=[
						'id'=>$raw['id'],
						'order_id'=>$raw['order_id'],
						'name'=>$raw['name'],
						'email'=>$raw['email'],
						'paymentType'=>$paymentType,
						'sub_total'=>$raw['subtotal'],
						'discount'=>$raw['discount'],
						'shipping'=>$raw['shipping'],
						'amount'=>$raw['net_amount'],
						'couponcode_amount'=>$raw['couponcode_amount'],
						'created_at'=>date('F d, Y', strtotime($raw['created_at'])),
					];
				}
				
				return response(array("message" => "Orders fetched successfully.","result"=>$result),200); 
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => "Something went wrong.please try again"),403); 
			
		}
		 
	}
	
	public function addToCart(Request $request){

		$rules = [ 
			'product_id'=>'required|exists:variantproducts,id',
			'qty'=>'required|numeric',
			'add_type'=>'required|in:add,update'
		];   

		$variantProductResult=\App\Models\Variantproduct::where('id',$request->json()->get('product_id'))->first();
		
		$variantAttributeArray=explode(',',$variantProductResult->variant_attributes);

		if(in_array('17',$variantAttributeArray) || in_array('18',$variantAttributeArray) || in_array('19',$variantAttributeArray)){

			$rules['remark']='required';
		}

		$messages['remark.required']="Custom Remark Field is required";

		$validator = Validator::make($request->json()->all(), $rules,$messages);
		
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
				
				
				$cart= \App\Models\Addtocart::where([				
														['user_id','=',$request->user()->id],						
														['product_id','=',$request->json()->get('product_id')]						
														])->first();

				
				if(!$cart){
					$cart=new \App\Models\Addtocart();
					$cart->user_id=$request->user()->id;
					$cart->product_id=$request->json()->get('product_id');
					$cart->qty=$request->json()->get('qty');
					$cart->remark=$request->json()->get('remark');

				}else{
					
					if($request->json()->get('add_type')=='add'){

						$cart->qty = $request->json()->get('qty');

					}else{

						$cart->qty=$request->json()->get('qty');
					}
					
					$cart->remark=$request->json()->get('remark');
				}
				
				$cart->save();
				
				if($request->json()->get('id')>0){
					
					return response(array("message" => "Cart updated successfully."),200); 
				}else{
					
					return response(array("message" => "Product successfully added into cart."),200); 
				}
				
			}catch (\Exception $e){
				
				return response(array("message" => "Something went wrong.please try again."),403); 
				
			}
	   }
		 
	}
	
	public function deleteCart(Request $request){

		$rules = [ 
			'id'=>'required|numeric'
		];   

		$validator = Validator::make($request->json()->all(), $rules);
		
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
				
				
				\App\Models\Addtocart::where([
											['user_id','=',$request->user()->id],
											['id','=',$request->json()->get('id')]
											])->delete();
				
				return response(array("message" => "Cart Product Delete successfully."),200); 
				
			}catch (\Exception $e){
				
				return response(array("message" => "Something went wrong.please try again"),403); 
				
			}
	   }
		 
	}
	
	public function deleteCompleteCart(Request $request){

		try{
				
				
			\App\Models\Addtocart::where([
										['user_id','=',$request->user()->id]
										])->delete();
			
			return response(array("message" => "User Cart delete successfully."),200); 
			
		}catch (\Exception $e){
			
			return response(array("message" => "Something went wrong.please try again"),403); 
			
		}
		 
	}
	
	public function cartList(Request $request){

		try{ 	
				
			$result=\App\Models\Addtocart::select('addtocarts.id as cartid','products.name','addtocarts.qty','addtocarts.remark','variantproducts.sale_price','variantproducts.stock','variantproducts.id','variantproducts.discount_type','variantproducts.discount_amount','variantproducts.images','products.short_description','variantproducts.package_length','variantproducts.package_breadth','variantproducts.package_height','variantproducts.package_weight')->where([
										['addtocarts.user_id','=',$request->user()->id]
										])->join('variantproducts','variantproducts.id','=','addtocarts.product_id')->join('products','products.id','=','variantproducts.product_id')->get();
	
			if($result->count()==0){
				
				return response(array("message" => "Cart list is empty."),404);
				
			}else{
				
				$data=[];
				
				foreach($result as $value){
					
					$imagesArray=explode(',',$value->images);

					$data[]=array(
						'id'=>$value->cartid,
						'product_id'=>$value->id,
						'product_name'=>ucfirst($value->name),
						'qty'=>$value->qty,
						'sale_price'=>$value->sale_price,
						'discount_amount'=>$value->discount_amount,
						'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($value->sale_price,$value->discount_type,$value->discount_amount),
						'package_length'=>$value->package_length,
						'package_breadth'=>$value->package_breadth,
						'package_height'=>$value->package_height,
						'package_weight'=>$value->package_weight,
						'image'=>asset('uploads/products/'.$imagesArray[0]),
						'short_description'=>$value->short_description,
						'remark'=>$value->remark
					);
					
				}
				
				return response(array("message" => "Cart list data fetched successfully.","result"=>$data),200); 
				
			} 
		}catch (\Exception $e){
			
			return response(array("message" => "Something went wrong.please try again"),403); 
			
		}
		
	}

	public function checkout(Request $request){

		
		$rules['currency_id']='numeric|Exists:currency_values,id';
		$rules['coupon_id']='numeric';
		$rules['shipping_id']='numeric';
		$rules['address_id']='required|numeric';
		$rules['payment_type']='required|numeric|in:1,2';
		
		$validator = Validator::make($request->json()->all(), $rules);
		
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
				
				$totalSales =  \App\Models\Sales::count();

				$sales=new \App\Models\Sales();
				
				$orderId="NP-".rand(11,99).str_pad(($totalSales+1), 3, "0", STR_PAD_LEFT);

				$sales->order_id=$orderId;

				if($request->json()->get('type')=='1'){
					
					$cartData=\App\Models\Addtocart::where('user_id',$request->user()->id)->get();
	
					$addressResult=\App\Models\Addressbook::where('id',$request->json()->get('address_id'))->first();
			
					$sales->user_id=$request->user()->id; 
					$sales->checkout_type='2';
					$sales->name=$addressResult->name;
					$sales->email=$addressResult->email;
					$sales->mobile='61'.$addressResult->mobile;
					$sales->currency_id=$request->json()->get('currency_id');
					$sales->country_id=$addressResult->country_id;
					$sales->state_id=$addressResult->state_id;
					$sales->city_id=$addressResult->city_id;
					$sales->address_line1=$addressResult->address_line1;
					$sales->address_line2=$addressResult->address_line2;
					$sales->pincode=$addressResult->pincode;
					$sales->type=$addressResult->type;
					
					
					$name=$addressResult->name;
					$email=$addressResult->email;
					$mobile='91'.$addressResult->mobile;
					$currency_id=$request->json()->get('currency_id');
					$country_id=$addressResult->country_id;
					$state_id=$addressResult->state_id;
					$city_id=$addressResult->city_id;
					$address_line1=$addressResult->address_line1;
					$address_line2=$addressResult->address_line2;
					$pincode=$addressResult->pincode;
					

					if($addressResult->billing_name != null){
						$sales->billing_name=$addressResult->billing_name;
						$sales->billing_email=$addressResult->billing_email;
						$sales->billing_mobile=$addressResult->phone_code.' '.$addressResult->billing_mobile;
						$sales->billing_country_id=$addressResult->billing_country_id;
						$sales->billing_state_id=$addressResult->billing_state_id;
						$sales->billing_city_id=$addressResult->billing_city_id;
						$sales->billing_address_line1=$addressResult->billing_address1;
						$sales->billing_address_line2=$addressResult->address_line2;
						$sales->billing_pincode=$addressResult->billing_pin_code;
						
					}else{
						$sales->billing_name=$addressResult->name;
						$sales->billing_email=$addressResult->email;
						$sales->billing_mobile='91'.$addressResult->mobile;
						$sales->billing_country_id=$addressResult->country_id;
						$sales->billing_state_id=$addressResult->state_id;
						$sales->billing_city_id=$addressResult->city_id;
						$sales->billing_address_line1=$addressResult->address_line1;
						$sales->billing_address_line2=$addressResult->address_line2;
						$sales->billing_pincode=$addressResult->pincode;
						
					}

				}else{

					$cartData=$request->json()->get('cart_data');

					$sales->checkout_type='1';
					$sales->name=$request->json()->get('name');
					$sales->email=$request->json()->get('email');
					$sales->mobile=$request->json()->get('mobile');
					$sales->currency_id=$request->json()->get('currency_id');
					$sales->country_id=$request->json()->get('country_id');
					$sales->state_id=$request->json()->get('state_id');
					$sales->city_id=$request->json()->get('city_id');
					$sales->address_line1=$request->json()->get('address_line1');
					$sales->address_line2=$request->json()->get('address_line2');
					$sales->pincode=$request->json()->get('pincode');
					$sales->type=$request->json()->get('type');
					
					
					$name=$request->json()->get('name');
					$email=$request->json()->get('email');
					$mobile=$request->json()->get('mobile');
					$currency_id=$request->json()->get('currency_id');
					$country_id=$request->json()->get('country_id');
					$state_id=$request->json()->get('state_id');
					$city_id=$request->json()->get('city_id');
					$address_line1=$request->json()->get('address_line1');
					$address_line2=$request->json()->get('address_line2');
					$pincode=$request->json()->get('pincode');

					if($request->json()->get('billing_name') != null){
						$sales->billing_name=$request->json()->get('billing_name');
						$sales->billing_email=$request->json()->get('billing_email');
						$sales->billing_mobile=$request->json()->get('billing_mobile');
						$sales->billing_country_id=$request->json()->get('billing_country_id');
						$sales->billing_state_id=$request->json()->get('billing_state_id');
						$sales->billing_city_id=$request->json()->get('billing_city_id');
						$sales->billing_address_line1=$request->json()->get('billing_address1');
						$sales->billing_address_line2=$request->json()->get('billing_address2');
						$sales->billing_pincode=$request->json()->get('billing_pin_code');
						
					}else{
						$sales->billing_name=$request->json()->get('name');
						$sales->billing_email=$request->json()->get('email');
						$sales->billing_mobile=$request->json()->get('mobile');
						$sales->billing_country_id=$request->json()->get('country_id');
						$sales->billing_state_id=$request->json()->get('state_id');
						$sales->billing_city_id=$request->json()->get('city_id');
						$sales->billing_address_line1=$request->json()->get('address_line1');
						$sales->billing_address_line2=$request->json()->get('address_line2');
						$sales->billing_pincode=$request->json()->get('pincode');
						
					}
				}
				
				
				$sales->payment_type=$request->json()->get('payment_type');

				$subTotal=0; $totalShipping=0; $discount=0; $couponId=0; $couponAmount=0; $netAmount=0; $shoppingWallet=0;

				if(!empty($cartData)){
					
					foreach($cartData as $cart){
						
						$productResult= \App\Models\Product::select('products.name','variantproducts.*')->where('variantproducts.id',$cart['product_id'])
											->join('variantproducts','variantproducts.product_id','=','products.id')->first();
						
						if($productResult){

							if($productResult->stock == 0){
								
								return response(array("message" => "This ".$productResult->name." out of stock"),403);

							}elseif($productResult->stock < $cart['qty']){
								
								return response(array("message" => "This ".$productResult->name." out of stock"),403);

							}
						}
						
						$offerPrice=\App\Helpers\commonHelper::getOfferProductPrice($productResult->sale_price,$productResult->discount_type,$productResult->discount_amount);
 
						$shippingAmount=\App\Helpers\commonHelper::getShippingAmount($productResult['package_length'],$productResult['package_breadth'],$productResult['package_height'],$productResult['package_weight'],$sales->country_id,$request->json()->get('shipping_id'));

						$subTotal+=($productResult['sale_price']*$cart['qty']);

						$totalShipping+=($shippingAmount*$cart['qty']);

						$discount+=(($productResult['sale_price']-$offerPrice)*$cart['qty']);
					}

					$netAmount=($subTotal)-$discount;

				}

				//calculation of coupon code amount

				if($request->json()->get('coupon_id') >0 && $request->json()->get('coupon_code') != ''){

					$amountForCoupon=($subTotal-$discount);

					//send OTP on mail
					$couponData=\App\Models\Coupon::where('coupon_code',$request->json()->get('coupon_code'))->first();
					if(!$couponData){

						$couponData=\App\Models\BusinessCoupon::where('business_type',$request->user()->user_type)->first();
					}
					$couponResult=\App\Helpers\commonHelper::checkCouponCode($request->user()->id,$couponData['coupon_code'],$amountForCoupon);

					if($couponResult['status']==200){
				
						if($couponResult['discount_type']=='1'){

							$couponAmount=round((($amountForCoupon*$couponResult['discount_amount'])/100),2);
				
						}else if($couponResult['discount_type']=='2'){
				
							$couponAmount=round($couponResult['discount_amount'],2);
				
						}
						
						\App\Models\Coupon::where('coupon_code',$request->json()->get('coupon_code'))->update(['used_status'=>'1']);

						$couponId=$couponResult['coupon_id'];
						$netAmount-=$couponAmount;

					}else{

						return response(array("message" => $couponResult['message']),$couponResult['status']); 

					}
				}
				

				$netAmount+=$totalShipping;

				$paymentType = '1';

				if($request->json()->get('shopping_wallet') == '1'){

					$shoppingWallet = \App\Helpers\commonHelper::userBalance($request->user()->id);
			
					if($netAmount>=$shoppingWallet){
			
						$netAmount-=$shoppingWallet;
						$paymentType = '2';
			
					}elseif($shoppingWallet>$netAmount){
			
						$shoppingWallet=$netAmount;
						$netAmount = 0;
						$paymentType = '2';
					}
				}

				$sales->subtotal= $subTotal;
				$sales->shipping=$totalShipping;
				$sales->couponcode_id=$couponId;
				$sales->useshooping_wallet=$shoppingWallet;
				$sales->couponcode_amount=$couponAmount;
				$sales->discount=$discount;
				$sales->net_amount=round($netAmount);
				
				$sales->save();

				$saleId=$sales->id;

				if(!empty($cartData)){

					foreach($cartData as $cart){

						$salesDetail=new \App\Models\Sales_detail();

						$productResult=\App\Models\Product::select('products.name','variantproducts.*')->where('variantproducts.id',$cart['product_id'])
															->join('variantproducts','variantproducts.product_id','=','products.id')->first();
						
						$imagesArray=explode(',',$productResult->images);

						$offerPrice=\App\Helpers\commonHelper::getOfferProductPrice($productResult->sale_price,$productResult->discount_type,$productResult->discount_amount);

						if($request->json()->get('type')=='1'){
							$salesDetail->user_id=$request->user()->id; 
						}
						
						$salesDetail->sale_id=$saleId;
						$salesDetail->order_id=$orderId;
						$salesDetail->currency_id=1;
						$salesDetail->shipping_id=$request->json()->get('shipping_id');
						$salesDetail->product_id=$productResult->id;
						$salesDetail->product_name=$productResult->name;
						$salesDetail->product_image=asset('uploads/products/'.$imagesArray[0]);
						$salesDetail->qty=$cart['qty'];
						$salesDetail->remark=$cart['remark'];
						$salesDetail->sub_total=\App\Helpers\commonHelper::getPriceAmountByCountryId(($productResult->sale_price*$cart['qty']),1);
						$salesDetail->discount=\App\Helpers\commonHelper::getPriceAmountByCountryId(((($productResult->sale_price)-$offerPrice)*$cart['qty']),1);
						$salesDetail->amount=\App\Helpers\commonHelper::getPriceAmountByCountryId(($offerPrice*$cart['qty']),1);
						$salesDetail->order_status='1';
						$salesDetail->payment_status='0';

						$salesDetail->save();

					}
				}

				if($netAmount>0){
					
					$transactionId=strtotime("now").rand(11,99);


					$payment=new \App\Models\Transaction();

					$payment->user_id=$request->user()->id;
					$payment->order_id=$orderId;
					$payment->currency_id=1;
					$payment->transaction_id=$transactionId;
					$payment->amount=round($netAmount);
					$payment->payment_status='0';
					$payment->save();
				}

				return response(array("message" => "Checkout successfully.","order_id"=>$orderId),200); 
				
			}catch (\Exception $e){
				
				return response(array("message" => "Something went wrong.please try again"),403); 
				
			}
		}
		
	}

	public function getAddressById(Request $request){

		$address=\App\Models\Addressbook::where('id',$request->get('id'))->first();

		if(!$address){

			return response(array('message'=>'Invalid Address id'),404);

		}else{

			$result=[
				'id'=>$address->id,
				'name'=>$address->name,
				'mobile'=>$address->mobile,
				'email'=>$address->email,
				'phone_code'=>$address->phone_code,
				'address_line1'=>$address->address_line1,
				'address_line2'=>$address->address_line2,
				'country_id'=>(string) $address->country_id,
				'state_id'=>(string) $address->state_id,
				'city_id'=>(string) $address->city_id,
				'pincode'=>$address->pincode,
				'type'=>$address->type
			];

			return response(array('message'=>'Address fetched successfully.','result'=>$result),200);
		}

	}

	public function logout(Request $request){

		$request->user()->token()->revoke();

		return response(array('message'=>'Logout successfully.'),200);
	}

	public function wishlistProduct(Request $request){

		$rules['product_id']='numeric|required|exists:variantproducts,id';

		$validator = Validator::make($request->json()->all(), $rules);
		
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

				$result=\App\Models\Variantproduct::where('id',$request->json()->get('product_id'))->where('status','1')->first();

				if($result){

					$checkWishlist=\App\Models\Wishlist::where([
																['product_id',$request->json()->get('product_id')],
																['user_id',$request->user()->id],
																])->first();

					if($checkWishlist){

						\App\Models\Wishlist::where('id',$checkWishlist->id)->delete();

						$wishlistResult=\App\Models\Wishlist::select('product_id')->where('user_id',$request->user()->id)->pluck('product_id')->toArray();

						return response(array("message" => "Product successfully removed from wishlist.","wishlistid"=>$wishlistResult),200);

					}else{	
						
						$wishlist=new \App\Models\Wishlist();
						$wishlist->user_id=$request->user()->id;
						$wishlist->product_id=$request->json()->get('product_id');
						$wishlist->save();

						$wishlistResult=\App\Models\Wishlist::select('product_id')->where('user_id',$request->user()->id)->pluck('product_id')->toArray();

						return response(array("message" => "Product Wishlisted successfully.","wishlistid"=>$wishlistResult),200); 
					}

				}else{

					return response(array("message" => "Product Not Found. Please try again"),403); 

				}
			}catch (\Exception $e){
				
				return response(array("message" => "Something went wrong.please try again"),403); 
				
			}
		}

	}

	public function wishlistProductList(Request $request){

		try{
			
			$result=\App\Models\Wishlist::Select('wishlists.id as wishlistid','products.name','variantproducts.id','variantproducts.sale_price','variantproducts.discount_type','variantproducts.discount_amount','variantproducts.slug','variantproducts.images')
								->join('variantproducts','variantproducts.id','=','wishlists.product_id')
								->join('products','products.id','=','variantproducts.product_id')
								->where([
									['products.status','=','1'],
									['variantproducts.status','=','1'],
									['wishlists.user_id','=',$request->user()->id]
								])->get();
		
		
			if($result->count()==0){
				
				return response(array("message" => 'Products Not Found.'),404); 

			}else{
				
				$products=[];
				foreach($result as $value){
					
					$imagesArray=explode(',',$value->images);

					$products[]=[
						'wishlistid'=>$value['wishlistid'],
						'variant_productid'=>$value['id'],
						'name'=>ucfirst($value['name']),
						'sale_price'=>$value['sale_price'],
						'discount_amount'=>$value['discount_amount'],
						'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($value['sale_price'],$value['discount_type'],$value['discount_amount']),
						'first_image'=>asset('uploads/products/'.$imagesArray[0]),
						'slug'=>$value['slug']
					];
				}
				
				return response(array("message" => 'Wishlist Product fetched successfully.','result'=>$products),200); 
			}
		
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 

	}

	public function deleteWishlistProduct(Request $request){

		$rules['wishlist_id']='numeric|required|exists:wishlists,id';

		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()){
			
			$message = "";
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
			
		}else{

			\App\Models\Wishlist::where('id',$request->json()->get('wishlist_id'))->delete();

			return response(array('message'=>'Product Successfully Removed From Saved Products.'),200);

		}

	}

	public function failedOrder(Request $request){

		$rules['order_id']='required|exists:sales_details,order_id';

		$validator = Validator::make($request->json()->all(), $rules);
		
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

				\App\Models\Sales_detail::where('order_id',$request->json()->get('order_id'))->update(array('order_status'=>'0','payment_status'=>'1'));	
				\App\Models\Transaction::where('order_id',$request->json()->get('order_id'))->update(array('payment_status'=>'1'));				

				return response(array("message" => "Order Failed successfully."),200); 

				
			}catch (\Exception $e){
				
				return response(array("message" => "Something went wrong.please try again"),403); 
				
			}
		}

	}

	public function checkCouponCode(Request $request){

		$rules['coupon_code']='required|exists:coupons,coupon_code';
		$rules['order_amount']='required|numeric';

		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()){
			
			$message = "";
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			$couponResult=\App\Helpers\commonHelper::checkCouponCode($request->user()->id,$request->json()->get('coupon_code'),$request->json()->get('order_amount'));
		
			if($couponResult['status']==200){

				return response(array('message'=>$couponResult['message'],'coupon_id'=>$couponResult['coupon_id'],'discount_type'=>$couponResult['discount_type'],'discount_amount'=>$couponResult['discount_amount']),$couponResult['status']);

			}else{

				return response(array('message'=>$couponResult['message']),$couponResult['status']);
			}
		}
	}

	public function ondemandEnquiry(Request $request){
		
		$rules = [

            'product_id' => 'required|numeric|exists:variantproducts,id',
            'name' => 'required|min:3',
			'email' => 'required|min:3',
			'mobile' => 'required',
			'date' => 'required',
			'description' => 'required|min:3',
		];


		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			try{
					
				$name=$request->json()->get('name');
				$email=$request->json()->get('email');
				$mobile=$request->json()->get('mobile');
				$date=$request->json()->get('date');			
				$product_id=$request->json()->get('product_id');
				$message=$request->json()->get('description');
					
				$data=new \App\Models\ProductQuery();
				$data->name=$request->json()->get('name');
				$data->email=$request->json()->get('email');
				$data->mobile=$request->json()->get('mobile');
				$data->date=$request->json()->get('date');			
				$data->sales_admin_id=1;
				$data->product_id=$request->json()->get('product_id');
				$data->message=$request->json()->get('description');
				$data->save();
				
				$msg = '<p>Name : '.$name.'</p>
				        <p>Email : '.$email.'</p>
				        <p>Mobile : '.$mobile.'</p>
				        <p>Date : '.$date.'</p>
				        <p>Message : '.$message.'</p>
				        <p>Product : '.$product_id.'</p>
				
				';
				$subject = 'Product enquiry';
				$to = 'hhhh@gmail.com';
				
				\Mail::send('email_templates.msg', compact('msg','subject'), function($message) use ($to,$subject)
				{
					$message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
					$message->subject($subject);
					$message->to($to);
				});

				return response(array('message'=>'Thank you, your enquiry has been submitted successfully'),200);
				
			}catch (\Exception $e){
				
				return response(array("error"=> true, "message" => $e->getMessage()),403); 
			
			}
		}
    }

	public function productCustomizations(Request $request){
		
		$rules = [

            'product_id' => 'required|numeric|exists:variantproducts,id',
            'description' => 'required|min:3',
		];


		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			try{
					
				$data=new \App\Models\ProductCustomization();
				$data->user_id=$request->user()->id;
				$data->sales_admin_id=\App\Helpers\commonHelper::getSalesAdministrationId($request->user()->used_reference_code);
				$data->product_id=$request->json()->get('product_id');
				$data->message=$request->json()->get('description');
				$data->save();

				$notification = new \App\Models\Notification();
				$notification->user_id = \App\Helpers\commonHelper::getSalesAdministrationId($request->user()->used_reference_code);
				$notification->title = 'Product Enquiry by user '.$request->user()->name;
				$notification->message = $request->json()->get('description');
				$notification->save();
				
				return response(array('message'=>'Thank you, your enquiry has been submitted successfully'),200);
				
			}catch (\Exception $e){
				
				return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
			
			}
		}
    }

	public function productReview(Request $request){
		
		$rules = [

            'product_id' => 'required|numeric|exists:variantproducts,id',
            'rate' => 'required|numeric',
            'name' => 'required|string',
            'review' => 'required',
		];


		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			try{
					
				$data=new \App\Models\ProductReview();
				$data->user_id=$request->user()->id;
				$data->product_id=$request->json()->get('product_id');
				$data->rate=$request->json()->get('rate');
				$data->name=$request->json()->get('name');
				$data->desc=$request->json()->get('review');
				$data->save();

				return response(array('message'=>'Thank you, your review has been submitted successfully'),200);
				
			}catch (\Exception $e){
				
				return response(array("error"=> true, "message" => $e->getMessage()),403); 
			
			}
		}
    }

}