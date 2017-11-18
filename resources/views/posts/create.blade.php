@extends('layouts.app')

@section('content')

	<h3>Create Post</h3>
	
	<form action="{{route('posts.store')}}" class="form-group" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<label for="Title">Title</label>
		<input type="text" placeholder="Enter Title" class="form-control" name="title">
		
		<label for="Title">Content</label>
		<textarea name="content" id="article-ckeditor" cols="30" rows="10" placeholder="Enter Content" class="form-control"></textarea>
		
		<br>

		<input type="file" name="image" accept="image/*" placeholder="Upload Image">

		<button name="submit" class="btn btn-primary">Submit</button>

	</form>

@endsection