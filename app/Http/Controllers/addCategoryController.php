<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class addCategoryController extends Controller
{
    public function addCategory(){
    	return view('posts.addcategory');
    }

    public function storeCategory(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:categories|max:25|min:4',
    		'slug' => 'required|unique:categories|max:25|min:4'
    	]);

    	$data = array();
    	$data['name'] =  $request->name;
    	$data['slug'] =  $request->slug;
    	$category = DB::table('categories')->insert($data);

       	if($category){
    		$notification=array(
    			'message' => 'Successfully Category Added',
    			'alert-type' => 'success'
    		);
    		return Redirect()->route('all.category')->with($notification);
    	}else{
    		$notification=array(
    			'message' => 'Something went wrong',
    			'alert-type' => 'error'
    		);
    		return Redirect()->route('all.category')->with($notification);
    	}
    }
}
