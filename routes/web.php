<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/about','HelloController@index');

/*Route::group(['middleware'=>['age']],function(){

	  Route::get('/middlewareCheck',function(){
	   echo "checking middleware";
    });
	  Route::get('/check',function(){
	  echo "Check Page";
    });
});*/

Route::get('/new','NewController@index');

Route::get('/contact',function(){
	return view('pages.contact');
})->name('contact');

Route::get('/home',function(){
	echo "Home Page";
});

Route::get('/about/us','HelloController@about');
Route::get('write/post','NewController@writePost')->name('write.post');

///Category Crud
Route::get('all/category','NewController@AllCategory')->name('all.category');
Route::get('add/category','NewController@AddCategory')->name('add.category');
Route::post('store/category','NewController@PostCategory')->name('store.category');
Route::get('view/category/{id}','NewController@ViewCategory');
Route::get('delete/category/{id}','NewController@DeleteCategory')->name('delete.category');
Route::get('edit/category/{id}','NewController@EditCategory')->name('delete.category');
Route::post('update/category/{id}','NewController@UpdateCategory');


///post crud here
Route::get('write/post','PostController@writePost')->name('write.post');
Route::post('store/post','PostController@StorePost')->name('store.post');
Route::get('all/post','PostController@AllPost')->name('all.post');
Route::get('view/post/{id}','PostController@ViewPost');

/*Route::prefix('/pages')->group(function(){
   Route::get('/test1',function(){
	echo "check test1";
   });

   Route::get('/test2',function(){
	 echo "check test2";
   });
});*/