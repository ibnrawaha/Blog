@extends('layouts.app')

@section('content')
	

	<a href="{{ URL::previous() }}" class="btn btn-outline-secondary float-right"><b><< Back</b></a>
	<h3>{{$post->title}}</h3>
	<small>Created at {{$post->created_at}}, by {{ucfirst($post->user->name)}}</small>
	<hr>
	<div class="d-flex justify-content-center">
		<img class='align-middle' src="/storage/image/{{$post->image}}" alt="fff">
	</div>
	<br>
	<p>{!!$post->content!!}</p>
	
	{{-- <h3>{{$data->post('title')}}</h3> --}}
	{{-- <p>{{$data->post('content')}}</p> --}}

	
	<hr>

	@include ('comments.show')



@endsection