@extends('frontend.layouts.master')
@section('title')
{{$product->title}}| Laravel Ecommerce site
@endsection
@section('content')


     	<div class="container margin-top-20">
     		 <div class="row">

     			 <div class="col-md-3">

     			 	<div class="card card-chart"> 


     			 			<div class="card-body">

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  	@php $i=1; @endphp


@foreach ($product->images as $image)
	<div class="carousel-item  {{$i == 1 ? 'active':''}}">
      <img class="d-block w-100"style=" height: 220px; " src="{!! asset('images/products/'.$image->image)!!}" alt="First slide">
    </div>
    
    @php $i++; @endphp
@endforeach
    
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="margin-top-20" style="margin-top: 10px;">
  Category : <span class="badge badge-info">{{$product->category->name}} </span>
  Brand :<span class="badge badge-info">{{$product->brand->name}} </span>
</div>
     			 	  </div>
     			 	 </div>
     			 
     				
     			 </div>

     			 <div class="col-md-9">
     			 	
     			 	<div class="row">

     			 		<div class="col-md-9">
              <div class="card card-chart">
                <div class="card-header ">
                  <h4 class="ct-chart" id="completedTasksChart">  {{$product->title}}</h4>
                </div>
                <div class="card-body">
                	 <h4 class="card-title">Price : {{$product->price}}    <span class="badge badge-success" > {{$product->quantity<1? 'no item available':$product->quantity. ' itam in stock'}}</span> </h4> 
                 
                  <p class="card-category">{{$product->description}}</p>
                  <!--  <p class="card-category"> {{$product->category}}</p> -->
                </div>
                <div class="card-footer">
                  <div class="stats">
                 <!--    <i class="material-icons">Category </i> --> 
                  </div>
                </div>
              </div>
            </div>

  

                      
            </div>
     			 </div>

     		
    </div>
    
@endsection
     	</div>
     	


     </div>

