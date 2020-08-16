<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($token){
    	$user = User::where('remember_token',$token)->first();
    	if(!is_null($user))
    	{
    		$user->ststus = 1;
    		$user->remember_token=NULL;
    		$user->save();
    	session()->flash('success','you are registered successfully');
    	return redirect('login');
    	}
    	else{
    		session()->flash('errors','Sorry !! your token not matched');
    		return redirect('/');
    	}
    	
    }
}
