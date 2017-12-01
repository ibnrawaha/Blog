@extends('layouts.app')

@section('content')

<div class="loginForm">
    <h1>Register</h1>
    
    <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>

    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        
        {{-- Name Field --}}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name</label>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
            <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Your Name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        {{-- Email Field --}}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email address</label>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        {{-- Password Field --}}
        <div class="form-group {{ $errors->has('password') ? ' has-error': '' }}">
            <label for="password">Password</label>
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>


        {{-- Confirm Password Field --}}
        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" name="password_confirmation">
        </div>




      <button type="submit" class="btn btn-primary">Register</button>

      <a class="btn btn-link" href="{{ route('login') }}">
        Already a Member?
    </a>
    
</form>
</div>

<!--

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

-->

@endsection
