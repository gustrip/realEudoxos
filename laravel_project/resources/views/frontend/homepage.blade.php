@extends('frontend.base.base')


@section('content')

    <div class="products-grid">
        <header>
            <h3 class="head text-center" style="font-family: 'Roboto', sans-serif">Πρόσφατες Εκδόσεις</h3>
        </header>
        @foreach ($books as $book)
        <div class="col-md-4 product simpleCart_shelfItem text-center">
            <a href="{{ route('single_book', $book->id) }}"><img class="image-front" src="{{asset('images/').'/'.$book->imageURL}}" alt="" /></a>
            <a class="product_name" href="{{ route('single_book', $book->id) }}">{{ str_limit($book->title,10)  }}</a>
            <p>
                <a title="Προσθήκη στο καλάθι" class="item_add" href="#" data-id="{{$book->id}}">
                    <i style="font-family: 'Roboto'"></i>
                    <span class="item_price">{{$book->price}} EUR</span>
                </a>
            </p>
        </div>
        @endforeach
        <div class="clearfix"></div>
    </div>

    <div class="products-grid">
        <header>
            <h3 class="head text-center" style="font-family: 'Roboto', sans-serif">Δημοφιλείς Εκδόσεις</h3>
        </header>
        @foreach ($bestSellers as $bs)
        <div class="col-md-4 product simpleCart_shelfItem text-center">
            <a href="{{ route('single_book', $bs->id) }}"><img class="image-front" src="{{asset('images/').'/'.$bs->imageURL}}" alt="" /></a>
            <a class="product_name" href="{{ route('single_book', $bs->id) }}">{{ str_limit($bs->title,10)  }}</a>
            <p>
                <a title="Προσθήκη στο καλάθι" class="item_add" href="#" data-id="{{$bs->id}}">
                    <i style="font-family: 'Roboto'"></i>
                    <span class="item_price">{{$bs->price}} EUR</span>
                </a>
            </p>
        </div>
        @endforeach
        <div class="clearfix"></div>
    </div>

@endsection