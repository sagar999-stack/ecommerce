@extends('frontend.layouts.master')
@section('content')

     	<div class="container margin-top-20">
     		 <div class="row">

     			 <div class="col-md-3">
     				@include('frontend.partials.product-sidebar')
     			 </div>

     		<div class="col-md-9">

<div class="row">
  
  @foreach($products as $product)

                        <div class="col-md-4">
             <div class="card card-chart">
                <div class="card-header card-header">
                    <div class="ct-chart" id="dailySalesChart">
                      @php $i = 1; @endphp
               @foreach($product->images as $image)
                   @if ($i>0)
                  <img class="img-fluid img-thumbnail" style=" height: 220px; " src="{{asset('images/products/'.$image->image)}}">
                    @endif  
                        @endforeach
                    </div>
                </div>
                <div class="card-body">
                  <div class="card-image">
             
          </div>
                     <h4 class="card-title">  <a href="{!! route('products.show', $product->slug)!!}" class="card-title">{{$product->title}}</a></h4>
                     <p class="card-category">
                       <span class="text-success"><i class="fa fa-long-arrow-up"></i>Price: {{$product->price}} tk</span> </p>
                       <p class="card-category">
                       <span class="text-success"><i class="fa fa-long-arrow-up"></i> {{$product->description}} tk</span> </p>
                </div>
               @include('frontend.pages.product.partials.cart-button')
              </div>
            </div>
                          @endforeach

</div>
    
 
    

     	</div>
     	


     </div>
   </div>
   @endsection


