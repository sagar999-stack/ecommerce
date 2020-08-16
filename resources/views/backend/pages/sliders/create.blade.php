@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->

      <div class="row">
      	
      	
      		 <div class="card" style="margin: 40px;">
      		 	<div class="card-header">
      		 		Add Division
      		 	</div>
      	<div class="card-body">

      		@include('backend.partials.messages')
      		
<form action="{{ route('admin.division.store')}}" method="post" enctype="multipart/form-data">
	@csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control"name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
 
  </div>
  <div class="form-group">
    <label for="name">priority</label>
    <input type="text" class="form-control"name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter Name">
 
  </div>
  
 
 


  <button type="submit" class="btn btn-primary" >Add Division</button>
</form>
      	</div>
      </div>
      	
     
      </div>
     
      
    </div>

    @endsection