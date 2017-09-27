@extends('frontend.base.base')

@section('cart_class')
    <div class="cart-items">
        @endsection

        @section('content')
            <h2 class="cart-header-custom">Ιστορικό Αγορών ( {{$total_orders}} Αγορές)</h2>
            @if($total_orders == 0)
                <h3 class="text-center" style="font-family: sans-serif">Δεν έχετε πραγματοποιήσει κάποια αγορά.</h3>
            @endif
            <div class="cart-gd">
                @foreach($orders as $order)
                    <div class="cart-header details">
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item-info">
                                <h3>
                                    <p class="otitle">Παραγγελία #{{$loop->iteration}} |Αρχική Τιμή {{$order->total_price}} EUR | Πόντοι που χρησιμοποιήθηκαν {{$order->points_used}} | Τελική τιμή {{$order->final_price}} EUR</p>
                                </h3>

                                <ul>
                                    @foreach($order->orderDetails as $item)
                                        <li class="odetails">{{$loop->iteration}}. <strong>Bιβλίο:</strong> {{$item->book->title}} | <strong>Ποσότητα:</strong> {{$item->qty}} | <strong>Τιμή:</strong> {{$item->item_price}} EUR</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    </div>

@endsection