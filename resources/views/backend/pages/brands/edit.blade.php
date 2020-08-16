@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->

      <div class="row">
      	
      	
      		 <div class="card" style="margin: 40px;">
      		 	<div class="card-header">
      		 		Edit product
      		 	</div>
      	<div class="card-body">

      		@include('backend.partials.messages')
      		
<form action="{{ route('admin.brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control"name="name" id="name" aria-describedby="emailHelp" value="{{$brand->name}}">
 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descriptino</label>
   <textarea name="description" rows="8" cols="80" class="form-control" value="{!!$brand->description!!}"></textarea>
  </div>
 
 

 <div class="form-group">
    
    <label for="oldimage">brand old Image</label>
      <img  src="{!!asset('images/brands/'.$brand->image)!!}" width="100" >
      <hr>

      <label for="image">brand new Image</label>
      <input type="file" class="form-control" name="image" id="image" >
      <hr>

   
 
  </div>

  <button type="submit" class="btn btn-primary" >Update brand</button>
</form>
      	</div>
      </div>
      	
     
      </div>
     
      
    </div>

    @endsection