@extends('frontend.base.base')


@section('content')
    <div class="top_padding">
        <div class="col-md-5">
            <img src="{{asset('images/').'/'.$book->imageURL}}" alt="" width="80%" height="80%">
        </div>
        <div class="col-md-7 dress-info">
            <div class="dress-name">
                <h3>{{$book->title}}</h3>
                <span>{{$book->price}} EUR</span>
                <div class="clearfix"></div>
                <p>{{$book->description}}</p>
            </div>
            <div class="span span3">
                <p class="left">YEAR OF RELEASE</p>
                <p class="right">{{$book->yearOfRelease}}</p>
                <div class="clearfix"></div>
            </div>
            <div class="span span3">
                <p class="left">PUBLISHER</p>
                <p class="right">{{$book->publisher->name}}</p>
                <div class="clearfix"></div>
            </div>
            <div class="span span3">
                <p class="left">ISBN</p>
                <p class="right">{{$book->isbn}}</p>
                <div class="clearfix"></div>
            </div>
            <div class="span span3">
                <p class="left">STOCK</p>
                <p class="right stock">{{$book->stock}}</p>
                <div class="clearfix"></div>
            </div>
            @if($book->category)
                <div class="span span3">
                    <p class="left">CATEGORY</p>
                    <p class="right">{{$book->category->type}}</p>
                    <div class="clearfix"></div>
                </div>
            @endif
            
                <div class="span span3">
                <p class="left">AUTHORS</p>
            @if(count($book->Authors)>1)
                @foreach($book->Authors as $author)
                    <p class="right">{{$author->name ." ". $author->surname.", "}}</p>
                @endforeach
            @else
 
                    <p class="right">{{$book->Authors{0}->name." ". $book->Authors{0}->surname}}</p>
            @endif
            <div class="clearfix"></div>
            </div>
            @if($book->stock>0)
            <div class="purchase product simpleCart_shelfItem ">
                <a data-id="{{$book->id}}" class="item_add right" href="#">Προσθήκη στο καλάθι</a><span class="item_price hidden">{{$book->price}}</span>
                <div class="clearfix"></div>
            </div>
            @else
            <div class="purchase product simpleCart_shelfItem">
                <a data-id="{{$book->id}}" class="non-active">Τέλος Αποθεμάτων</a>
                <div class="clearfix"></div>
            </div>
            @endif

        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

@endsection