<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class deleteCategoryController extends Controller
{
    public function deleteCategory($id){
    	$category=DB::table('categories')->where('id',$id)->delete();

		return Redirect()->back();
	}
}
