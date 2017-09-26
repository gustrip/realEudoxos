@extends('layouts.app')

@section('content')
<div class="container">
	 <table class="table table-condensed table-striped">
	
    <tr>
		<th>Book#{{$book->id}} </th>
		<th></th>

	</tr>
    <tr>
        <td>@if($book->imageURL)
            <a href="#">
                    <img src="{{url('images',$book->imageURL)}}"/>
                </a>
          
            @endif</td>
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
        	<li>Year of Release: {{$book->yearOfRelease}} </li>
            <li>Category: {{$book->Category->type}} </li>
            <li>Publisher: {{$book->Publisher->name}}</li>
            <li>ISBN: {{$book->isbn}} </li>
            <li>Price: {{$book->price}} </li>
            <li>Stock: {{$book->stock}} </li>
            @if($book->description)
                <li>Description: {{$book->description}} </li>
            @endif
            
            
        	
    
    	</td>
        <td>
            <div class="container-fluid">
                    <ul class="list-inline">
                        <li>
                            <form  action="{{route('book.edit',['book'=>$book->id])}}" name="edit_book" method="GET">
                                {{ csrf_field() }}
                                <input type="hidden" name="book" value="{{$book->id}}" />
                                <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                            </form>
                        </li>
                        <li>
                            <form action="{{route('book.destroy',['book'=>$book->id])}}" name="delete_book" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="book" value="{{$book->id}}" />
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </li>
                    </ul>
            </div>
        </td>
    </tr>
    
    </table>
    
</div>
<div >
	<ul class="pager">
  		<li><a href="{{url()->previous()}} ">Previous</a></li>
	</ul>
</div>
@endsection