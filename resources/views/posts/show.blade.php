@extends('layouts.app')

@section('content')


@if (auth()->user() && auth()->user()->id == $post->user_id)
	<a href="/posts/{{$post->id}}/edit" class="btn btn-primary buttons float-right">Edit</a>
@endif
<a href="{{ URL::previous() }}" class="btn btn-outline-secondary float-right"><b><< Back</b></a>

<h3>{{$post->title}}</h3>
<small>Created at {{$post->created_at}}, by <a href="/user/profile/{{$post->user->name}}">{{ucfirst($post->user->name)}}</a></small>
<hr>
<div class="image-container">
	<img class='align-middle main-image' src="/storage/image/uploads/{{$post->image}}" alt="fff">
</div>
<br>

<div class="posts-paragraph">{!!$post->content!!}</div>

{{-- <h3>{{$data->post('title')}}</h3> --}}
{{-- <p>{{$data->post('content')}}</p> --}}


<hr>

@include ('comments.show')



@endsection