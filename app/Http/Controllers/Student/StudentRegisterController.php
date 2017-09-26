<?php

namespace realEudoxos\Http\Controllers\Student;

use realEudoxos\Student;
use realEudoxos\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use DB;

use realEudoxos\University;
use realEudoxos\Order_Detail;
use realEudoxos\Book;


use realEudoxos\Jobs\SendVerificationEmailStudent;
use realEudoxos\Jobs\CalculateWeights;

use GuzzleHttp\Client;

class StudentRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Student Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new students users as well as their
    | validation and creation.
    |
    */
    /**
     * Create a new controller instance.
     *  with guard student
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
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
        return Student::create([
            'name' => $data['name'],
            'lastName'=>$data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'points'=>$data['points'],
            'university_id'=>$data['university_id'],
            'email_token' => base64_encode($data['email']),
            'remember_token'=>null,
        ]);

    }


    public function register(Request $request)
    {
        DB::beginTransaction();
        try
        {   
            $isStudent=$this->isEudoksosStudent($request);
            if($isStudent==-1){
                return redirect()->back()->with('status', 'Δεν έγινε εγγραφή.Προβλημα με την συνδεση στον Ευδοξο.Βεβαιώσου ότι τα στοιχεία σου ειναι σωστά!!');
            }
            $this->validator($request->all())->validate();
            $request['university_id']=$isStudent['university'];
            $request['points']=$isStudent['points'];
            event(new Registered($user = $this->create($request->all())));
            dispatch(new CalculateWeights());
            dispatch(new SendVerificationEmailStudent($user));
            DB::commit();
            return view('auth.mail_verification.verification');
        }
        catch(\Exception $e)
        {   
            DB::rollback(); 
            return redirect()->back()->with('status', 'Δεν έγινε εγγραφή.Ξαναπροσπάθησε!!');
        }
        catch(\GuzzleHttp\Exception\ClientException $e) {
             return redirect()->back()->with('status', 'Δεν έγινε εγγραφή.Προβλημα με την συνδεση στον Ευδοξο.Βεβαιώσου ότι τα στοιχεία σου ειναι σωστά!!');
        }



    }

    public function verify($token)
    {
        $user = Student::where('email_token',$token)->first();
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

        if(Auth::guard('student')->attempt(['email'=>$request->email,'password'=>$request->password,'verified'=>1],$request->remember)){
            return redirect()->intended(route('homepage'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    
    protected function isEudoksosStudent(Request $request){
        $login = substr($request->email, 0, strpos($request->email, '@'));
        $client = new \GuzzleHttp\Client(['base_uri' => 'http://10.0.2.2:8080/Eudoksos/API']);
        $returned_value=-1;
        try{

            $apireq = $client->request('GET','http://10.0.2.2:8080/Eudoksos/API/students/auth/student',['query'=>['name'=>$request->name,'lastname'=>$request->lastName,'login'=>$login]]); 
            if($apireq->getStatusCode()==200 && $apireq->getBody()!=null){
                $student= json_decode($apireq->getBody());
                $returned_value=array();
                $returned_value['points']=$student->{'points'};
                $uni_name=$student->{'university'}->{'university'};
                $uni_students=$student->{'university'}->{'numberOfStudents'};
                $new_uni=University::firstOrCreate(['name'=>$uni_name],['number_of_students'=>$uni_students]);
                $returned_value['university']=$new_uni->id;
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
