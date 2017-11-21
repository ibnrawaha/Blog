@extends('layouts.app')

@section('header')
@include('inc.slider')
@endsection

@section('content')


<div class="section-1">
	<div>
		<img src="/images/about/1.jpg" alt="">
		<h3>About The Company</h3>
		<p>Our company is the leading company of web designing and developing</p>
		<a href="/pages/about us">Learn More</a>
	</div>
	<div>
		<img src="/images/about/2.jpg" alt="">
		<h3>Our History</h3>
		<p>Our company has a long history in the industry it was founded 2017 by K.I.Khalil</p>
		<a href="/pages/history">Learn More</a>
	</div>
	<div>
		<img src="/images/about/3.jpg" alt="">
		<h3>Our Services</h3>
		<p>We provide a designing and web development services in a high quality professional outputs</p>
		<a href="/pages/services">Learn More</a>
	</div>
</div>



	<!--
<h3>Posts</h3>

	@foreach($posts as $post)
	
	
	
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

	-->

<div class="fixed-1">
	<div>
	    <h1>Work With</h1>
	    <h1>-=  <b>Experts</b>  =-</h1>
	</div>
</div>

<div class="section-1 bg-dark">
	<h2>Our Team</h2>
	<div>
		<img src="/images/team/1.jpg" alt="">
		<h3>Sally Seren</h3>
		<p>Executive Manager</p>
	</div>
	<div>
		<img src="/images/team/2.jpg" alt="">
		<h3>John Doe</h3>
		<p>CEO</p>
	</div>
	<div>
		<img src="/images/team/3.jpg" alt="">
		<h3>Amanda Gray</h3>
		<p>Human Resource</p>
	</div>
</div>


@endsection