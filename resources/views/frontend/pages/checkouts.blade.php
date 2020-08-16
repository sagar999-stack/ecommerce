@extends('frontend.layouts.master')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header card-header-primary">
                  <h4 class="card-title ">Confirm items</h4>
                
                </div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-7 border-right">
					 @foreach(App\Models\Cart::totalCarts() as $cart)
					<p>
						{{ $cart->product->title}}
						<strong>{{ $cart->product->price}} Taka</strong>
						-{{$cart->product_quantity}} item
					</p>
					@endforeach
				</div>	
				<div class="col-md-5">
					@php
						$total_price = 0;
					@endphp
					 @foreach(App\Models\Cart::totalCarts() as $cart)
					
						@php
						$total_price += $cart->product->price * $cart->product_quantity;
						@endphp 
					
					@endforeach
					<p>
						Total price : <strong>{{ $total_price}} Taka</strong>
					</p>
					<p>
						Total price with sheeping cost: <strong>{{ $total_price + App\Models\Setting::first()->shipping_cost}}</strong>
					</p>
				</div>	
					
			</div>
				<p>
					<a href="{{ route('carts')}}" > Change cart items </a>
				</p>
		</div>
			
	</div>


<div class="card mt-2">
		<div class="card-header card-header-primary">
            <h4 class="card-title ">Shipping Address</h4>       
        </div>
		<div class="card-body">
		
			<form method="POST" action="{{ route('checkouts.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : ''}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                   

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required autocomplete="phone_no">

                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

               
                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Additional Message (optional)') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" rows="4" class="form-control @error('message') is-invalid @enderror" name="message" value="">  </textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping address') }}</label>

                            <div class="col-md-6">
                                <textarea id="shipping_address" rows="4" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" value=""> {{ Auth::check() ? Auth::user()->shipping_address : '' }} </textarea>

                                @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment method') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" name="payment_method_id" required id="payments">
                               	<option value="">Select a payment method please</option>
                               	@foreach ($payments as $payment)
                               	<option value="{{ $payment->short_name}}"> {{ $payment->name}}</option>

                               	@endforeach
                               </select>

                              @foreach ($payments as $payment)
                               
                               		@if($payment->short_name == "cash_in")
                               				<div id="payment_cash_in" class="alert alert-success mt-2 hidden">
                               			<h3>
                               				For cash in there is nothing necessary. Just click Finish order.
                               				<br>
                               				<small>
                               					
                               					You will get your product in two or three business days.
                               				</small>
                               			</h3>
                               			</div>
                               		
                               	@else
                               		<div id="payment_{{$payment->short_name}}" class="alert alert-success mt-2 hidden">
                               			<h3>
                               				{{$payment->short_name}} Payment
                               			</h3>	
                               				<br>
                               				<p><strong>{{$payment->short_name}} No: </strong>{{$payment->no}}</p>

                               				<strong>Account type: {{$payment->type}}</strong>
                               			<div>Please send the avobe money to this no and write your yransaction code below there.
                               			</div>

                               				
                               		</div>
                               	@endif

                               	@endforeach

                               	<input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">

                                @error('payment_method')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Order Now') }}
                                </button>
                            </div>
                        </div>
                    </form>
		</div>
			
	</div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">
  	$("#payments").change(function(){
  		$payment_method = $("#payments").val();
       if($payment_method == "cash_in")
       {
       	$("#payment_cash_in").removeClass('hidden');
       	$("#payment_bikash").addClass('hidden');
       	$("#payment_rocket").addClass('hidden');
       	$("#transaction_id").addClass('hidden');
       }else if($payment_method == "bikash")
       {	
       	$("#payment_bikash").removeClass('hidden');
       	$("#payment_cash_in").addClass('hidden');
       	$("#payment_rocket").addClass('hidden');
       		$("#transaction_id").removeClass('hidden');
       }else if($payment_method == "rocket")
       {
       	$("#payment_rocket").removeClass('hidden');
       	$("#payment_bikash").addClass('hidden');
       	$("#payment_cash_in").addClass('hidden');
       	$("#transaction_id").removeClass('hidden');
       }
   })
     </script>
@endsection







