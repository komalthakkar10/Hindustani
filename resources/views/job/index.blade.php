@extends('layouts.master')
@section('content')
<div class="container">
	<div style="margin-top: 12px;" class="alert alert-success"> 
    <label>Job Applications List</label>
   		@if(Auth::check())
   		<label style="float: right;">{{ Auth::user()->name }}</label><br>
   		@endif
		<a href="{{ route('logout') }}" style="float: right" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a>    
		<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    		{{ csrf_field() }}
		</form>
	</div>
    <div class="row" style="clear: both;margin-top: 18px;">
        <div class="col-12">
          <table id="laravel_crud" class="table table-striped table-bordered">
            <thead>
                <tr>
                	<th>No</th>
                	<th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            	@if($jobs)
                @foreach($jobs as $job)
                <tr id="row_{{$job->id}}">
                   <td>{{$job->id}}</td>
                   <td>{{ $job->name }}</td>
                   <td>{{ $job->email }}</td>
                   <td style="display: flex;"><a href="{{ route('job.edit',$job->id) }}"  class="btn btn-info" style="margin: 5px;">Update</a>
                   <form action="{{ route('job.delete', $job->id) }}" method="POST">
				    @csrf
				    @method('delete')
				    <button type="submit" class="btn btn-danger" style="margin: 5px;">Delete</button>
				</form>
                   <a href="{{ route('job.show',$job->id) }}"  class="btn btn-info" style="margin: 5px;">View</a>
               		</td>
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