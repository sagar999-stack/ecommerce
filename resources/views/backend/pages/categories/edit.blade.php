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
      		
<form action="{{ route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control"name="name" id="name" aria-describedby="emailHelp" value="{{$category->name}}">
 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descriptino</label>
   <textarea name="description" rows="8" cols="80" class="form-control" value="{!!$category->description!!}"></textarea>
  </div>
 
   <div class="form-group">
    <label for="exampleInputPassword1">Parent Category (optional)</label>
   <select name="parent_id" rows="8" cols="80" class="form-control">
     <option value="">Please select e Primary category</option>
     @<?php foreach ($main_categories as $cat): ?>
       <option value="{{$cat->id}}" {{ $cat->id==$category->parent_id ? 'selected' : ''}}> {{$cat->name}}</option>
     <?php endforeach ?>

    <!--  @foreach($main_categories as $cat)
     <option <?php if ($cat->id==$category->parent_id ): ?>
       value="{{$cat->id}}"
      
      >  yyy{{$cat->name}}</option>
      <?php else: ?>
       xxx
        <option value="">Please select e Primary category</option>
         <option value="{{$cat->id}}">{{$cat->name}}</option>
      <?php endif ?>
     @endforeach -->
   </select>
  </div>

 <div class="form-group">
    
    <label for="oldimage">category old Image</label>
      <img  src="{!!asset('images/categories/'.$category->image)!!}" width="100" >
      <hr>

      <label for="image">category new Image</label>
      <input type="file" class="form-control" name="image" id="image" >
      <hr>

   
 
  </div>

  <button type="submit" class="btn btn-primary" >Update Category</button>
</form>
      	</div>
      </div>
      	
     
      </div>
     
      
    </div>

    @endsection