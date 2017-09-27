<?php

namespace realEudoxos\Http\Controllers;

use realEudoxos\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories=Category::all();
        return view('categories.categories')->with('categories',$categories);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.category-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type=$request->type;
        $new_cat=Category::firstOrCreate(['type'=>$type],['parent_id'=>NULL]);
        $categories=Category::all();
        return view('categories.categories')->with('categories',$categories);

    }

    /**
     * Display the specified resource.
     *
     * @param  \realEudoxos\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $cat=Category::find($category->id);
        return view('categories.category-show')->with('category',$cat);
    }


    public function showBooks($id){
        $cat=Category::find($id);
        $books=$cat->books;
        return view("categories.category-bookShow", compact('cat', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \realEudoxos\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=Category::find($id);
        return view('categories.category-edit')->with('category',$cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \realEudoxos\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $edited_cat=Category::find($request->cat_id);
        $edited_cat->type=$request->type;
        $edited_cat->save();
        $categories=Category::all();
        return redirect()->route('category.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \realEudoxos\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   $dcat=Category::find($request->cat_delete);
        if(count($dcat->children)>0){
             return redirect()->back()->with('alert', 'Category not Empty');

        }else{
            $dcat->delete();
            $categories=Category::all();
            return redirect()->route('category.index');
        }
    }
    /**
     *Create a subcategory giventh the id of the parent category
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function createSub(Request $request,$id){

        return view('categories.category-create-sub')->with('id',$id);

    }
    public function storeSub(Request $request){
        $type=$request->type;
        $parent_id=$request->parent_id;
        $new_cat=Category::firstOrCreate(['type'=>$type],['parent_id'=>$parent_id]);
        $cat=Category::find($parent_id);
        return redirect()->route('category.show');
    }

    public function destroySub(Request $request){
        $cat_id=$request->cat_delete;
        $dcat=Category::find($cat_id);
        $dcat->delete();
        $parent_cat=$dcat->parent;
        $cat=Category::find($parent_cat->id);
        return redirect()->route('category.show');
    }

    public function editSub($id)
    {
        $cat=Category::find($id);
        return view('categories.category-edit-sub')->with('category',$cat);
    }

    public function updateSub(Request $request)
    {   
        $edited_cat=Category::find($request->cat_id);
        $edited_cat->type=$request->type;
        $edited_cat->save();
        $parent_cat=$edited_cat->parent;
        $cat=Category::find($parent_cat->id);
        return redirect()->route('category.show');
    }
}
