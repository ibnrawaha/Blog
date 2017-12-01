@extends('layouts.app')

@section('content')

	<h1>User Profile</h1>
	
	{{-- `id`, `user_id`, `full_name`, `job`, `degree`, `about`, `phone`, `address`, `city`, `country`, `zip_code`, `created_at`, `updated_at`SELECT * FROM `profiles` WHERE 1 --}}

	<table class="table table-striped">
		<tr>
			<th>Full Name</th>
			<td>{{$profile->full_name}}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{$user->email}}</td>
		</tr>
		<tr>
			<th>Phone</th>
			<td>{{sprintf( '0%d' ,$profile->phone)}}</td>
		</tr>
		<tr>
			<th>Address</th>
			<td>{{$profile->address}}</td>
		</tr>
		<tr>
			<th>City</th>
			<td>{{$profile->city}}</td>
		</tr>
		<tr>
			<th>Country</th>
			<td>{{$profile->country}}</td>
		</tr>
		<tr>
			<th>Zip Code</th>
			<td>{{$profile->zip_code}}</td>
		</tr>
		<tr>
			<th>Proffesion</th>
			<td>{{$profile->job}}</td>
		</tr>
		<tr>
			<th>Degree</th>
			<td>{{$profile->degree}}</td>
		</tr>
		<tr>
			<th>About Me</th>
			<td>{{$profile->about}}</td>
		</tr>

	</table>


@endsection