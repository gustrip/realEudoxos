<?php

namespace realEudoxos\Http\Controllers\Frontend;

use Illuminate\Support\Facades\View;
use realEudoxos\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

use realEudoxos\Book;
use realEudoxos\Student;
use realEudoxos\University;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function addItem(Request $req){

        if(!$req->ajax()){return false;}

        $book_id = $req['book_id'];

        $book = Book::findOrFail($book_id);

        if($book){
            $book_id = $book->id;
            $book_title = $book->title;
            $book_price = $book->price;
            $book_stock = $book->stock;
            $qty = 1;

            if($book->stock>0){
                if ($cart_item=Cart::add($book_id, $book_title, $qty, $book_price)->associate(Book::class))
                {
                    if($cart_item->qty<=$book->stock){
                        $cart_item->setTaxRate(0);//default taxRate is 21%
                        $total_items = Cart::count();
                        $total_price = Cart::total();
                        $response = ['status' => true, 'message' => 'Το προιόν προστέθηκε στο καλάθι σας.', 'total_items' => $total_items, 'total_price' => $total_price,];

                        echo json_encode($response);

                    }else{

                        Cart::update($cart_item->rowId,$cart_item->qty-$qty);
                        $cart_item->setTaxRate(0);
                        $total_items = Cart::count();
                        $total_price = Cart::total();
                        $response = ['status' => false, 'message' => 'Αδυναμία προσθήκης του προιόντος στο καλάθι σας.', 'total_items' => $total_items, 'total_price' => $total_price,];

                        echo json_encode($response);
                    }
                    
                } else {

                    $response = ['status' => false, 'message' => 'Αδυναμία προσθήκης του προιόντος στο καλάθι σας.'];

                    echo json_encode($response);
                }
            }else{
                $response = ['status' => false, 'message' => 'Αδυναμία προσθήκης του προιόντος στο καλάθι σας.Τελος Αποθεμάτων'];

                    echo json_encode($response);
            }    

        } else {

            $response = ['status' => false, 'message' => 'Αδυναμία προσθήκης του προιόντος στο καλάθι σας.'];

            echo json_encode($response);
        }

    }

    protected function getCurrentCart(){

        $current_cart = Cart::Content();
        return $current_cart;

    }
    
    protected function getCurrentCartTotalPrice(){

        $total_price = Cart::total();
        return $total_price;

    }

    public function showCart(){

        $cart = $this->getCurrentCart();
        $total_price=$this->getCurrentCartTotalPrice();
        $total_items = Cart::count();
        $logged_in_user=$this->getLoggedInUser();
        $is_student=false;
        if($logged_in_user){
            $is_student = ($logged_in_user->isStudent()) ? true : false;
        }
        if($is_student){
            $uni_id=$logged_in_user->University;
            $uni=University::find($uni_id);
            $won=$uni->won;
            return view('frontend.cart.show-cart', compact('cart', 'total_items','total_price','won'));
        }else{
            return view('frontend.cart.show-cart', compact('cart', 'total_items','total_price'));
        }
    }

    public function deleteCartItem(Request $request){

        if(!$request->ajax()){return false;}

        $row_id = $request['row_id'];

        if (Cart::remove($row_id)){

            $total_items = Cart::count();

            $total_price = Cart::total();

            echo json_encode(['status' => true, 'total_items' => $total_items, 'total_price' => $total_price]);
        } else {
            echo json_encode(['status' => false]);
        }

    }

    public function clearCart(Request $req){

        if(!$req->ajax()){return false;}

        if (Cart::destroy()) {

            $response = ['status' => true, 'message' => 'Το καλάθι σας άδειασε επιτυχώς.'];

            echo json_encode($response);

        } else {

            $response = ['status' => false, 'message' => 'Κάτι πήγε στραβά με την διαγραφή του καλαθιού.'];

            echo json_encode($response);
        }

    }

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
    
}
