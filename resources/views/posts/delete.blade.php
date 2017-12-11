@extends('layouts.app')

@section('content')

	<h1>Are you sure you want to confirm ?</h1>
	<h3>Deleting this post ...</h3>

	<div class="well pd-t-15 pd-b-15 pd-l-15 pd-r-15">
        <div class="col-kik-8">
            <a href="/posts/{{ $post->id }}/{{ str_replace(' ', '-', strtolower($post->title)) }}">
                <div class="thumbImgDiv float-left mg-r-20">
                    <img src="/storage/image/uploads/{{$post->image}}" alt="" class="thumbImg">
                </div>
                <h6>{!!$post->title!!}</h6>
                @if (strlen($post->content) > 300)
                    <p>{!!substr($post->content, 0 , 300)!!} <span class="bg-dark">... Read More</span></p>
                @else
                    <p>{!!$post->content!!}</p>
                @endif
                <small>Created at {{$post->created_at}}, Last Update on {{$post->updated_at}}</small>
            </a>
			
            <form action="{{route('posts.destroy', $post->id)}}" method="post" class="buttons float-right">
		        {!!csrf_field()!!}
		        {{method_field('DELETE')}}
		        <button class="btn btn-danger" id="delItem">Delete</button>
		    </form>
			<a href="{{ URL::previous() }}" class="btn btn-primary float-right buttons">Nope !!</a>

        </div>
    </div>


	

@endsection