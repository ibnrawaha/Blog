@extends('layouts.app')

@section('content')


<a href="{{ URL::previous() }}" class="btn btn-outline-secondary float-right"><b><< Back</b></a>
<h3>{{$post->title}}</h3>
<small>Created at {{$post->created_at}}, by <a href="/user/profile/{{$post->user->name}}">{{ucfirst($post->user->name)}}</a></small>
<hr>
<div class="d-flex justify-content-center">
	<img class='align-middle' src="/storage/image/{{$post->image}}" alt="fff">
</div>
<br>

<div class="posts-paragraph">{!!$post->content!!}</div>

{{-- <h3>{{$data->post('title')}}</h3> --}}
{{-- <p>{{$data->post('content')}}</p> --}}


<hr>

@include ('comments.show')



@endsection