<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HelloController extends Controller
{
    public function index(){
    	return "Hello from method index";
    }

    public function about(){
    	return view('about');
    }
    public function home(){ 

    	$post = DB::table('posts')->join('categories','posts.category_id','categories.id')
                ->select('posts.*','categories.name','categories.slug')->paginate(3);

        //return response()->json($post); 
         return view('pages.home',compact('post'));        
   }
}
