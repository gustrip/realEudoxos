<?php

namespace realEudoxos\Http\Controllers\Student;

use realEudoxos\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use realEudoxos\Student;



class StudentLoginController extends Controller
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.login.student-login');
    }

    public function login(Request $request){

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        if(Auth::guard('student')->attempt(['email'=>$request->email,'password'=>$request->password,'verified'=>1])){
            $user=Student::find(Auth::guard('student')->user()->id);
            $data=array();
            $data['name']=$user->name;
            $data['lastname']=$user->lastName;
            $data['login']=$user->email;
            $isStudent=$this->isEudoksosStudent($data);
            if($isStudent!=-1){
                $user->points=$isStudent;
                $user->save();
            }
            
            return redirect()->intended(route('homepage'));
        }
        
        return redirect()->back()->withInput($request->only('email'));
    }


    public function logout(Request $request){

        
        Auth::guard('student')->logout();
        return redirect()->route('homepage');

    }

    protected function isEudoksosStudent($data){
        $login = substr($data['login'], 0, strpos($data['login'], '@'));
        $client = new \GuzzleHttp\Client(['base_uri' => 'http://10.0.2.2:8080/Eudoksos/API']);
        $returned_value=-1;
        try{

            $apireq = $client->request('GET','http://10.0.2.2:8080/Eudoksos/API/students/auth/student',['query'=>['name'=>$data['name'],'lastname'=>$data['lastname'],'login'=>$login]]); 
            if($apireq->getStatusCode()==200 && $apireq->getBody()!=null){
                $student= json_decode($apireq->getBody());
                $returned_value=$student->{'points'};
                return $returned_value;
            }else{
                return $returned_value;
            }
        }
        catch(\GuzzleHttp\Exception\ClientException $e) {
            return $returned_value;
        }

    }

}
