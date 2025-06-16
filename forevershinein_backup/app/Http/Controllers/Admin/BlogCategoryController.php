<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    public function add(Request $request){
			
		if($request->isMethod('post')){
			
			$rules=[
				'id'=>'numeric|required',
				'name'=>'required|unique:blog_categories,name,'.$request->post('id'),
			];
			
			$validator = \Validator::make($request->all(), $rules);
			
			if ($validator->fails()){
				$message = "";
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				}
				
				return response(array('message'=>$message),403);
				
			}else{
            
                if((int) $request->post('id')>0){

                    $cate=\App\Models\BlogCategory::find($request->post('id'));

                }else{
                    
                    $cate=new \App\Models\BlogCategory();
                
                }
				if($request->hasFile('image')){
                    $imageData = $request->file('image');
					$image = strtotime(date('Y-m-d H:i:s')).'.'.$imageData->getClientOriginalExtension();
					$destinationPath = public_path('/uploads/blog');
					$imageData->move($destinationPath, $image);

                    $cate->image=$image;
                } 
                $cate->name=$request->name;
                $cate->parent_id=$request->parent_id;
                $cate->slug=\Str::slug($request->name);
                
                $cate->save();
                
                if((int) $request->post('id')==0){
                    
                    return response(array('message'=>'Category added successfully.','reset'=>true),200);
                }else{
                    
                    return response(array('message'=>'Category updated successfully.','reset'=>false),200);
                
                }

			}
			return response(array('message'=>'Data not found.'),403);
		}
		
		$category=\App\Models\BlogCategory::where('parent_id','0')->orderBy('name','ASC')->get();

		$dataarray = array(); 

		$dataarray['0'] = "-- Select --";
		 
		if($category){

			foreach($category as $key => $par){

				$dataarray[$par->id] = $par->name;
			}
		}
		$result=[];
        return view('admin.blog_category.add',compact('result','dataarray'));
    }

    public function categoryList(Request $request){
		
		
		$result=\App\Models\BlogCategory::orderBy('id','Desc')->get();

        return view('admin.blog_category.list',compact('result'));
	}

    public function changeStatus(Request $request){
		
		\App\Models\BlogCategory::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Category status changed successfully.'),200);
	}

    
    public function categoryDelete(Request $request, $id)
    {
		$checkResult=\App\Models\BlogCategory::find($id);
		
		if($checkResult){

			\App\Models\BlogCategory::where('id', $id)->delete();
			$request->session()->flash('success','Category deleted successfully.');
		}else{
			$request->session()->flash('error','Something went wrong. Please try again.');
		}
		
		return redirect()->route('admin.category.list');

    }

    public function categoryUpdate($id){
		
		$result=\App\Models\BlogCategory::find($id);

		if(!$result){

			$request->session()->flash('error','Something went wrong.please try again.');
			return redirect()->back();
		}

		$category=\App\Models\BlogCategory::where('parent_id','0')->orderBy('name','ASC')->get();

		$dataarray = array(); 

		$dataarray['0'] = "-- Select --";
		 
		if($category){

			foreach($category as $key => $par){

				$dataarray[$par->id] = $par->name;
			}
		}
		
		return view('admin.blog_category.add')->with(compact('result','dataarray'));
	}
	
}
