<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\ArtisiansInfo;

class ArtisanController extends Controller
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
				'name'=>'required',
				'description'=>'required'
			];
			
			if((int) $request->post('id')==0){
						
				$rules['image']='required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
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
				 
				$image=$request->post('old_image');
				
				if($request->hasFile('image')){
					$imageData = $request->file('image');
					$image = strtotime(date('Y-m-d H:i:s')).'.'.$imageData->getClientOriginalExtension();
					$destinationPath = public_path('/uploads/artisan');
					$imageData->move($destinationPath, $image);
				} 
				
				if((int) $request->post('id')>0){
					
					$testimonial=ArtisiansInfo::find($request->post('id'));
				}else{
					
					$testimonial=new ArtisiansInfo();
				
				}
				
				$testimonial->name=$request->post('name');
				$testimonial->image=$image;
				$testimonial->description=$request->post('description');
				
				$testimonial->save();
				
				if((int) $request->post('id')==0){
					
					return response(array('message'=>'Artisan added successfully.','reset'=>true),200);
				}else{
					
					return response(array('message'=>'Artisan updated successfully.','reset'=>false),200);
				
				} 
			}
			return response(array('message'=>'Data not found.'),403);
		}
		
		$result=[];
        return view('admin.artisan.add',compact('result'));
    }
	
	public function List(){

		$result=ArtisiansInfo::where('recyclebin_status','0')->orderBy('id','DESC')->get();
		
		return view('admin.artisan.list',compact('result'));
	}
	
	public function update(Request $request,$id){
		
		$result=ArtisiansInfo::find($id);
		
		if($result){
			 
			return view('admin.artisan.add',compact('result'));
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function delete(Request $request,$id){
		
		$result=ArtisiansInfo::find($id);
		
		if($result){
			
			ArtisiansInfo::where('id',$id)->update(['recyclebin_status'=>'1','recyclebin_datetime'=>date('Y-m-d H:i:s')]);
			
			return redirect()->back()->with('adminsuccess','Artisians deleted successfully.');
			
		}else{
			
			return redirect()->back()->with('adminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function changeStatus(Request $request){
		
		ArtisiansInfo::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);

		return response(array('message'=>'Artisan status changed successfully.'),200);
	}

}
