<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Coupon;
use App\Models\BusinessCoupon;

class CouponController extends Controller
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
				'title'=>'required',
				'coupon_code'=>'required',
				'start_date'=>'required',
				'end_date'=>'required',
				'minorder_amount'=>'required|array',
				'minorder_amount.*'=>'required|numeric',
				'discount_type'=>'required',
				'discount_amount'=>'required'
			];

			if(\Auth::user()->designation_id == '1')
			{
				$rules['totalno_uses']='required|numeric';
			
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
				
				$totalstart_range=count($request->post('minorder_amount'));
                  
                for($i=0;$i<$totalstart_range-1;$i++){
                    
                    if(($request->post('minorder_amount')[$i]==0) || ($request->post('minorder_amount')[$i+1]>$request->post('minorder_amount')[$i])){
                       
                    }else{
                        return response(array('message'=>'Invalid Entered Start Order Amount. Please check once.'),403);
                    }
                    
                }

				// check unique coupon title
				$titleResult=Coupon::where('title',$request->post('title'))->where('recyclebin_status','0')->where('id','!=',$request->post('id'))->first();
				
				$codeResult=Coupon::where('coupon_code',$request->post('coupon_code'))->where('recyclebin_status','0')->where('id','!=',$request->post('id'))->first();
				
				if($titleResult){
					
					return response(array('message'=>'Coupon title already exist'),403);
					
				}else if($codeResult){
					
					return response(array('message'=>'Coupon code already exist'),403);
					
				}else{
					
					if((int) $request->post('id')>0){
					
						$coupon=Coupon::find($request->post('id'));

						if($coupon->totalno_uses>$request->post('totalno_uses')){

							return response(array('message'=>'Total No uses value must be greater than to previous value.'),403);
						}
						
					}else{
						
						$coupon=new Coupon();

						if(\Auth::user()->designation_id == '3' && \Auth::user()->user_type == 'Admin')
						{
							$coupon->user_id=$request->post('user_id');
							$coupon->totalno_uses='1';
							$coupon->type='B2B';
							$coupon->status='1';

							$user = \App\Models\User::where('id',$request->post('user_id'))->first();
							$name = $user->name;
							$to = $user->email;

							$msg = "Please redeem this code : ".$request->post('coupon_code')." on any product service purchase to receive an instant 10% off at checkout!";

							\Mail::send('email_templates.coupon_code', compact('msg','name'), function($message) use ($to)
							{
								$message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
								$message->subject('Registration Coupon Code.');
								$message->to($to);
							});

						}else{
							
							$coupon->totalno_uses=$request->post('totalno_uses');
						}
					
					}
					
					
					$coupon->created_by=\Auth::user()->id;
					$coupon->title=$request->post('title');
					$coupon->coupon_code=$request->post('coupon_code');
					$coupon->start_date=date('Y-m-d',strtotime($request->post('start_date')));
					$coupon->end_date=date('Y-m-d',strtotime($request->post('end_date')));
					$coupon->minorder_amount=implode(',',$request->post('minorder_amount'));
					$coupon->discount_type=$request->post('discount_type');
					$coupon->discount_amount=implode(',',$request->post('discount_amount'));
					
					$coupon->save();
					
					if((int) $request->post('id')==0){
						
						return response(array('message'=>'Coupon added successfully.','reset'=>true),200);
					}else{
						
						return response(array('message'=>'Coupon updated successfully.','reset'=>false),200);
					
					}
				}
				
			}
			return response(array('message'=>'Data not found.'),403);
		}
		
		$result=[];
		$users = \App\Models\User::where('user_type','Large distributors')->get();
        return view('admin.catalog.coupon.add',compact('result','users'));
    }
	
	public function couponList(){

		$users = \App\Models\User::where('user_type','Large distributors')->get();
		$result=Coupon::where('created_by',\Auth::user()->id)->where('type','Retail')->where('recyclebin_status','0')->orderBy('id','DESC')->get();
		
		return view('admin.catalog.coupon.list',compact('result','users'));
	}
	
	public function updateCoupon(Request $request,$id){
		
		$result=Coupon::find($id);
		
		if($result){

			return view('admin.catalog.coupon.add',compact('result'));
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function deleteCoupon(Request $request,$id){
		
		$result=Coupon::find($id);
		
		if($result){
			
			Coupon::where('id',$id)->update(['recyclebin_status'=>'1','recyclebin_datetime'=>date('Y-m-d H:i:s')]);
			
			return redirect()->back()->with('adminsuccess','Coupon deleted successfully.');
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function changeStatus(Request $request){
		
		Coupon::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Coupon status changed successfully.'),200);
	}

	 
    public function businessAdd(Request $request){
			
		if($request->isMethod('post')){
			
			$rules=[
				'id'=>'numeric|required',
				'business_type'=>'required|in:Small Business Owners,Custom Merchandise,Large distributors,Design studio',
				'minorder_amount'=>'required|array',
				'minorder_amount.*'=>'required|numeric',
				'discount_type'=>'required',
				'discount_amount'=>'required|array',
			];

			if($request->post('discount_type')=='1'){

				$rules['discount_amount.*']='required|numeric|max:100|min:0';

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
				
				$totalstart_range=count($request->post('minorder_amount'));
                  
                for($i=0;$i<$totalstart_range-1;$i++){
                    
                    if(($request->post('minorder_amount')[$i]==0) || ($request->post('minorder_amount')[$i+1]>$request->post('minorder_amount')[$i])){
                       
                    }else{
                        return response(array('message'=>'Invalid Entered Start Order Amount. Please check once.'),403);
                    }
                    
                }

				// check unique coupon title
				$titleResult=BusinessCoupon::where('business_type',$request->post('business_type'))->where('recyclebin_status','0')->where('id','!=',$request->post('id'))->first();
				
				if($titleResult){
					
					return response(array('message'=>'Coupon already exist'),403);
					
				}else{
					
					if((int) $request->post('id')>0){
					
						$coupon=BusinessCoupon::find($request->post('id'));

					}else{
						
						$coupon=new BusinessCoupon();
					
					}
					
					$coupon->business_type=$request->post('business_type');
					$coupon->minorder_amount=implode(',',$request->post('minorder_amount'));
					$coupon->discount_type=$request->post('discount_type');
					$coupon->discount_amount=implode(',',$request->post('discount_amount'));
					
					$coupon->save();
					
					if((int) $request->post('id')==0){
						
						return response(array('message'=>'Business coupon added successfully.','reset'=>true),200);
					}else{
						
						return response(array('message'=>'Business coupon updated successfully.','reset'=>false),200);
					
					}
				}
			}
			return response(array('message'=>'Data not found.'),403);
		}
		
		$result=[];
        return view('admin.catalog.coupon.add_business',compact('result'));
    }
	
	public function businessCouponList(){

		$result=BusinessCoupon::where('recyclebin_status','0')->orderBy('id','DESC')->get();
		
		return view('admin.catalog.coupon.list_business',compact('result'));
	}
	
	public function businessUpdateCoupon(Request $request,$id){
		
		$result=BusinessCoupon::find($id);
		
		if($result){

			return view('admin.catalog.coupon.add_business',compact('result'));
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function businessDeleteCoupon(Request $request,$id){
		
		$result=BusinessCoupon::find($id);
		
		if($result){
			
			BusinessCoupon::where('id',$id)->update(['recyclebin_status'=>'1','recyclebin_datetime'=>date('Y-m-d H:i:s')]);
			
			return redirect()->back()->with('adminsuccess','Business coupon deleted successfully.');
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function businessStatus(Request $request){
		
		BusinessCoupon::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Business coupon status changed successfully.'),200);
	}
	
	public function couponGetCurrencyValue(Request $request){
		
		if($request->isMethod('post')){
			
			$rules=[
				'value'=>'numeric|required',
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
				
				
				$usdCurrency=\App\Helpers\commonHelper::getPriceAmountByCountryId($request->value,'2');
				$cadCurrency=\App\Helpers\commonHelper::getPriceAmountByCountryId($request->value,'3');
				
					
				return response(array('message'=>'','usdCurrency'=>$usdCurrency,'cadCurrency'=>$cadCurrency),200);
					
				
			}
		}
		
	}

}
