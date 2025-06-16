<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use \App\Models\Staff;

class StaffController extends Controller{
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	 
	 
    public function add(Request $request){

		if($request->isMethod('post')){
			
			$rules=[
				'id'=>'numeric|required',
				'name'=>'required',
				'location'=>'required',
				'designation'=>'required'
			];
			 
			if((int) $request->post('id')==0){
						
				$rules['image']='required|image|mimes:jpeg,png,jpg,gif,svg';
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
				
				try{
					if((int) $request->post('id')>0){
						
						$slider=Staff::find($request->post('id'));
					}else{
						
						$slider=new Staff();
					
					}
					
					$image=$request->post('old_image');
					
					if($request->hasFile('image')){
						$imageData = $request->file('image');
						$image = strtotime(date('Y-m-d H:i:s')).'.'.$imageData->getClientOriginalExtension();
						$destinationPath = public_path('/uploads/staff');
						$imageData->move($destinationPath, $image);
					} 
					
					$slider->name=$request->post('name');
					$slider->location=$request->post('location');
					$slider->designation=$request->post('designation');
					$slider->image=$image;
					
					$slider->save();
					
					if((int) $request->post('id')>0){
						
						return response(array('message'=>'Staff data updated successfully.','reset'=>false),200);
					}else{
						
						return response(array('message'=>'Staff added successfully.','reset'=>true,'script'=>true),200);
					
					}
				}catch (\Exception $e){
			
					return response(array("message" => $e->getMessage()),403); 
				
				}
			}
			
			return response(array('message'=>'Data not found.'),403);
		}
		
		$result=[];
        return view('admin.staff.add',compact('result'));
    }
	
	public function List(){
		
		$result=Staff::where('recyclebin_status','0')->orderBy('id','DESC')->get();
		
		return view('admin.staff.list',compact('result'));
	}
	
	public function changeStatus(Request $request){
		
		Staff::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Staff status changed successfully.'),200);
	}
	
	
	public function update(Request $request,$id){
		
		$result=Staff::find($id);
		
		if($result){
			
			return view('admin.staff.add',compact('result'));
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function delete(Request $request,$id){
		
		$result=Staff::find($id);
		
		if($result){
			
			Staff::where('id',$id)->update(['recyclebin_status'=>'1','recyclebin_datetime'=>date('Y-m-d H:i:s')]);
			
			return redirect()->back()->with('adminsuccess','Staff deleted successfully.');
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
}
