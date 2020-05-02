@extends('welcome')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
        	<a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
        	<a href="{{ route('all.category') }}" class="btn btn-info">All Category</a>
          <a href="{{ route('all.post') }}" class="btn btn-info">All Post</a>
        <hr>

        <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Title" name="title" required data-validation-required-message="Please enter your post title.">
            </div>

          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Select Category</label>
              <select class="form-control" name="category_id">
                @foreach($post as $row)
              	<option value="{{ $row->id }}">{{ $row->name }}</option>
              	@endforeach
              </select>
		  </div>

          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" name="image" required >
		  </div>

          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Details</label>
              <textarea class="form-control" rows="7" placeholder="Details" name="details" required data-validation-required-message="Please enter your post details .">
                
              </textarea>
		  </div>

          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Add Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection