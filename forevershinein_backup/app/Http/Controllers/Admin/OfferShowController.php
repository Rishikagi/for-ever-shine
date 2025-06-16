<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\OfferShow;

class OfferShowController extends Controller
{
    
    public function Add(){
		$result=OfferShow::where('id','1')->first();
		return view('admin.offer.add',compact('result'));
	}

    public function UpdateDetail(Request $request){

		if($request->isMethod('post')){
			
			$rules=[
				'id'=>'required',
				'link'=>'required',
				'title'=>'required'
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
						if((int) $request->post('id')>0){
							
							$Information=OfferShow::find($request->post('id'));
						}else{
							
							$Information=new OfferShow();
						
						}
						
						$Information->link=$request->post('link');
						$Information->title=$request->post('title');
						
						$Information->save();
						
						return response(array('message'=>'Offer updated successfully.'),200);
						
					}catch (\Exception $e){
				
						return response(array("message" => $e->getMessage()),403); 
					
					}
			}
		}
		
        return view('admin.offer.add');
    }
	
}
