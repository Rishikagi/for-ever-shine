<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Coupon;

class SettingController extends Controller
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
	 
	 
    public function updatePrice(Request $request){


		if($request->ajax()){

			$rules=[
				'usa_standard_delivery'=>'numeric|required',
				'usa_normal_delivery'=>'numeric|required',
				'usa_maximum_delivery'=>'numeric|required',
				'cad_standard_delivery'=>'numeric|required',
				'cad_normal_delivery'=>'numeric|required',
				'cad_maximum_delivery'=>'numeric|required',
				'inrd_standard_delivery'=>'numeric|required',
				'inrd_normal_delivery'=>'numeric|required',
				'inrd_maximum_delivery'=>'numeric|required',
				'inri_standard_delivery'=>'numeric|required',
				'inri_normal_delivery'=>'numeric|required',
				'inri_maximum_delivery'=>'numeric|required',
			];

			$messages = array(
				'usa_standard_delivery.required' => "USA standard Delivery is required",
				'usa_normal_delivery.required' => "USA Normal Delivery is required",
				'usa_maximum_delivery.required' => "USA Maximum Delivery is required",
				'cad_standard_delivery.required' => "Canada Standard Delivery is required",
				'cad_normal_delivery.required' => "Canada Normal Delivery is required",
				'cad_maximum_delivery.required' => "Canada Maximum Delivery is required",
				'inrd_standard_delivery.required' => "Rest of world domestic standard delivery is required",
				'inrd_normal_delivery.required' => "Rest of world domestic normal delivery is required",
				'inrd_maximum_delivery.required' => "Rest of world domestic maximum delivery is required",
				'inri_standard_delivery.required' => "Rest of world international standard delivery is required",
				'inri_normal_delivery.required' => "Rest of world international normal delivery is required",
				'inri_maximum_delivery.required' => "Rest of world international maximum delivery is required",
			);

			$validator = Validator::make($request->all(), $rules, $messages);
			
			if ($validator->fails()){
				$message = [];
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				}
				
				return response(array('message'=>$message),403);
				
			}else{

				\App\Models\Setting::where('id','1')->update(['value'=>$request->post('usa_standard_delivery'),'label'=>$request->post('usa_standard_label'),'description'=>$request->post('usa_standard_desc')]);

				\App\Models\Setting::where('id','2')->update(['value'=>$request->post('usa_normal_delivery'),'label'=>$request->post('usa_normal_label'),'description'=>$request->post('usa_normal_desc')]);

				\App\Models\Setting::where('id','3')->update(['value'=>$request->post('usa_maximum_delivery'),'label'=>$request->post('usa_maximum_label'),'description'=>$request->post('usa_maximum_desc')]);

				\App\Models\Setting::where('id','4')->update(['value'=>$request->post('cad_standard_delivery'),'label'=>$request->post('cad_standard_label'),'description'=>$request->post('cad_standard_desc')]);

				\App\Models\Setting::where('id','5')->update(['value'=>$request->post('cad_normal_delivery'),'label'=>$request->post('cad_normal_label'),'description'=>$request->post('cad_normal_desc')]);

				\App\Models\Setting::where('id','6')->update(['value'=>$request->post('cad_maximum_delivery'),'label'=>$request->post('cad_maximum_label'),'description'=>$request->post('cad_maximum_desc')]);
				
				\App\Models\Setting::where('id','7')->update(['value'=>$request->post('inrd_standard_delivery'),'label'=>$request->post('inrd_standard_label'),'description'=>$request->post('inrd_standard_desc')]);

				\App\Models\Setting::where('id','8')->update(['value'=>$request->post('inrd_normal_delivery'),'label'=>$request->post('inrd_normal_label'),'description'=>$request->post('inrd_normal_desc')]);

				\App\Models\Setting::where('id','9')->update(['value'=>$request->post('inrd_maximum_delivery'),'label'=>$request->post('inrd_maximum_label'),'description'=>$request->post('inrd_maximum_desc')]);

				\App\Models\Setting::where('id','10')->update(['value'=>$request->post('inri_standard_delivery'),'label'=>$request->post('inri_standard_label'),'description'=>$request->post('inri_standard_desc')]);

				\App\Models\Setting::where('id','11')->update(['value'=>$request->post('inri_normal_delivery'),'label'=>$request->post('inri_normal_label'),'description'=>$request->post('inri_normal_desc')]);

				\App\Models\Setting::where('id','12')->update(['value'=>$request->post('inri_maximum_delivery'),'label'=>$request->post('inri_maximum_label'),'description'=>$request->post('inri_maximum_desc')]);

				return response(array('message'=>"Price updated successfully."),200);
			}
		}

		$result=\App\Models\Setting::where(function($query){
								$query->Where('id','1');
								$query->orWhere('id','2');
								$query->orWhere('id','3');
								$query->orWhere('id','4');
								$query->orWhere('id','5');
								$query->orWhere('id','6');
								$query->orWhere('id','7');
								$query->orWhere('id','8');
								$query->orWhere('id','9');
								$query->orWhere('id','10');
								$query->orWhere('id','11');
								$query->orWhere('id','12');
							})->get();

		return view('admin.settings.update_price',compact('result'));		

	}

    public function updateCurrency(Request $request){

		if($request->ajax()){

			$rules=[
				'name'=>'required',
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

				foreach($request->name as $key=>$name){

					\App\Models\Currency_value::where('id',$key+1)->update(['value'=>$name]);
				}
				
				return response(array('message'=>'Updated successfully'),200);
			}
		}

		$currency =\App\Models\Currency_value::all();
		
		return view('admin.settings.currency_price',compact('currency'));		

	}

}
