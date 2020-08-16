@extends('frontend.pages.users.master')

@section('sub-content')
<div class="container">
	<h2> Welcome {{ $user->first_name.' '.$user->last_name}}</h2>
	<p> you can change your profile here</p>
	<div class="row">
		<div class="col-md-4">
			<!-- <div class="card card-body mt-2 pointer" onclick="location.herf='{{ route('user.profile')}}'" >
				<a href="{{ route('user.profile')}}"> Update Profile</a>
			</div> -->
		</div>
	</div>
</div>

@endsection