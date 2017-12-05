@extends('layouts.app')

@section('content')
	
	<div class="col-md-9 float-left">
		<h1>User Profile</h1>
	</div>
	<div class="col-md-3 float-right">
		<h4 class="float-right"><a href="/posts/user/{{$user->name}}" class="btn btn-primary">View Posts</a></h4>
	</div>
	
	{{-- `id`, `user_id`, `full_name`, `job`, `degree`, `about`, `phone`, `address`, `city`, `country`, `zip_code`, `created_at`, `updated_at`SELECT * FROM `profiles` WHERE 1 --}}

	<table class="table table-striped">
		<tr>
			<th>Full Name</th>
			<td>@if($profile){{$profile->full_name}}@endif</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{$user->email}}</td>
		</tr>
		<tr>
			<th>Phone</th>
			<td>@if($profile){{sprintf( '0%d' ,$profile->phone)}}@endif</td>
		</tr>
		<tr>
			<th>Age</th>
			<td>@if($profile){{$profile->dob->age}}@endif years old</td>
		</tr>
		<tr>
			<th>Address</th>
			<td>@if($profile){{$profile->address}}@endif</td>
		</tr>
		<tr>
			<th>City</th>
			<td>@if($profile){{$profile->city}}@endif</td>
		</tr>
		<tr>
			<th>Country</th>
			<td>@if($profile){{$profile->country}}@endif</td>
		</tr>
		<tr>
			<th>Zip Code</th>
			<td>@if($profile){{$profile->zip_code}}@endif</td>
		</tr>
		<tr>
			<th>Proffesion</th>
			<td>@if($profile){{$profile->job}}@endif</td>
		</tr>
		<tr>
			<th>Degree</th>
			<td>@if($profile){{$profile->degree}}@endif</td>
		</tr>
		<tr>
			<th>About Me</th>
			<td>@if($profile){{$profile->about}}@endif</td>
		</tr>

	</table>


@endsection