@extends('layouts.app')

@section('content')
   {{-- <h1>{{ $user->name }}</h1> --}}
   {{-- 			<strong>{{ Auth::user()->email}}</li>
            <li>{{ Auth::user()->role->title}}</li>< --}}
   
      <div class="panel-body " style="background-color: #001f3f" ;>
   			<div class="row"">
   				<div class="col-md-10 col-md-offset-1">
   				<img src= "{{ asset(env('UPLOAD_PATH').'/thumb/' . $usermoto->avatar ) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; ">
   				<h2 style="color: white";><strong>{{$usermoto->name}}'s Profile </strong></h2>
   				<h4 style="color: white";><i>{{$usermoto->email}}</i></h4>
   				<h4 style="color: white";><strong>{{$usermoto->emp_id}}</strong></h4>

   				<h4 style="color: green";"><b>{{$usermoto->role->title}}</b></h4>


   			 	{{-- <h5 style="color: white";">Member Since: {{$usermoto->created_at}}</h5> --}}
   			</div>



@endsection
