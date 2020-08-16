<nav class="navbar navbar-expand-lg navbar-light bg-light primary" style="  position: fixed;
   top: 0;
   left: 0;
   z-index: 9999;
   width: 100%;
   height: 50px;
   background-color: #00a087;">
   <a class="navbar-brand" href="#"><img src="{{asset('images/logo/logo.png')}}" style="height: 50px; width: 120px; margin-top: -20px;" ></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
            <a class="nav-link" href="{{route('index')}}">
               <icons-image _ngcontent-atb-c22="" _nghost-atb-c19=""><span _ngcontent-atb-c19="" class="material-icons icon-image-preview">home</span></icons-image>
               Home <span class="sr-only">(current)</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{route('products')}}" data-toggle="tab">
               <icons-image _ngcontent-fpr-c22="" _nghost-fpr-c19=""><span _ngcontent-fpr-c19="" class="material-icons icon-image-preview">shopping_cart</span></icons-image>
               Products
            </a>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link " href="{{route('contact')}}"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <icons-image _ngcontent-qlm-c22="" _nghost-qlm-c19=""><span _ngcontent-qlm-c19="" class="material-icons icon-image-preview">settings_phone</span></icons-image>
               Contact
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="#">Action</a>
               <a class="dropdown-item" href="#">Another action</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
            </div>
         </li>
         <li class="nav-item">
         <li class="nav-item">
            <form class="form-inline my-2 my-lg-0"  action="{!!route('search')!!}">
               <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
         </li>
         </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li class="nav-item">
            <a class="nav-link" href="{{ route('carts') }}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="badge badge-danger">{{App\Models\Cart::totalItems()}}</span>
            </a>
         </li>
         @guest
         <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
         </li>
         @if (Route::has('register'))
         <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
         </li>
         @endif
         @else
         <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" style="width: 40px; height:40px; margin-top: -5px;margin-bottom: -5px; " class="img rounded-circle">
            {{ Auth::user()->first_name }} <span class="caret"></span>
            </a>
            -                     
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{ route('user.dashboard') }}"
                  >
               {{ __('My Dashboard') }}
               </a>
               <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
               </form>
            </div>
         </li>
         @endguest
      </ul>
   </div>
</nav>
