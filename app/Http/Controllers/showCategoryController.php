<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class showCategoryController extends Controller
{
    public function showCategory($id){
    	$category=DB::table('categories')->where('id',$id)->first();

    	//return response()->json($category);
    	return view('posts.showcategory')->with('data',$category);
    	
    	
    }

}
