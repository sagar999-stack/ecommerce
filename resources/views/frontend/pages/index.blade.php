@extends('frontend.layouts.master')
@section('content')
  <div class="row">
    <div class="slideshow-container" style="width:100%; " >
      @foreach($sliders as $slide)
  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
  
    <img  src="{{asset('images/sliders/'.$slide->image)}}" style="width:100%; ">
    <div class="text"><h1>{{$slide->title}}</h1></div>
  </div>
  @endforeach

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>


  </div>
<div class="container margin-top-20">


   <div class="row">
      <div class="col-md-3">
         @include('frontend.partials.product-sidebar')
      </div>
      <div class="col-md-9">
        
          <div class="card" style="padding: 1vw;">
             <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <h2> All Products</h2>
                    </div>
                  </div>
                </div>
             <div class="row">
               
             
                 
             
            @foreach($products as $product)
            <div class="col-md-4">
               <div class="card body">
                  <div class="card-header ">
                  
                        @php $i = 1; @endphp
                        @foreach($product->images as $image)
                        @if ($i>0)
                        <img class="img-fluid img-thumbnail" style=" height: 220px; " src="{{asset('images/products/'.$image->image)}}">
                        @endif  
                        @endforeach
                   
                  </div>
                  <div class="card-body">
                    
                     <h4 class="card-title">  <a href="{!! route('products.show', $product->slug)!!}" class="card-title">{{$product->title}}</a></h4>
                     <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i>Price: {{$product->price}} tk</span> 
                     </p>
                     <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> {{$product->description}} tk</span> 
                     </p>
                  </div>
                  @include('frontend.pages.product.partials.cart-button')
               </div>
            </div>
            @endforeach

            
              </div>
         </div>
      </div>
   </div>
</div>
@endsection
