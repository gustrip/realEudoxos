<?php

namespace realEudoxos\Http\Controllers;


use Illuminate\Http\Request;
use realEudoxos\User;
use realEudoxos\Student;
use realEudoxos\Order;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware('auth:admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simple_users = User::all();
        $students=Student::all();
        return view("users.users")->with('users',['simple_users'=>$simple_users,'students'=>$students]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view("users.user-create");
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->name;
        $email=$request->email;
        $password=$request->password;
        $new_user=User::updateOrCreate(['email'=>$email],['name'=>$name,'password'=>$password]);
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view("users.user-show",compact('user'));
    }
    public function showHistory($id){
        $user=User::find($id);
        $orders = Order::where('user_id', $user->id)->get();
        $total_orders=$orders->count();
        return view('users.user-history',compact('user','orders','total_orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view("users.user-edit")->with("user",$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name=$request->name;
        $email=$request->email;
        $password=$request->password;
        $new_user=User::updateOrCreate(['email'=>$email],['name'=>$name,'password'=>Hash::make($password)]);
        $simple_users = User::all();
        $students=Student::all();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $duser=User::find($id);
        $orders = Order::where('user_id', $duser->id)->get();
        foreach ($orders as $order) {
            $orders_details=$order->orderDetails;
            foreach ($orders_details as $item) {
                $item->delete();
            }
            $order->delete();
        }
        $duser->delete();
        return redirect()->route('users.index');
    }

     public function studentCreate(){
        return view("users.student-create");
    }
     public function studentStore(Request $request){
            $this->validate($request,[
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:6',
        ]);
        $student=Student::UpdateOrCreate(['email'=>$request->email],['name'=>$request->name,'lastName'=>$request->lastName,'points'=>0,'password'=>Hash::make($request->password),'verified'=>1]);

        //get infos from api and store them
        return redirect()->route('users.index');
    }

    public function studentShow($id){
        $user=Student::find($id);
        return view("users.student-show",compact('user'));
    }
    public function studentShowHistory($id){
        $user=Student::find($id);
        $orders =Order::where('student_id', $user->id)->get();
        $total_orders=$orders->count();
        return view('users.student-history',compact('user','orders','total_orders'));
    }

    public function studentEdit($id){
        $user=Student::find($id);
        return view("users.student-edit")->with("user",$user);;
    }
    public function studentUpdate(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        $student=Student::UpdateOrCreate(['email'=>$request->email],['name'=>$request->name,'lastName'=>$request->lastName,'password'=>Hash::make($request->password)]);
        return redirect()->route('users.index');
    }
    public function studentDestroy($id){ 
        $duser=Student::find($id);
        $orders =Order::where('student_id', $duser->id)->get();
        foreach ($orders as $order) {
            $orders_details=$order->orderDetails;
            foreach ($orders_details as $item) {
                $item->delete();
            }
            $order->delete();
        }
        $duser->delete();
        return redirect()->route('users.index');
    }
}
