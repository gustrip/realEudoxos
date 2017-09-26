@component('mail::message')
# Απόδειξη Αγοράς {{$order->id}}

###Η Παραγγελία σας
@component('mail::table')
|Ημερομηνία Αγοράς|Όνομα Χρήστη      |Αριθμός Προϊοντων|Αρχικό Ποσό|Πόντοι|Τελικό Ποσό|
|:---------------:|:----------------:|----------------:|----------:|-----:|----------:|
|{{$order->created_at}}|{{$order->student->name." ".$order->student->lastName}}|{{$order->total_items}}|{{$order->total_price}}|{{$order->points_used}}|{{$order->final_price}}|
@endcomponent

###Τα Προϊόντα της Παραγγελία σας
@component('mail::table')
|#Βιβλιο|       Τίτλος       |Ποσότητα|Τιμή  |
|:------|:------------------:|-------:|-----:|
@foreach($order->orderDetails as $item)
|{{$item->book_id}}|{{$item->book->title}}|{{$item->qty}}|{{$item->item_price}}|
@endforeach
@endcomponent


Ευχαριστούμε που μας προτίμησες<br>
{{ config('app.name') }}
@endcomponent