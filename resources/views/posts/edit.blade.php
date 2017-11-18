@extends('layouts.app')

@section('content')

	<h3>Edit Post</h3>
	
	<form action="{{ route('posts.update', $post->id) }}" class="form-group" method="post">

		{{-- REQUIRED FOR UPDATING --}}
		{!! csrf_field() !!}
		{{ method_field('PUT') }}
		{{-- END REQUIRE --}}

		<label for="Title" >Title</label>
		<input type="text" placeholder="Enter Title" class="form-control" name="title" value="{{$post->title}}">
		
		<label for="Title">Content</label>
		<textarea name="content" id="article-ckeditor" cols="30" rows="10" placeholder="Enter Content" class="form-control">{{$post->content}}</textarea>
		
		<br>
		<button name="submit" class="btn btn-primary">Update</button>
	</form>

@endsection