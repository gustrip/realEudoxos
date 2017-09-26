@extends('layouts.app')

@section('content')



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="{{route('category.index')}} ">Previous</a></li>
        </ul>
    </div>
    @if(count($category->children)>0)
	 <table class="table table-condensed table-striped">

    <tr>
        
		<th>Title: {{$category->type}}</th>
        <th></th>

	</tr>
    <tr><th><STRONG>Subcategories</STRONG></th>
        <th>
            <div>
                <form action="{{$category->id}}/createsub" name="create_subcat" method="POST">
                {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$category->id}}" />
                    <input type="submit" class="btn btn btn-sm btn-info" value="Create Subcategory">
                </form>
            </div>
        </th>
        
    </tr>
     @foreach($category->children as $cat)
    <tr>
    	<td>
            <li>Category# {{$cat->id}}</li>
        	<li>Title:{{$cat->type}}</li>
        	<td>
        	   <div>
            	<form action="{{action('CategoryController@editSub', ['id' => $cat->id])}}" name="edit_cat" method="GET">
                {{ csrf_field() }}
                    <input type="hidden" name="cat_edit" value="{{$cat->id}}" />
                    <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                </form>
            	<form action="{{action('CategoryController@destroySub', ['id' => $cat->id])}}" name="delete_cat" method="POST">
            	{{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
            		<input type="hidden" name="cat_delete" value="{{$cat->id}}" />
            		<input type="submit" class="btn btn-danger btn-sm" value="Delete">
            	</form>
        	   </div>
               <div>
                <form action="{{$category->id}}/createsub" name="create_subcat" method="POST">
                {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$category->id}}" />
                    <input type="submit" class="btn btn btn-sm btn-info" value="Create Subcategory">
                </form>
                <form action="{{$cat->id}}/bookShow" name="bookShow" method="GET">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$category->id}}" />
                    <input type="submit" class="btn btn btn-sm btn-success" value="Show Books of this Category">

                </form>
    </div>
			</td>
        
    	</td>
                
    </tr>
    @endforeach
    </table>
    @else
    <STRONG> No Subcategories</STRONG>
    <div>
                <form action="{{$category->id}}/createsub" name="create_subcat" method="POST">
                {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$category->id}}" />
                    <input type="submit" class="btn btn btn-sm btn-info" value="Create Subcategory">
                </form>
                <form action="{{$category->id}}/bookShow" name="bookShow" method="GET">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$category->id}}" />
                    <input type="submit" class="btn btn btn-sm btn-success" value="Show Books of this Category">

                </form>
    </div>
    @endif
    
</div>

<div >
	<ul class="pager">
  		<li><a href="{{route('category.index')}} ">Previous</a></li>
	</ul>
</div>
@endsection