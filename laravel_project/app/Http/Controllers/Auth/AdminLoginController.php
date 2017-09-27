<?php

namespace realEudoxos\Http\Controllers\Auth;

use Illuminate\Http\Request;
use realEudoxos\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

//	public function __construct(){
//		$this->middleware('guest:admin');
//	}

    public function showLoginForm(){
    	return view('frontend.login.normal-login');
    }

    public function login(Request $request){
    	//validate the form data
    	$this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required|min:6',
    		]);
    	//attempt to login the admin
    	//if succesful then direct to their intended location
    	if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]))
        {

    		return redirect()->intended(route('admin.dashboard'));

    	}
    	

    	

    	//if unsuccesful then direct to login with the form data
    	return redirect()->back()->withInput($request->only('email'));
    }

    public function logout(Request $request){

        
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');

    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    
}
