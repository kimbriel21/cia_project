@extends('layout')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/front.css">
@endsection
@section('content')
<div class="main-form">
	<div class="container">
		<form class="mt-3" method="post" action="/register">
			<div class="d-flex mb-2 justify-content-center">
				<h3>Register Form</h3>
			</div>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group row">
			    <div class="col-sm-12">
			      <input type="text" class="form-control" name="first_name" placeholder="First Name">
			    </div>
			</div>
			<div class="form-group row">
			    <div class="col-sm-12">
			      <input type="text" class="form-control" name="last_name" placeholder="Last Name">
			    </div>
			</div>
			<div class="form-group row">
			    <div class="col-sm-12">
			      <input type="number" class="form-control" name="phone_number" placeholder="Phone Number">
			    </div>
			</div>
			<div class="form-group row">
			    <div class="col-sm-12">
			      <input type="email" class="form-control" name="email" placeholder="Email">
			    </div>
			</div>
			<div class="form-group row">
			    <div class="col-sm-12">
			      <input type="text" class="form-control" name="username" placeholder="Username">
			    </div>
			</div>
			<div class="form-group row">
			    <div class="col-sm-12">
			      <input type="password" class="form-control" name="password" placeholder="Password">
			    </div>
			</div>
			<div class="form-group row">
			    <div class="col-sm-12">
			      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
			    </div>
			</div>
	  		<button type="submit" class="btn btn-primary w-100">Register</button>
		</form>
		<div class="pt-2">
			<small> Go back to <a href="/login">Login Page</a> </small>	
		</div>
	</div>
</div>
@endsection