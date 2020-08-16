<?php

namespace App\Http\Controllers\Auth\Admin;
use Illuminate\Auth\Authenticatable;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\VerifyRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller 
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {

        $this->validate($request,[
            'email' =>'required|email',
            'password' =>'required|string'
        ]);
       
          
           
            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remenber)){
                //login now
               
                return redirect()->intended(route('admin.index'));

            }else{
                session()->flash('error','invalid login');
                return back();
            }
        
    
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}
