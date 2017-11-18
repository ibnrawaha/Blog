@extends('layouts.app')

@section('header')
@include('inc.header')
@endsection

@section('content')

<h3>Posts</h3>

<?php 
	$column = 0;
?>

	@foreach($posts as $post)

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

		<?php $column++ ?>
		
		@if ($column % 2 == 0)
			<div class="clearfix"></div>
			</div>
		@endif

	@endforeach



@endsection