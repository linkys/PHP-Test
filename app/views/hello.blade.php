@extends('layout')

@section('content')

	<p>
		Login: admin <br>
		Password: very_secret
	</p>

	@if (Session::has('invalid_data_login'))
		<div class="alert alert-info">{{ Session::get('invalid_data_login') }}</div>
	@endif

	{{ Form::open(['url' => 'login', 'method' => 'post']) }}
	<div class="form-group">
		<input type="text" name="username" class="form-control" id="InputUsername" placeholder="Username">

		@if (Session::has('login_lockout'))
			<div class="alert alert-info">{{ Session::get('login_lockout') }}</div>
		@endif

	</div>
	<div class="form-group">
		<input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
	{{ Form::close() }}

@stop