@extends('layouts.app')

@section('header')
@include('inc.header')
@endsection

@section('content')

<h3>Posts</h3>

@php 
	$column = 0;
@endphp

	@foreach($posts as $post)
{{-- 
		@if ($column % 2 == 0 || $column == 0)
			<div class="row">
		@endif

				<div class="col-md-6 post-widget">
					<div class="well">
						<a href="/posts/{{$post->id}}">
							<div class="post-widget-image">
								<img src="/storage/image/{{$post->image}}" alt="{{$post->title}}" class="">
							</div>
							<h5>{{$post->title}}</h5>
							<p>{!!substr($post->content, 0, 100)!!}</p>
						</a>
					</div>
				</div>

		@php 
			$column++;
		@endphp

		@if ($column % 2 == 0)
			<div class="clearfix"></div>
			</div>
		@endif 

 --}}
 
		
		<section>
			<a href="/posts/{{$post->id}}">
				<img src="/storage/image/{{$post->image}}" alt="{{$post->title}}">
				<h4>{{$post->title}}</h4>

				@if(strlen($post->content) > 150)
					<p>{!! substr($post->content, 0, 150) !!}... <span class="btn btn-danger">Read More</span></p>
					{{-- <a href="/posts/{{$post->id}}" class="btn btn-danger read-more">Read More</a> --}}
				@else
					<p>{!! $post->content !!}</p>
				@endif

			</a>
		</section>

	@endforeach



@endsection