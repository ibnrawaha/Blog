@extends('layouts.app')

@section('content')

	<h1>Are you sure you want to confirm ?</h1>
	<h3>Deleting this Page ...</h3>

	<div class="well pd-t-15 pd-b-15 pd-l-15 pd-r-15">
        <div class="col-kik-8">
            <a href="/pages/{{ $page->id }}/{{ str_replace(' ', '-', strtolower($page->title)) }}">
                <div class="thumbImgDiv float-left mg-r-20">
                    <img src="/storage/image/uploads/{{$page->image}}" alt="" class="thumbImg">
                </div>
                <h6>{!!$page->title!!}</h6>
                @if (strlen($page->content) > 300)
                    <p>{!!substr($page->content, 0 , 300)!!} <span class="bg-dark">... Read More</span></p>
                @else
                    <p>{!!$page->content!!}</p>
                @endif
                <small>Created at {{$page->created_at}}, Last Update on {{$page->updated_at}}</small>
            </a>
			
            <form action="{{route('pages.destroy', $page->id)}}" method="post" class="buttons float-right">
		        {!!csrf_field()!!}
		        {{method_field('DELETE')}}
		        <button class="btn btn-danger" id="delItem">Delete</button>
		    </form>
			<a href="{{ URL::previous() }}" class="btn btn-primary float-right buttons">Nope !!</a>
        </div>
    </div>


	

@endsection