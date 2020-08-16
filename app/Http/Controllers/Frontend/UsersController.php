<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\District;
use App\Models\Division;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    public function dashboard(){
    	$user = Auth::user();
    	return view('frontend.pages.users.dashboard',compact('user'));
    }

     public function profile(){

     	$divisions = Division::orderBy('priority','asc')->get();
        $districts = District::orderBy('name','asc')->get();
    	$user = Auth::user();
    	return view('frontend.pages.users.profile',compact('user','districts','divisions'));
    }

    public function profileUpdate(Request $request)
    {
            $user = Auth::user();
        $this->validate($request,[
             'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'username' => ['required', 'alpha_dash', 'max:255', 'unique:users,username,'.$user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
         'password' => ['required', 'string', 'min:8'],
         'division_id' => ['required', 'numeric'],
         'district_id' => ['required', 'numeric'],
           'phone_no' => ['required', 'max:15','unique:users,phone_no,'.$user->id],
          'street_address' => ['required', 'max:100'],
        ]);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->phone_no = $request->phone_no;
        $user->street_address = $request->street_address;
        $user->shipping_address = $request->shipping_address;
        if($request->password != NULL || $request->password != "")
            {
                $user->password = Hash::make($request->password);
            }
        $user->ip_address = $request->ip();
        $user->save();
       
       session()->flash('success','User profile has updated successfully !!');
        return back();
    }
}
