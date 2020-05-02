<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class updateCategoryController extends Controller
{
    public function updateCategory(Request $request,$id){

    	$validatedData = $request->validate([
    		'name' => 'required|max:25|min:4',
    		'slug' => 'required|max:25|min:4'
    	]);

    	$data = array();
    	$data['name'] =  $request->name;
    	$data['slug'] =  $request->slug;
    	$category = DB::table('categories')->where('id',$id)->update($data);

       	if($category){
    		$notification=array(
    			'message' => 'Category Updated Successfully.',
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
