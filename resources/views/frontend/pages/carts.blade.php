@extends('frontend.layouts.master')

@section('content')
<div class="container ">
	
	
@if(App\Models\Cart::totalItems() > 0)
	<div class="card" style="margin-top: 200px;">
		<div class="card-header card-header-info">
			
			<h2 class="cart-title"> My cart</h2>
		</div>
		<div class="card-body table-responsive">
			<table class="table table-borderd table-hover">
		<thead class="text-info">
			<tr>
				<th>No.</th>
				<th>Product Title</th>
				<th>Product Image</th>
				<th>Product Quantity</th>
				<th>Unit price</th>
				<th>Sub total price</th>
				<th>
					Delete
				</th>
			</tr>
		</thead>
		<tbody>
			@php
			$total_price = 0;
			@endphp
			@foreach(App\Models\Cart::totalCarts() as $cart)
			<tr>
				<td>
					{{$loop->index + 1}}
				</td>
				<td><a href="{{ route('products.show', $cart->product->slug) }}"> {{$cart->product->title}}</a></td>
				<td>
					 @if($cart->product->images->count() > 0)
					 	<img class="img-fluid img-thumbnail" style=" height: 100px; width: 70px; " src="{{asset('images/products/'.$cart->product->images->first()->image)}}">
					@endif
				</td>
				
				<td><form class="form-inline" action="{{ route('carts.update', $cart->id)}}" method="post">
						@csrf
						<input type="number" name="product_quantity" class="from-control" value="{{ $cart->product_quantity}}">
						<button type="submit" class="btn btn-success ml-1">Update</button>

					</form>
				</td>
				<td>
					{{ $cart->product->price}} Taka
				</td>
				<td>
					@php
			$total_price += $cart->product->price * $cart->product_quantity;
			@endphp
					{{ $cart->product->price * $cart->product_quantity }} Taka
				</td>
				<td><form class="form-inline" action="{{ route('carts.delete', $cart->id)}}" method="post">
						@csrf
						<input type="hidden" name="cart_id">
						<button type="submit" class="btn btn-danger">Delete</button>

					</form>
				</td>	
			</tr>
			@endforeach
			<tr>
				<td colspan="4"></td>
				<td><p class="text-info" style="margin-top: 5px;"><strong>Total Amount:</strong></p></td>
				<td colspan="2"><h6>{{$total_price}}Taka</h6></td>
			</tr>
			<tr>
				<td colspan="5"></td>
				<td colspan="1">
					<div class="float-right">
						<a href="{{ route('products')}}" class="btn btn-info btn-lg">Continue Shopping</a>
					
					</div>
				</td>
				<td colspan="1">
					<div class="float-right">
						
						<a href="{{ route('checkouts')}}" class="btn btn-warning btn-lg">Checkout</a>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
		</div>
	</div>
@else
<div class="card">
	<div class="alert alert-warning">
		
		<strong><h3>There is no Item in your cart</h3></strong><a href="{{ route('products')}}" class="btn btn-info ">Continue Shopping</a>
		<br>
							
	
</div>
@endif	
	

	
</div>
@endsection







