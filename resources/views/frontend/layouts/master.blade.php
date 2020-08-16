
<!DOCTYPE html>
<html>
<head>
	<title> laravel ecommerce project</title>
	@include('frontend.partials.style')
</head>
<body onload="showSlides()">

<div class="wrapper">
@include('frontend.partials.nav')

     <div class="content" style="margin-top:60px;">

     	<div class="row">
     	<div class="col-md-1"></div>
     	<div class="col-md-10">@include('frontend.partials.messages')</div>
     	<div class="col-md-1"></div>
     	</div>
     		


     	@yield('content')
     		
   

     	</div>
     	@include('frontend.partials.footer')

</div>
    
@include('frontend.partials.scripts')

@yield('scripts')


</body>
</html>