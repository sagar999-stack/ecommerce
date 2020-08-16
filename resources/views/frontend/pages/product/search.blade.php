@extends('frontend.layouts.master')
@section('content')

     	<div class="container margin-top-20">
     		 <div class="row">

     			 <div class="col-md-3">
     				@include('frontend.partials.product-sidebar')
     			 </div>

     		<div class="col-md-9">
<div class="row"> <h3>Searched product for  <span  class="badge badge-primary"> {{$search}}</span></h3></div>
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
                       <span class="text"><i class="fa fa-long-arrow-up"></i>{{$product->description}} tk</span> </p>

                     <p class="card-category">
                       <span class="text-success"><i class="fa fa-long-arrow-up"></i>Price: {{$product->price}} tk</span> </p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i> 
                  </div>
                </div>
              </div>
            </div>
                          @endforeach
                    
</div>
    
 
    
@endsection
     	</div>
     	


     </div>


</body>
</html>