<?php


namespace realEudoxos\Http\Controllers\Frontend;

use realEudoxos\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use realEudoxos\Book;
use realEudoxos\Category;
use realEudoxos\Order_Detail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;

class FrontController extends Controller
{
    public function getHomepage(){

        $books = Book::orderBy('created_at', 'desc')->take(6)->get();
        $bestSellers=$this->findBestSellers(3);
        return view('frontend.homepage', compact('books','bestSellers'));

    }
    public function bestSellers(){

        $books=$this->findBestSellers(6);
        return view('frontend.books.bestSellers', compact('books'));
    }

    public function singleBook($id){

        $book = Book::findOrFail($id);
        return view('frontend.books.single-book', compact('book'));

    }

    public function allBooks(){

        $books = Book::paginate(6);
        $cat_head=null;
        $categories = Category::All();

        return view('frontend.books.navigate-books', compact('books', 'categories','cat_head'));
    }

    public function booksByCategory($id){

        $books = Book::where('category_id', $id)->paginate(6);
        $cat_head= Category::find($id);
        $categories = Category::All();
        return view('frontend.books.navigate-books', compact('books', 'categories','cat_head'));

    }

    protected function findBestSellers($qty=3){
        $books=Book::all();
        $table=collect();
        foreach ($books as $book) {
          $item=DB::table('order_details')
            ->select('book_id',DB::raw('SUM(QTY) AS QTY'))
            ->groupBy('book_id')
            ->where('book_id',$book->id)
            ->get();
            if(!$item->isEmpty()){
              $table->push($item);
            }
            $table=$table->sortBy("QTY")->take($qty);
          
        }
        $books=collect();
        foreach ($table as $temp) {
          $a=Book::find($temp->first()->book_id);
          $books->push($a);   
        }
        return $books;
    }
}
