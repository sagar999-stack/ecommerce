@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->

      <div class="row">
      	
      	
      		 <div class="card" style="margin: 40px;">
      		 	<div class="card-header">
      		 		Add product
      		 	</div>
      	<div class="card-body">

      		@include('backend.partials.messages')
      		
<form action="{{ route('admin.product.store')}}" method="post" enctype="multipart/form-data">
	@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control"name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descriptino</label>
   <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
  </div>
 
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="number" class="form-control"name="price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price">
 
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Quantity</label>
    <input type="number" class="form-control"name="quantity" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity">
 
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Select category</label>
    <select class="form-control" name="category_id">
    <option value="">please select a category for the Category</option>
        @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
          <option value="{{$parent->id}}">{{$parent->name}}</option>
             @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
               <option value="{{$child->id}}">-------{{$child->name}}</option>
             @endforeach
        @endforeach
  </select>
 
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Select brand</label>
    <select class="form-control" name="brand_id">
    <option value="">please select a category for the Brand</option>
        @foreach(App\Models\Brand::orderBy('name','asc')->get() as $brand)
          <option value="{{$brand->id}}">{{$brand->name}}</option>
           
        @endforeach
  </select>
 
  </div>

 <div class="form-group">
    
   
    	<label for="product_image">Product_Image1</label>
    	<input type="file" class="form-control"name="product_image[]" id="product_image" >
    	<hr>

   
    	<label for="product_image">Product_Image2</label>
    	<input type="file" class="form-control"name="product_image[]" id="product_image" >
    	<hr>

   
    	<label for="product_image">Product_Image3</label>
    	<input type="file" class="form-control"name="product_image[]" id="product_image" >
    	<hr>

    
    	<label for="product_image">Product_Image4</label>
    	<input type="file" class="form-control"name="product_image[]" id="product_image" >
    	<hr>

  
   
    	<label for="product_image">Product_Image5</label>
    	<input type="file" class="form-control"name="product_image[]" id="product_image" >
    	<hr>

  
    
 
  </div>

  <button type="submit" class="btn btn-primary" >Add Product</button>
</form>
      	</div>
      </div>
      	
     
      </div>
     
      
    </div>

    @endsection