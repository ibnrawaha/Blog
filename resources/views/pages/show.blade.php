@extends('layouts.app')

@section('content')
	

	<a href="{{ URL::previous() }}" class="btn btn-outline-secondary float-right"><b><< Back</b></a>

	{{-- {{dd($page)}} --}}
	<div class="page-style">

	<h1>{!!ucwords($page->title)!!}</h1>
	<br>
	{{-- <img src="/storage/image/{{$page->image}}" alt="fff"> --}}
	<br>
	<p>{!!$page->content!!}</p>
	
 	</div>
	
	{{-- <h3>{{$data->post('title')}}</h3> --}}
	{{-- <p>{{$data->post('content')}}</p> --}}
	{{-- <hr> --}}
	{{-- <small>Created at {{$post->created_at}}, by {{ucfirst($post->user->name)}}</small> --}}


@endsection