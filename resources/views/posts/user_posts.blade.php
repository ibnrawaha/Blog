@extends('layouts.app')

@section('content')

<h1>Posts by {{ ucwords($user->name) }}</h1>
<small><i>{{ $posts->lastItem() }} posts of {{ $posts->total() }} post</i></small>

@if (count($posts) > 0)

	{{ $posts->links() }}

	@foreach ($posts as $post)

	<div class="well pd-t-15 pd-b-15 pd-l-15 pd-r-15">
		<div class="col-kik-8">
			<a href="/posts/{{$post->id}}">
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
						<form action="{{route('posts.destroy', $post->id)}}" method="post" class="buttons float-right">
							{!!csrf_field()!!}
							{{method_field('DELETE')}}
							<button class="btn btn-danger" >Delete</button>
						</form>
					</div>
				@endif
			@endif
		</div>
	</div>

	@endforeach

	{{ $posts->links() }}

@else
	
	<div class="alert alert-default">
		
		<h3>No Posts Yet</h3>

	</div>

@endif

@endsection