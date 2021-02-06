<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function writePost(){
      $category = DB::table('categories')->get();
   	  return view('post.writepost',compact('category'));
   }

   public function StorePost(Request $request){
   	$validateData = $request->validate([
       'title'=>'required|max:125',
       'details'=>'required|max:400',
       'image'=>'required | mimes:jpeg,jpg,png|max:2000'       
   	]);

   	$data=array();
   	$data['title']=$request->title;
   	$data['category_id']=$request->category_id;
   	$data['details'] = $request->details;
   	$image = $request->file('image');
   	if($image){
      $image_name = Str::random(5);
      $ext = Str::lower($image->getClientOriginalExtension());
      $image_full_name = $image_name.'.'.$ext;
      $upload_path = 'public/Frontend/Image/';
      $image_url = $upload_path.$image_full_name;
      $success = $image->move($upload_path,$image_full_name);
      $data['image']=$image_url;
      DB::table('posts')->insert($data);

      $notification=array(
   			'message'=>'Successfully Post Inserted',
   			'alert-type'=>'success'
   		);

   		return Redirect()->back()->with($notification);

   	}else{
   		DB::table('posts')->insert($data);
   		$notification=array(
   			'message'=>'Successfully Post Inserted',
   			'alert-type'=>'success'
   		);

   		return Redirect()->back()->with($notification);
   	}
   }

   public function AllPost(){
     $post = DB::table('posts')
             ->join('categories','posts.category_id','categories.id')
             ->select('posts.*','categories.name','categories.slug')
             ->get();
     return view('post.allpost',compact('post'));
     // return response()->json($post);       
   }

   public function ViewPost($id){
      $post = DB::table('posts')
             ->join('categories','posts.category_id','categories.id')
             ->select('posts.*','categories.name','categories.slug')
             ->where('posts.id',$id)
             ->first();
      return view('post.viewpost',compact('post'));       
   }
}
