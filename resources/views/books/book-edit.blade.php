@extends('layouts.app')

@section('content')

<div class="container">

<div >
    <ul class="pager">
        <li><a href="{{route('book.index')}} ">Previous</a></li>
    </ul>
</div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Book: <STRONG>{{$book->title}}</STRONG></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('book.update', ['book' => $book->id])}} " enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $book->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('yearOfRelease') ? ' has-error' : '' }}">
                            <label for="yearOfRelease" class="col-md-4 control-label">Year of Release</label>

                            <div class="col-md-6">
                                <input id="yearOfRelease" type="number" class="form-control" name="yearOfRelease" value="{{ $book->yearOfRelease }}" required>

                                @if ($errors->has('yearOfRelease'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('yearOfRelease') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('author_first_name') ? ' has-error' : '' }}">
                            <label for="author_first_name" class="col-md-4 control-label">Author First Name</label>

                            <div class="col-md-6">
                                <input id="author_first_name" type="text" class="form-control" name="author_first_name" value="{{$book->Authors{0}->name }}" required>

                                @if ($errors->has('author_first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author_first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('author_surname') ? ' has-error' : '' }}">
                            <label for="author_surname" class="col-md-4 control-label">Author Surname </label>

                            <div class="col-md-6">
                                <input id="author_surname" type="text" class="form-control" name="author_surname" value="{{$book->Authors{0}->surname}}" required>

                                @if ($errors->has('author_surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author_surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                            <label for="publisher" class="col-md-4 control-label">Publisher</label>

                            <div class="col-md-6">
                                <input id="publisher" type="text" class="form-control" name="publisher" value="{{ $book->Publisher->name }}" required>

                                @if ($errors->has('publisher'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publisher') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('isbn') ? ' has-error' : '' }}">
                            <label for="isbn" class="col-md-4 control-label">ISBN</label>

                            <div class="col-md-6">
                                <input id="isbn" type="number" class="form-control" name="isbn" value="{{$book->isbn }}" required>

                                @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="{{ $book->price }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stock" class="col-md-4 control-label">Stock</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control" name="stock" value="{{ $book->stock }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $book->description }}" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">

                                <select id="category_id" name="category_id" class="custom-select">
                                <option selected>Select a Category</option>
                                    @foreach($categories as $category)
                                        @if($category->parent==NULL && count($category->children)!=0)
                                        <optgroup label="{{$category->type}}">
                                            @foreach($category->children as $child)
                                                <option value="{{$child->id}}">{{$child->type}}</option>
                                            @endforeach
                                        </optgroup>
                                        @elseif($category->parent==NULL && count($category->children)==0)
                                            <optgroup label="{{$category->type}}">
                                                <option value="{{$category->id}}">{{$category->type}} </option>
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                       <div class="form-group">
                            <label for="imageURL" class="col-md-4 control-label">imageURL</label>

                            <div class="col-md-6">
                                <input id="imageURL" type="file"  name="imageURL" value="{{$book->imageURL}} " >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>




<div >
    <ul class="pager">
        <li><a href="{{route('book.index')}} ">Previous</a></li>
    </ul>
</div>
@endsection