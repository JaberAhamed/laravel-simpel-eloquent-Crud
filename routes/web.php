<?php

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

/*Route::get(, function () {
    return view('post.index');
});*/


Route::get('/','pagecontroller@index');
Route::get('contract/us','pagecontroller@contract')->name('contact');

Route::get('abbout/us','pagecontroller@aboutus')->name('about');

Route::get('write','PostController@writepost')->name('write.post');
//categore store

Route::get('allcategory','PostController@allCategory')->name('all.category');
Route::get('addcategory','PostController@addCategory')->name('add.category');
Route::post('storecate','PostController@storecategory')->name('store.cate');
Route::get('view/singlecat/{id}','PostController@singlecategory');
Route::get('view/deletecat/{id}','PostController@deletecategory');
Route::get('view/update/{id}','PostController@updatecategory');
Route::post('view/updatecat/{id}','PostController@upcat');

//user post 

Route::post('userpost','userpostcontroller@userPost')->name('user.post');
Route::get('allpostcategory','userpostcontroller@allpostegory')->name('all.post');
Route::get('view/singlepost/{id}','userpostcontroller@singlepost');
Route::get('view/postedit/{id}','userpostcontroller@singlepostedit');
Route::post('view/singlepostedit/{id}','userpostcontroller@updatepost');
Route::get('view/deletepost/{id}','userpostcontroller@deletepost');

//student insert

/*Route::get('vies/student','studentcontroller@index')->name('view.student');
Route::post('vies/student/data/insert','studentcontroller@create')->name('userinfo.insert');
Route::get('vies/student/all','studentcontroller@store')->name('all.student');
Route::get('view/student/show/{id}','studentcontroller@show');
Route::get('view/student/delete/{id}','studentcontroller@destroy');
Route::get('view/student/edit/{id}','studentcontroller@edit');
Route::post('studentinfo/update/{id}','studentcontroller@update');*/

/*Route:resource('student','Studentcontroller');*/

Route::resource('/student', 'Studentcontroller');

