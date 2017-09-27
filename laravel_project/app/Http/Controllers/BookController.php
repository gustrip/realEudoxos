<?php

namespace realEudoxos\Http\Controllers;

use realEudoxos\Book;
use realEudoxos\Publisher;
use realEudoxos\Author;
use realEudoxos\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BookController extends Controller
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

            $books = Book::all();
            return view("books.books")->with('books',$books);
            
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::all();
        return view('books.book-create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $publisher=$request->publisher;
        $author_first_name=$request->author_first_name;
        $author_surname=$request->author_surname;
        $book=$request->except('imageURL');
            $this->validate($request,[
            'title'=>'required|string|max:255',
            'yearOfRelease'=>'numeric|required',
            'isbn'=>'numeric|required|unique:books',
            'price'=>'numeric|required',
            'stock'=>'numeric|required',
            'category_id'=>'numeric|required',
            'description'=>'nullable|string',
            'image'=>'image|nullable|mimes:png,jpg,jpeg|max:10000'
        ]);

        $image=$request->imageURL;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $book['imageURL']=$imageName;
        }

        $pub=Publisher::firstOrCreate(['name'=>$publisher]);
        $author=Author::firstOrCreate(['name'=>$author_first_name],['surname'=>$author_surname]);
        $book['publisher_id']=$pub->id;
        $new_book=Book::create($book);
        $new_book->Authors()->attach($author->id);
        return redirect()->route('book.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Book::find($id);
        return view('books.book-show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Book::find($id);
        $categories=Category::all();
        return view('books.book-edit')->with('book',$book)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \realEudoxos\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {   
        if($book->isbn==$request->isbn){
            $publisher=$request->publisher;
            $author_first_name=$request->author_first_name;
            $author_surname=$request->author_surname;
            $form_book=$request->except('imageURL','_token','_method','author_first_name','author_surname','publisher','isbn');
            $this->validate($request,[
            'title'=>'required|string|max:255',
            'yearOfRelease'=>'numeric|required',
            'price'=>'numeric|required',
            'stock'=>'numeric|required',
            'category_id'=>'numeric|nullable',
            'description'=>'nullable|string',
            'image'=>'image|nullable|mimes:png,jpg,jpeg|max:10000'
            ]);
            if($request->imageURL){
                $image=$request->imageURL;
                if($image){
                    $imageName=$image->getClientOriginalName();
                    $image->move('images',$imageName);
                    $form_book['imageURL']=$imageName;
                }
            }else{
                $form_book['imageURL']="";
            }
            $pub=Publisher::firstOrCreate(['name'=>$publisher]);
            $author=Author::firstOrCreate(['name'=>$author_first_name],['surname'=>$author_surname]);
            $form_book['publisher_id']=$pub->id;
            $updated_book=Book::UpdateOrCreate(['isbn'=>$request->isbn],$form_book);
            $updated_book->Authors()->sync($author->id);

            return redirect()->route('book.index');
        }else{

            $dbook=Book::find($book->id);
            $dbook->Authors()->detach();
            $dbook->delete();

            $publisher=$request->publisher;
            $author_first_name=$request->author_first_name;
            $author_surname=$request->author_surname;
            $book=$request->except('imageURL');
                $this->validate($request,[
                'title'=>'required|string|max:255',
                'yearOfRelease'=>'numeric|required',
                'isbn'=>'numeric|required|unique:books',
                'price'=>'numeric|required',
                'stock'=>'numeric|required',
                'description'=>'nullable|string',
                'image'=>'image|nullable|mimes:png,jpg,jpeg|max:10000'
            ]);
            $image=$request->imageURL;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('images',$imageName);
                $book['imageURL']=$imageName;
            }

            $pub=Publisher::firstOrCreate(['name'=>$publisher]);
            $author=Author::firstOrCreate(['name'=>$author_first_name],['surname'=>$author_surname]);
            $book['publisher_id']=$pub->id;
            $new_book=Book::create($book);
            $new_book->Authors()->attach($author->id);
            return redirect()->route('book.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \realEudoxos\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $dbook=Book::find($book->id);
        $dbook->Authors()->detach();
        $dbook->delete();
        return redirect()->route('book.index');
    }
}
