<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;

class NewController extends Controller
{
   public function index(){
   	return view ('new.index');
   }   

   public function AddCategory(){
   	return view('post.add_category');
   }

   public function PostCategory(Request $request){
   	$validateData = $request->validate([
       'name' => 'required|unique:categories|max:25|min:4',
       'slug' => 'required|unique:categories|max:25|min:4',
   	]);

   	$data = array();
   	$data['name']=$request->name;
   	$data['slug']=$request->slug;
   	$category=DB::table('categories')->insert($data);
   	if($category){
   		$notification=array(
   			'message'=>'Successfully Category Inserted',
   			'alert-type'=>'success'
   		);
   		return Redirect()->route('all.category')->with($notification);
   	}else{
   	       $notification=array(
   			'message'=>'Something Went Wrong',
   			'alert-type'=>'error'
   		);
   		return Redirect()->back()->with($notification);	
   	}
   	//return response()->json($data);
   }

   public function AllCategory()
   {
   	 $category=DB::table('categories')->get();

   	 return  view('post.all_category',compact('category'));
   	 //return  view('post.all_category')->with('');
   }

   public function ViewCategory($id)
   {
      $category = DB::table('categories')->where('id',$id)->first();
      //return response()->json($category);
      return view('post.categoryview')->with('cat',$category);
   }

   public function DeleteCategory($id)
   {
   	  $delete = DB::table('categories')->where('id',$id)->delete();
   	  if($delete){
   	  	$notification = array(
   	  		'message'=>'Successfully Category Deleted',
   	  		'alert-type'=>'success'
   	  	);
   	  	return Redirect()->back()->with($notification);
   	  }else{
   	  	$notification=array(
          'message'=>'Something went wrong',
          'alert-type'=>'error'
   	  	);

   	  	return Redirect()->back()->with($notification);
   	  }
   }

   public function EditCategory($id){
	  $category = DB::table('categories')->where('id',$id)->first();
      return view('post.editcategory',compact('category'));   	
   }

   public function UpdateCategory(Request $request,$id){
        $validateData = $request->validate([
       'name' => 'required|max:25|min:4',
       'slug' => 'required|max:25|min:4',
   	]);

   	$data = array();
   	$data['name']=$request->name;
   	$data['slug']=$request->slug;
   	$category=DB::table('categories')->where('id',$id)->update($data);
   	if($category){
   		$notification=array(
   			'message'=>'Successfully Category Updated',
   			'alert-type'=>'success'
   		);
   		return Redirect()->route('all.category')->with($notification);
   	}else{
   	       $notification=array(
   			'message'=>'Nothing To Update',
   			'alert-type'=>'error'
   		);
   		return Redirect()->route('all.category')->with($notification);	
   	}
   }
}
