@extends('layouts.master')
@section('content')
<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">Hindustani - App</h2><br>
     <div class="row">
       <div class="col-12 text-right">
         <a href="{{ url('users/create') }}" class="btn btn-success mb-3" id="create-new-user">Add User</a>
       </div>
    </div>
    <div class="row" style="clear: both;margin-top: 18px;">
        <div class="col-12">
          <table id="laravel_crud" class="table table-striped table-bordered">
            <thead>
                <tr>
                	<th>Name</th>
                    <th>Aadhar</th>
                    <th>Bdate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            	@if($users)
                @foreach($users as $user)
                <tr id="row_{{$user->id}}">
                   <td>{{ $user->name }}</td>
                   <td>{{ $user->aadhar }}</td>
                   <td>{{ $user->birth_date }}</td>
                   <td><a href="{{ url('users_details',$user->id) }}"  class="btn btn-info">Show Details</a>
                </tr>
                @endforeach
                @endif
            </tbody>
          </table>
       </div>
    </div>
</div>
<script type="text/javascript">
	$('#laravel_crud').DataTable();
</script>
@endsection