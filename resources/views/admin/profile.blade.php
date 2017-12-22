@extends('layouts.app')


@section('content')
	
	
   <div class="panel-body " style="background-color: #001f3f ;>
   			<div class="row"">
   				<div class="col-md-10 col-md-offset-1">
   				<img src= "{{ asset(env('UPLOAD_PATH').'/thumb/' . $usermoto->avatar ) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; ">
   				<h2 style="color: white";><strong>{{$usermoto->name}}'s Profile </strong></h2>
   				<h4 style="color: white";><i>{{$usermoto->email}}</i></h4>
   				<h4 style="color: white";><strong>{{$usermoto->emp_id}}</strong></h4>
   				<h4 style="color: green";"><b>{{$usermoto->role->title}}</b></h4>

   			</div>

{{--    		asd		<form enctype="multipart/form-data" action="/admin/profile" method="POST">
   				<label>Update Profile Image</label>
   				<input type="file" name="avatar">
   				<input type="hidden" name="_token" value="{{ csrf_token() }}" >
   				<input type="submit" class="pull-right btn btn-sm btn-primary">
   					
   				</form> --}}
   </div>

@endsection