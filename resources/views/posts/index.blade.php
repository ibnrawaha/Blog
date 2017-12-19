@extends('layouts.app')

@section('content')

<h1>The Blog</h1>
<small><i>{{ $posts->lastItem() }} posts of {{ $posts->total() }} post</i></small>
{{-- <pre> --}}
	<?php 
		// var_dump($_SERVER);  
		$path = $_SERVER['DOCUMENT_ROOT']."/data.txt";
	?>
{{-- </pre> --}}


<div id="ajaxTest">
	<p>This is Paragraph</p>
</div>
<button id="btn" onclick="changeTXT()">Change text</button>





@if (auth()->user())
	<div class="height-kik-40">
		<button class="btn btn-primary float-right"><a href="/posts/create">Create New Post</a></button>
	</div>
@else

	<div class="well bg-danger">
		<a href="/login">Login</a> or <a href="/register">Register</a> to add posts.
	</div>

@endif

<form action="/search" method="get" class="form-group mg-t-20">
	{{-- {!! csrf_field() !!} --}}
	<input type="text" class="form-control float-left col-md-6 mg-r-10" name="search" placeholder="Search for a post... ">
	<button class="btn btn-default form-control col-md-2 mg-l-10" >Search</button>
</form>
@if (isset($_GET['search']))
	<h3>Results for <small>{{$_GET['search']}}</small> </h3>
@endif

{{ $posts->links() }}

@foreach ($posts as $post)

<div class="well pd-t-15 pd-b-15 pd-l-15 pd-r-15">
	<div class="col-kik-8">
		<a href="/posts/{{ $post->id }}/{{ str_replace(' ', '-', strtolower($post->title)) }}">
			<div class="thumbImgDiv float-left mg-r-20">
				<img src="/storage/image/uploads/{{$post->image}}" alt="" class="thumbImg">
			</div>
			<h6>{{$post->title}}</h6>
			@if (strlen($post->content) > 300)
				<p>{!!substr($post->content, 0 , 300)!!} <span class="bg-dark">... Read More</span></p>
			@else
				<p>{!!$post->content!!}</p>
			@endif
			<small>Created at {{$post->created_at}} by {{ucfirst($post->user->name)}}</small>
		</a>
		
		{{-- {{auth()->user()->id}} --}}
			{{-- expr --}}
		@if (auth()->check())
			@if (auth()->user()->id == $post->user_id)
				{{-- <div class="col-kik-3"> --}}
				<div class="float-right">
					<a href="/posts/{{$post->id}}/edit" class="btn btn-primary float-left buttons">Edit</a>
					{{-- <form action="{{route('posts.destroy', $post->id)}}" method="post" class="buttons float-right">
						{!!csrf_field()!!}
						{{method_field('DELETE')}}
						<button class="btn btn-danger" id="delItem" >Delete</button>
					</form> --}}
					<a href="/posts/{{$post->id}}/delete" class="btn btn-danger float-right buttons">Delete</a>
				</div>
			@endif
		@endif
	</div>
</div>

@endforeach



{{ $posts->links() }}

@endsection