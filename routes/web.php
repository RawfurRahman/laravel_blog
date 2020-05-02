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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','WelcomeController@Welcome');

//category CRUD are here
Route::get('category/all','allCategoryController@allCategory')->name('all.category');
Route::get('category/post','addCategoryController@addCategory')->name('add.category');
Route::post('category/store','addCategoryController@storeCategory')->name('store.category');
Route::get('show/category/{id}','showCategoryController@showCategory');
Route::get('delete/category/{id}','deleteCategoryController@deleteCategory');
Route::get('edit/category/{id}','editCategoryController@editCategory');
Route::post('update/category/{id}','updateCategoryController@updateCategory');

//Post CRUD are here
Route::get('write/post','postController@writePost')->name('write.post');
Route::post('store/post','postController@storePost')->name('store.post');
Route::get('all/post','postController@allPost')->name('all.post');
Route::get('show/post/{id}','postController@showPost');
Route::get('edit/post/{id}','postController@editPost');
Route::post('update/post/{id}','postController@updatePost');
Route::get('delete/post/{id}','postController@deletePost');