<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    public function Welcome(){
    	$post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name','categories.slug')
        ->paginate(3);
    	return view('/home',compact('post'));
    }
}
