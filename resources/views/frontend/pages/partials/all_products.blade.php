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
                 		 <h4 class="card-title">	<a href="{!! route('products.show', $product->slug)!!}" class="card-title">{{$product->title}}</a></h4>
                 		 <p class="card-category">
                   		 <span class="text-success"><i class="fa fa-long-arrow-up"></i>{{$product->price}} tk</span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                  @include('frontend.pages.product.partials.cart-button')
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
					    
					      @endforeach
					     <div class="pagination">
					     	{{$products->links()}}
					     </div>

					    </div>