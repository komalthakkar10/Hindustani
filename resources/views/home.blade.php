@extends('layouts.master')
@section('content')
<style type="text/css">
	.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {background-color: #4CAF50;} /* Green */
.button2 {background-color: #008CBA;} /* Blue */
.main {

  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
}
</style>
<div class="main">
	@if(Session::has('message'))
		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	@endif
		<center><a href="{{ route('login') }}" class="button button1">Login</a></center>
		<center><a href="{{ route('register') }}" class="button button1">register</a></center>
		
		<center><a href="{{ route('job.create') }}" class="button button2">Apply For Job</a></center>
</div>
@endsection