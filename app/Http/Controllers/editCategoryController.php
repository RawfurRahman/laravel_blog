<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class editCategoryController extends Controller
{
    public function editCategory($id){
    	$category=DB::table('categories')->where('id',$id)->first();

    	//return response()->json($category);
    	return view('posts.editcategory')->with('data',$category);
    	
    	
    }
}
