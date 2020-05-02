@extends('welcome')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
        	<a href="{{ route('all.post') }}" class="btn btn-info">All Post</a>
        	<a href="{{ route('write.post') }}" class="btn btn-primary">Write Post</a>
        <hr>
        
        <div>
          <h3>{{ $data->title }}</h3>
          <img src="{{ URL::to($data->image) }}">
          <p><b>Category Name: {{ $data->name }}</b></p>
          <p>{{ $data->details }}</p>

        </div>        
      </div>
    </div>
  </div>

@endsection