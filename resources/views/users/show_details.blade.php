@extends('layouts.master')
@section('content')
<div class="container">
	<div class="userDetails">
    <div class="row" style="clear: both;margin-top: 18px;">
      <fieldset>
        <legend>Show My Details:</legend>
        <div class="col-12" >
          <div class="form-group col-lg-6">
            <label for="name">Name : </label> <span>{{ $users['name'] }}</span>
          </div>
          <div class="form-group col-lg-6">
            <label for="aadhar">Aadhar : </label> <span>{{ $users['aadhar'] }}</span>
          </div>
          <div class="form-group col-lg-6">
            <label for="birth_date">Birth Date : </label> <span>{{ $users['birth_date'] }}</span>
          </div>
          <div class="form-group col-lg-6">
            <label for="father_name">Father Name : </label> 
            <span><a data-id="{{ $father_details->id }}" onclick="fatherDetails(event.target)">{{ $users['father_name'] }}</a></span>
	        </div>
        	<div class="form-group col-lg-6">
        		<label for="mother_name">Mother Name : </label> <span><a data-id="{{ $mother_details->id }}" onclick="motherDetails(event.target)">{{ $users['mother_name'] }}</a></span>
        	</div>
        	<div class="form-group col-lg-6">
        		  <label for="children">Children : </label> 
              @if($child_details != null)
              <span>
              <a data-id="{{  $child_details->id }}" onclick="childDetails(event.target)">{{ $users['child_name'] }}</a></span>
              @else
              <span>{{ $users['child_name'] }}</span>
              @endif
          </div>
        </div>
	    </div>
    </fieldset>
    	<a href="{{ url('users') }}">Back</a>
	</div>
	<div class="otherUserDetails">
	</div>
</div>

<script type="text/javascript">
function fatherDetails(event) {
    var fid  = $(event).data("id");
    let _url = "{{ url('/father_details') }}";
    $.ajax({
      url: _url,
      data:{
      	fid:fid
      },
      type: "GET",
      success: function(response) {
      	console.log(response);
         $('.userDetails').hide();
         $('.otherUserDetails').empty().append(response);
      }
    });
  }
  function motherDetails(event){
  	var mid  = $(event).data("id");
    let _url = "{{ url('/mother_details') }}";
    
    $.ajax({
      url: _url,
      data:{
      	mid:mid
      },
      type: "GET",
      success: function(response) {
      	console.log(response);
         $('.userDetails').hide();
         $('.otherUserDetails').empty().append(response);
      }
    });	
  }
  function childDetails(event){
  	var cid  = $(event).data("id");
    let _url = "{{ url('/child_details') }}";
    $.ajax({
      url: _url,
      data:{
      	cid:cid
      },
      type: "GET",
      success: function(response) {
      	console.log(response);
         $('.userDetails').hide();
         $('.otherUserDetails').empty().append(response);
      }
    });	
  }
</script>
@endsection