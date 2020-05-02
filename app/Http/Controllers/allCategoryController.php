<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class allCategoryController extends Controller
{
    public function allCategory(){
    	$category=DB::table('categories')->get();

    	return view('posts.allcategory',compact('category'));
    }
}
