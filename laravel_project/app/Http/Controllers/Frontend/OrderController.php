<?php

namespace realEudoxos\Http\Controllers\Frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use realEudoxos\Http\Controllers\Controller;

use Illuminate\Http\Request;
use realEudoxos\Order;
use Illuminate\Support\Facades\Auth;
use realEudoxos\Order_Detail;
use Illuminate\Support\Facades\DB;
use realEudoxos\Student;
use realEudoxos\Book;
use realEudoxos\University;

use realEudoxos\Jobs\UpdateStudentEudoxos;
use realEudoxos\Jobs\SendMailOrder;
use realEudoxos\Jobs\StudentSendMailOrder;
use realEudoxos\Events\OrderDone;



class OrderController extends Controller
{


    protected function getLoggedInUser(){

        if(Auth::guard('student')->check()){
            $logged_in_user = Auth::guard('student')->user();
            return $logged_in_user;
        } else if (Auth::guard('user')->check()){
            $logged_in_user = Auth::guard('user')->user();
            return $logged_in_user;
        } else {
            return false;
        }

    }

    protected function checkStock(){
        $cart = Cart::content();
        foreach ($cart as $item) {
            $book=Book::find($item->id);
            if($book->stock<$item->qty){
                return $book; 
            }
        }
        return false;
    }


    public function getAllOrders(){

        $user = $this->getLoggedInUser();

        if(!$user){
            return redirect()->route('general_login_form');
        }

        $orders = ($user->isStudent()) ? Order::where('student_id', $user->id)->get() : Order::where('user_id', $user->id)->get();

        $total_orders = count($orders);

        return view('frontend.orders.order-history')->with(['orders' => $orders, 'total_orders' => $total_orders]);

    }
    
    public function newOrder(Request $request)
    {

        if(!$request->ajax()){
            return false;
        }
        
        $logged_in_user = $this->getLoggedInUser();

        if(!$logged_in_user){
            echo json_encode(['status' => 'error1', 'message' => 'Για να ολοκληρώσετε την αγορά, πρέπει να πραγματοποιήσετε είσοδο στο σύστημα.', 'redirect' => true]);

            return;
        }
        $temp=$this->checkStock();
        if($temp){
            echo json_encode(['status' => 'error2', 'message' => 'Πρόβλημα με την ποσότητα αγοράς του βιβλίου '.$temp->title.' της παραγγελίας σας.Παρακαλούμε προσπαθήστε ξανά', 'redirect' => true]);
            return;
        }
        
        $is_student = ($logged_in_user->isStudent()) ? true : false;
        
        $cart = Cart::content();
        $total_price = Cart::total();
        $total_items = Cart::count();
        $final_price=$total_price;

        
        if($total_price < $request->points){
            echo json_encode(['status' => 'error2', 'message' => 'Δεν μπορείς να χρησιμοποιήσεις περισσότερους πόντους από όσο στοιχίζει η παραγγελία σου', 'redirect' => true]);
                    return;
        }


        $new_order = new Order();
        
        switch($is_student){
            case(true):
                $st=Student::find(Auth::guard('student')->user()->id);
                if($st->points < $request->points){
                    echo json_encode(['status' => 'error2', 'message' => 'Δεν μπορείς να χρησιμοποιήσεις περισσότερους πόντους από όσους έχεις', 'redirect' => true]);
                            return;
                }
                if($st->University->won){
                    $new_order->student_id = $logged_in_user->id;
                    $new_order->points_used = $request->points;
                    $new_order->total_price = $total_price;
                    $new_order->final_price=$total_price-$request->points;
                    $new_order->total_items = $total_items;
                }else{
                    $new_order->student_id = $logged_in_user->id;
                    $new_order->points_used = $request->points;
                    $new_order->total_price = $total_price;
                    $new_order->final_price=$total_price-(round($request->points)/2);
                    $new_order->total_items = $total_items;
                }
                
                try{
                    $new_order->save();
                } catch(\Exception $e){
                    echo json_encode(['status' => 'error2', 'message' => $e->getMessage(), 'redirect' => true]);
                    return;  
                }
                break;
            case(false):

                $new_order->user_id = $logged_in_user->id;
                $new_order->total_price = $total_price;
                $new_order->total_items = $total_items;
                $new_order->final_price=$total_price;
                try{
                    $new_order->save();
                } catch(\Exception $e){
                    echo json_encode(['status' => 'error2', 'message' => $e->getMessage(), 'redirect' => true]);
                    return;
                }
                break;
        }

        foreach($cart as $item){
            $order_details = new Order_Detail();
            $order_details->book_id = $item->id;
            $order_details->qty = $item->qty;
            $order_details->item_price = $item->price;
            $order_details->order()->associate($new_order);
            $order_details->save();
            $book=Book::find($order_details->book_id);
            $book->stock=$book->stock-$order_details->qty;
            $book->save();
        }
        
        if($new_order && $order_details){
            if($is_student){
                $st=Student::find(Auth::guard('student')->user()->id);
                $st->points=$st->points-$request->points;
                $st->save();
                $data=array();
                $data['name']=$st->name;
                $data['lastname']=$st->lastName;
                $data['email']=$st->email;
                $data['points']=$request->points;
                $data['st_id']=$st->id;
                dispatch(new UpdateStudentEudoxos($data));
                
                $data1=array();
                $data1['uni_id']=$st->University->id;
                $data1['points_used']=$request->points;
                event(new OrderDone($data1));
                dispatch(new StudentSendMailOrder($new_order));
            }else{
                dispatch(new SendMailOrder($new_order));
            }

            Cart::destroy();
            echo json_encode(['status' => 'ok', 'message' => 'Η αγορά σας ολοκληρώθηκε με επιτυχία.', 'redirect' => true]);
        }
    }
}
