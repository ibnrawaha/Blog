@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
<div class="row">
    <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h1>Dashboard</h1></div>
            <a href="/posts/create" class="btn btn-secondary float-right">Create Post</a>

            <div class="panel-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                
                <h6>Welcome <b><u>{{ucfirst(auth()->user()->name)}}</u></b>, here are your posts.</h6>
                <hr>
                
                @foreach ($posts as $post)
                <div class="well">
                    <div class="col-kik-8">
                        <a href="/posts/{{$post->id}}">
                            <h6>{!!$post->title!!}</h6>
                            @if (strlen($post->content) > 300)
                                <p>{!!substr($post->content, 0 , 300)!!} <span class="bg-dark">... Read More</span></p>
                            @else
                                <p>{!!$post->content!!}</p>
                            @endif
                            <small>Created at {{$post->created_at}}, Last Update on {{$post->updated_at}}</small>
                        </a>
                        <div class="float-right">
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary float-left buttons">Edit</a>
                            <form action="{{route('posts.destroy', $post->id)}}" method="post" class="buttons float-right">
                                {!!csrf_field()!!}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" >Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- </div> --}}
</div>
@endsection
