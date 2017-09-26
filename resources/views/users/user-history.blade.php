@extends('layouts.app')

@section('content')



<div class="container">

   
<div >
    <ul class="pager">
        <li><a href="{{route('users.index')}}">Previous</a></li>
    </ul>
</div>

	<table class="table table-condensed table-striped">
                <tr>
                    <th>User#{{$user->id}} History </th>
                    <th></th>

                </tr>
                <tr>
                    <td>
                        <div>
                            @if($total_orders<=0)
                            <p class="text-center"><strong>No Order History</strong></p>     
                            @endif
                        </div>
                    </td>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>
                            <li>OrderNo: {{$order->id}}</li>
                            <li>Final Price: {{$order->final_price}} </li>
                            <li>Total Products: {{$order->total_items}}</li>                        
                        </td>
                    </tr>
                    @foreach($order->orderDetails as $item)
                        <li class="odetails">{{$loop->iteration}}. <strong>Bιβλίο:</strong> {{$item->book->title}} | <strong>Ποσότητα:</strong> {{$item->qty}} | <strong>Τιμή:</strong> {{$item->item_price}} EUR</li>
                    @endforeach
                @endforeach
        </table>

    

@endsection