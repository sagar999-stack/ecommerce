@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
   <!-- Navbar -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header card-header-primary">
                     <h4 class="card-title ">View Order # {{$order->id}}</h4>
                     <p class="card-category"> Here is a subtitle for this table</p>
                  </div>
                  <div class="card-body">
                     @include('backend.partials.messages')
                     <h3>Order Informations</h3>
                     <div class="row">
                        <div class="col-md-6">
                           <p><strong>Order Name : </strong>{{ $order->name}}</p>
                           <p><strong>Order Phone : </strong>{{ $order->phone_no}}</p>
                           <p><strong>Order Email : </strong>{{ $order->email}}</p>
                           <p><strong>Order Shiooing Address : </strong>{{ $order->shipping_address}}</p>
                        </div>
                        <div class="col-md-6">
                           <p><strong>Order Payment Method: </strong> {{ $order->payment->name}}</p>
                           <p><strong>Order Payment Method: </strong> {{ $order->carts->count() }}</p>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        @if($order->carts->count() > 0)
                        <div class="card">
                           <div class="card-header card-header-info">
                              <h3>Ordered Items</h3>
                           </div>
                           <div class="card-body table-responsive">
                              <table class="table" id="data_table">
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
                                    @foreach($order->carts as $cart)
                                    <tr>
                                       <td>
                                          {{$loop->index + 1}}
                                       </td>
                                       <td><a href="{{ route('products.show', $cart->product->slug) }}"> {{$cart->product->title}}</a></td>
                                       <td>
                                          @if($order->carts->count() > 0)
                                          <img class="img-fluid img-thumbnail" style=" height: 100px; width: 70px; " src="{{asset('images/products/'.$cart->product->images->first()->image)}}">
                                          @endif
                                       </td>
                                       <td>
                                          <form class="form-inline" action="{{ route('carts.update', $cart->id)}}" method="post">
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
                                       <td>
                                          <form class="form-inline" action="{{ route('carts.delete', $cart->id)}}" method="post">
                                             @csrf
                                             <input type="hidden" name="cart_id">
                                             <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>
                                       </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                       <td colspan="4"></td>
                                       <td>
                                          <p class="text-info" style="margin-top: 5px;"><strong>Total Amount:</strong></p>
                                       </td>
                                       <td colspan="2">
                                          <h6>{{$total_price}} Taka</h6>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        @endif	
                        <hr>
                        <form action="{{ route('admin.order.completed', $order->id)}}" method="post">
                        		@csrf
                        		@if($order->is_completed)
                        		<input style="display:inline-block!important;" type="submit" value="Cancel Order" class="	btn btn-danger" name="">
                        		@else
                        		<input style="display:inline-block!important;" type="submit" value="Complete Order" class="	btn btn-success" name="">
                        		@endif
                        </form>
                         <form action="{{ route('admin.order.paid', $order->id)}}" method="post">
                        		@csrf
                        		@if($order->is_paid)
                        		<input style="display:inline-block!important;" type="submit" value="Cancel Payment" class="	btn btn-danger" name="">
                        		@else
                        		<input style="display:inline-block!important;" type="submit" value="Paid Order" class="	btn btn-success" name="">
                        		@endif
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection