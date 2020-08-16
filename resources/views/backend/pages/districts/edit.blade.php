@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->

      <div class="row">
      	
      	
      		 <div class="card" style="margin: 40px;">
      		 	<div class="card-header">
      		 		Edit District
              
      		 	</div>
      	<div class="card-body">

      		@include('backend.partials.messages')
      		
<form action="{{ route('admin.district.update',$district->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control"name="name" id="name" aria-describedby="emailHelp" value="{{$district->name}}">
 
  </div>
 <div class="form-group">
    <label for="division_id" >Select a division for this district</label>
  <select class="form-control" name="division_id">
    <option value="">Please select a division for the district</option>
    @foreach($divisions as $division) 
    <option value="{{ $division->id}}"{{$district->division->id==$division->id ? 'selected' : ''}}> {{$division->name}}</option>
    @endforeach
  </select>
 
  </div>
 

 

  <button type="submit" class="btn btn-primary" >Update division</button>
</form>
      	</div>
      </div>
      	
     
      </div>
     
      
    </div>

    @endsection