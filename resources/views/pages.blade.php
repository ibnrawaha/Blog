@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
<div class="row">
    <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h1>Manage Your Pages</h1></div>
            <a href="/pages/create" class="btn btn-secondary float-right">Create New Page</a>
            <br><br>
                @foreach ($pages as $page)
                    <div class="well">
                        <h5><a href="pages/{{$page->title}}">{{$page->title}}</a></h5>

                        <div class='float-right'>
                            <a href="/pages/{{$page->title}}/edit" class="btn btn-primary float-left buttons">Edit Page</a>

                            <form action="{{route('pages.destroy', $page->id)}}" method="post" class="float-right buttons">
                                {!!csrf_field()!!}
                                {{method_field('DELETE')}}
                                <button name="submit" class="btn btn-danger">Delete</button>
                                
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            <div class="panel-body">
            
            </div>
        </div>
    </div>
    {{-- </div> --}}
</div>
@endsection
