@extends('layouts.app')

@section('content')

	<h3>Edit Post</h3>
	
	<form action="{{ route('posts.update', $post->id) }}" class="form-group" method="post" enctype="multipart/form-data">

		{{-- REQUIRED FOR UPDATING --}}
		{!! csrf_field() !!}
		{{ method_field('PUT') }}
		{{-- END REQUIRE --}}

		<label for="Title" >Title</label>
		<input type="text" placeholder="Enter Title" class="form-control" name="title" value="{{$post->title}}">
		
		<label for="Content">Content</label>
		<textarea name="content" id="article-ckeditor" cols="30" rows="10" placeholder="Enter Content" class="form-control">{{$post->content}}</textarea>

		<br>

		<div class="thumbImgDiv">
			<h5>Change image?</h5>
			<img src="/storage/image/uploads/{{$post->image}}" class="thumbImg">
		</div>

		
		{{-- <br> --}}

		<input type="file" name="image" accept="image/*" placeholder="Upload Image">

		<button name="submit" class="btn btn-primary">Update</button>
	</form>

@endsection