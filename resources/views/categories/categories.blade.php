@extends('layouts.app')

@section('content')



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="{{route('admin.dashboard')}} ">Previous</a></li>
        </ul>
    </div>
    <div class="container">
            <a  class="btn btn-warning btn-sm" href="{{route('category.create')}} ">Add New Category</a>
    </div>

	 <table class="table table-condensed table-striped">
    @foreach($categories as $cat)
    <tr>
        @if(count($cat->parent)==0)
		<th>Category#{{$cat->id}} </th>
		<th></th>

	</tr>
    <tr>
    	<td>
        	<li>Title:{{$cat->type}}</li>
        	<td>
        	<div class="container-fluid">
                    <ul class="list-inline">
                        <li>
                        	<form action="{{route('category.edit',['id'=>$cat->id])}}" name="edit_cat" method="GET">
                            {{ csrf_field() }}
                                <input type="hidden" name="cat_edit" value="{{$cat->id}}" />
                                <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                            </form>
                        </li>
                        <li>
                        	<form action="{{route('category.destroy',['id'=>$cat->id])}}" name="delete_cat" method="POST">
                        	{{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                        		<input type="hidden" name="cat_delete" value="{{$cat->id}}" />
                        		<input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        	</form>
                        </li>
                        <li>    
                            <form action="{{route('category.show',['id'=>$cat->id])}}" name="show_cat" method="GET">
                            {{ csrf_field() }}
                                <input type="hidden" name="cat_show" value="{{$cat->id}}" />
                                <input type="submit" class="btn btn-primary btn-sm" value="Show More Details">
                            </form>
                        </li>
                    </ul>
        	</div>
			</td>
    @endif
    @endforeach
    	</td>
    </tr>
    </table>
    
</div>
<div >
	<ul class="pager">
  		<li><a href="{{route('admin.dashboard')}} ">Previous</a></li>
	</ul>
</div>
@if (session('alert'))
        <div class="alert alert-danger">
        <h3>{{session('alert')}}!</h3>
        <p>delete first all the subcategories.</p>
    </div> 
@endif

@endsection