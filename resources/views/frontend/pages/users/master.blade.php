@extends('frontend.layouts.master')

@section('content')
<div class="container " >
	<div class="row">
		<div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" style="width: 100px; height:100px; margin-top: -5px;margin-bottom: -5px; ">
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">{{' '. $user->first_name.' '.$user->last_name}}</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                <!--   <a href="javascript:;" class="btn btn-primary btn-round">Follow</a> -->
                  <a href="{{route('user.dashboard')}}" class="btn btn-primary btn-block btn-round {{Route:: is('user.dashboard') ? 'active' : ''}}">Dashboard</a>
          				<a href="{{route('user.profile')}}" class="btn btn-primary btn-block btn-round  {{Route:: is('user.profile') ? 'active' : ''}}">Update Profile</a>
          				<a href="{{route('user.dashboard')}}" class="btn btn-primary btn-block btn-round ">Logout</a>
                </div>
              </div>
            </div>
	
		<div class="col-md-8">

			<div class="card card-body">
				@yield('sub-content')
			</div>
			
		</div>
	</div>
</div>
@endsection
