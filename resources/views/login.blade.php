@extends('layout')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/front.css">
@endsection
@section('content')
<div class="main-form">
	<div class="container">
		<div class="form-logo">
			<img class="form-logo" src="/res/imgs/ag_logo.png" alt="Assembly Of God">
		</div>
		
		<form class="pt-5 mt-5" method="post" action="/login">
		@if (session()->has("successful"))
            <div class="alert alert-success">
                {{session("successful")}}
            </div>
        @endif
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		  <div class="form-group">
		    <label for="exampleInputUsername1">Username</label>
		    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="username">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
		  </div>	
  		 <button type="submit" class="btn btn-primary w-100">Login</button>
		  	
		</form>
		<div class="pt-2">
			<small> If you don't have yet account please click <a href="/register">here</a> </small>	
		</div>
	</div>
</div>
@endsection
