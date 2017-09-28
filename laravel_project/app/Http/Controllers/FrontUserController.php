<?php

namespace realEudoxos\Http\Controllers;


use DB;
use realEudoxos\User;
use realEudoxos\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use realEudoxos\Jobs\SendVerificationEmail;



class FrontUserController extends Controller
{
    use RegistersUsers;

    public function logout(){

        Auth::guard('user')->logout();

        return redirect()->route('homepage');
    }


    public function loginForm(){

        return view('frontend.login.fuser-login');

    }

    public function generalLoginForm(){
        return view('frontend.login.general-login');
    }

    public function generalRegisterForm(){
        return view('frontend.register.general-register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastName'=>$data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => base64_encode($data['email']),
            'remember_token'=>null,
        ]);
    }


    public function register(Request $request)
    {
        
        
        DB::beginTransaction();
        try
        {
            $this->validator($request->all())->validate();
            event(new Registered($user = $this->create($request->all())));
            dispatch(new SendVerificationEmail($user));
            DB::commit();
            return view('auth.mail_verification.verification');
        }
        catch(\Exception $e)
        {   //echo($e);
            DB::rollback(); 
            return redirect()->back()->with('status', 'Δεν έγινε εγγραφή!');
        }
        catch (\Throwable $e) 
        {   
            DB::rollBack();
            throw $e;

        }
    }

    public function verify($token)
    {
        $user = User::where('email_token',$token)->first();
        $user->verified = 1;
        if($user->save()){
            return view('auth.mail_verification.email_confirm',['user'=>$user]);
        }
    }

    public function login(Request $request){

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        if(Auth::guard('user')->attempt(['email'=>$request->email,'password'=>$request->password,'verified'=>1],$request->remember)){
            return redirect()->intended(route('homepage'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }


}
