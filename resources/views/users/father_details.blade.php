@extends('layouts.master')
@section('content')
<div class="container">
	<div class="userDetails">
		<div class="row" style="clear: both;margin-top: 18px;">
			<fieldset>
				<legend>Show Father Details:</legend>
		        <div class="col-12" >
		        	<div class="form-group col-lg-6">
		        		<label for="name">Name : </label> <span>{{ $users->name }}</span>
		        	</div>
		        	<div class="form-group col-lg-6">
		        		<label for="aadhar">Aadhar : </label> <span>{{ $users->aadhar }}</span>
		        	</div>
		        	<div class="form-group col-lg-6">
		        		<label for="birth_date">Birth Date : </label> <span>{{ $users->birth_date }}</span>
		        	</div>
		        	<div class="form-group col-lg-6">
		        		<label for="father_name">Father Name : </label> <span>{{ $users->father_name }}</span>
		        	</div>
		        	<div class="form-group col-lg-6">
		        		<label for="mother_name">Mother Name : </label> <span>{{ $users->mother_name }}</span>
		        	</div>
		        	<div class="form-group col-lg-6">
		        		<label for="children">Children : </label> <span>
		        			@php $childs = explode(",",$users->child_name); @endphp
		        			@foreach($childs as $child)
		        			{{ $child }}</span>
		        			@endforeach
		        	</div>
		       </div>
	   		</fieldset>
	    </div>
    	<a href="{{ url('users') }}">Back</a>
	</div>
	<div class="otherUserDetails">
	</div>
</div>
@endsection
