@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        @foreach($post as $row)      
        <div class="post-preview">
          <a href="post.html">
          <img src="{{ $row->image }}" style="height: 600px;">
           <h2 class="post-title">
              {{ $row->title }}
           </h2>
          </a>
          <p class="post-meta">Category 
          <a href="#">{{ $row->name }}</a>
            on slug , {{ $row->slug }}</p>
        </div>
     </div>
     @endforeach
 </div>
 {{ $post->links() }} 
@endsection