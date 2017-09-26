@extends('layouts.app')

@section('content')
<div class="container">

<div >
    <ul class="pager">
        <li><a href="{{route('category.index')}} ">Previous</a></li>
    </ul>
</div>

<h2>Books of Category: {{$cat->type}}</h2>
    @if(count($books)==0)
        <div class="container-fluid center">
            <h4>No Books for this category </h4>
        </div>


    @else
	 <table class="table table-condensed table-striped">
     @foreach($books as $book)
    <tr>
        <th>Book#{{$book->id}} </th>
        <th></th>

    </tr>
    <tr>
        <td>
            <li>Title:{{$book->title}}</li>
            @if(count($book->Authors)>1)
                <ol>Authors
                @foreach($book->Authors as $author)
                    <li>{{$author->name ." ". $author->surname}}</li>
                @endforeach
                </ol>
            @else
                    <li>Author: {{$book->Authors{0}->name." ". $book->Authors{0}->surname}}</li>
            @endif
            <li>Publisher: {{$book->Publisher->name}} </li>
            <li>Category: {{$book->Category->type}} </li>
            
            <td>
            <div class="container-fluid">
                    <ul class="list-inline">
                        <li>
                            <form action="{{route('book.destroy',['book'=>$book->id])}}" name="delete_book" method="POST">
                            {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="book" value="{{$book->id}}" />
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </li>
                        <li>
                            <form action="{{route('book.show',['book'=>$book->id])}}" name="show_book" method="GET">
                            {{ csrf_field() }}
                                <input type="hidden" name="book" value="{{$book->id}}" />
                                <input type="submit" class="btn btn-primary btn-sm" value="Show More Details">
                            </form>
                        </li>
                    </ul>
                            </div>
            </td>
            
    @endforeach
        </td>
    </tr>
     
    
    </table>
    @endif
</div>
<div >
	<ul class="pager">
  		<li><a href="{{route('category.index')}} ">Previous</a></li>
	</ul>
</div>
@endsection