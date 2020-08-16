@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->

      <div class="row">
      	
      	
      		 <div class="card" style="margin: 40px;">
      		 	<div class="card-header">
      		 		Add Category
      		 	</div>
      	<div class="card-body">

      		@include('backend.partials.messages')
      		
<form action="{{ route('admin.category.store')}}" method="post" enctype="multipart/form-data">
	@csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control"name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descriptino</label>
   <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
  </div>
 
   <div class="form-group">
    <label for="exampleInputPassword1">Parent Category</label>
   <select name="parent_id" rows="8" cols="80" class="form-control">
     
     @foreach($main_categories as $category)
     <option value="">Please select e Primary category</option>
     <option value="{{ $category->id}}">{{$category->name}}</option>
     @endforeach
   </select>
  </div>

 <div class="form-group">
    
   
    	<label for="image">category Image</label>
    	<input type="file" class="form-control" name="image" id="image" >
    	<hr>

   
 
  </div>

  <button type="submit" class="btn btn-primary" >Add Category</button>
</form>
      	</div>
      </div>
      	
     
      </div>
     
      
    </div>

    @endsection