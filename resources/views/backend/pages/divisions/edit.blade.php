@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->

      <div class="row">
      	
      	
      		 <div class="card" style="margin: 40px;">
      		 	<div class="card-header">
      		 		Edit Divisions
      		 	</div>
      	<div class="card-body">

      		@include('backend.partials.messages')
      		
<form action="{{ route('admin.division.update',$division->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control"name="name" id="name" aria-describedby="emailHelp" value="{{$division->name}}">
 
  </div>
  <div class="form-group">
    <label for="name">Priority</label>
    <input type="text" class="form-control"name="priority" id="priority" aria-describedby="emailHelp" value="{{$division->priority}}">
 
  </div>
 

 

  <button type="submit" class="btn btn-primary" >Update division</button>
</form>
      	</div>
      </div>
      	
     
      </div>
     
      
    </div>

    @endsection