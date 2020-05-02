<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class postController extends Controller
{
    public function writePost(){
    	$post = DB::table('categories')->get();
    	return view('posts.writepost',compact('post'));
    }

    public function storePost(Request $request){

    	$validatedData = $request->validate([
    		'title' => 'required|max:200|min:4',
    		'details' => 'required|min:4',
    		'image' => 'required| mimes:jpeg,jpg,png,JPEG| max:2000'
    	]);

    	$data = array();
    	$data['title'] =  $request->title;
    	$data['category_id'] =  $request->category_id;
    	$data['details'] =  $request->details;
    	$image = $request->file('image');

    	if($image){
    		$image_name = hexdec(uniqid());
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'public/postImage/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		$data['image'] = $image_url;

    		DB::table('posts')->insert($data);
    		$notification=array(
    			'message' => 'Post created Successfully.',
    			'alert-type' => 'success'
    		);
    		return Redirect()->back()->with($notification);

    	}else{
    		DB::table('posts')->insert($data);
    		$notification=array(
    			'message' => 'Post created Successfully.',
    			'alert-type' => 'success'
    		);
    		return Redirect()->back()->with($notification);
    	}
    }

    public function allPost(){
    	$post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name')
        ->get();
    	return view('posts.allpost')->with('data',$post);
    }

    public function showPost($id){
        $post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name')
        ->where('posts.id',$id)
        ->first();
        return view('posts.showpost')->with('data',$post);
    }

    public function editPost($id){
        $category = DB::table('categories')->get();
        $post=DB::table('posts')->where('id',$id)->first();       
         return view('posts.editpost',compact('category','post'));
    }

    public function updatePost(Request $request,$id){

        $validatedData = $request->validate([
            'title' => 'required|max:200|min:4',
            'details' => 'required|min:4',
            'image' => 'mimes:jpeg,jpg,png,JPEG| max:2000'
        ]);

        $data = array();
        $data['title'] =  $request->title;
        $data['category_id'] =  $request->category_id;
        $data['details'] =  $request->details;
        $image = $request->file('image');

        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/postImage/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;
            unlink($request->old_photo);

            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message' => 'Post update Successfully.',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.post')->with($notification);

        }else{
            $image = $request->old_photo;
            DB::table('posts')->where('id',$id)->update($data);            
            $notification=array(
                'message' => 'Post update Successfully.',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
    }

    public function deletePost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image = $post->image;
        unlink($image);
        $delete=DB::table('posts')->where('id',$id)->delete();

        return Redirect()->route('all.post');
    }

}
