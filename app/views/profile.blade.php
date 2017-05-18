@extends('layout')

@section('content')
	<p>
		Hello, {{ Auth::user()->username }}
	</p>

	<a href="/logout" class="btn btn-default">Logout</a>
@stop