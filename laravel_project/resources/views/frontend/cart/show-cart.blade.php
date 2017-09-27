@extends('frontend.base.base')

@section('cart_class')
    <div class="cart-items">
@endsection

@section('content')

 
            <h2 class="cart-header-custom">ΚΑΛΑΘΙ ΑΓΟΡΩΝ ( <span class="tot_items">{{$total_items}}</span> Προιόντα )</h2>
                @if($total_items == 0)
                 <h3 class="text-center">Δεν υπάρχουν προιόντα στο καλάθι αγορών σας.</h3>
                @endif
            <div class="cart-gd">
                @foreach($cart as $item)
                    <div class="cart-header">
                        <div class="close1" data-id="{{$item->rowId}}"></div>
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc">
                                <img src="{{url('images', $item->model->imageURL)}}" class="img-responsive" alt="">
                            </div>
                            <div class="cart-item-info">
                                <h3>
                                    <a class="cart-title" href="{{route('single_book', $item->id)}}"> {{$item->name}} </a>
                                    <span class="cart-qty">Ποσότητα: {{$item->qty}}</span>
                                </h3>
                                <ul class="qty">
                                    <li><p class="cart-price">Τιμή / Τεμάχιο: {{$item->price}} EUR</p></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                @endforeach

                
                    @if(Auth::guard('student')->check())
                        @if($total_items > 0)

                    <div class="span span3">
                            @if($won)
                            <div class="row justify-content-center">
                                <p class="text-center col-md-4 col-md-offset-4" style=" font-size:15px;font-family: 'Roboto',sans-serif;"><strong>Η Σχολή Σου έχει νικήσει την Μάχη.Μπορείς να κανείς τις αγορές σου με αναλογία πόντων "1 πόντος, 1 Ευρώ"</strong></p>
                            </div>
                            @endif
                            <div class="row justify-content-center">
                                <label class="col-md-1 ">Πόντοι:</label>
                                @if(floor(Auth::guard('student')->user()->points) < floor($total_price))
                                <input id="points" type="number" class="col-md-1 " name="points" value="{{floor( Auth::guard('student')->user()->points )}}" step="1" min="0" max="{{floor( Auth::guard('student')->user()->points )}}" required autofocus>
                                @else
                                <input id="points" type="number" class="col-md-1 " name="points" value="{{ floor($total_price) }}" step="1" min="0" max="{{ floor($total_price)}}" required autofocus>
                                @endif
                                <p id="text_points" class="text-left col-md-7" style="font-size:15px;font-family: 'Roboto',sans-serif;"><em>Πόσους πόντους από τον Εύδοξο+ επιθυμείς να χρησιμοποιήσεις για αυτήν την αγορά;<em></p>
                            </div>
                    </div>
                    

                    </div>
                        <div class="span span3">
                            <div class="row justify-content-center">
                                 <label class="col-md-3 ">Τελική τιμή(χωρίς τους πόντους):</label>
                                 <p class="text-left col-md-7 changeable" style="font-size:15px;font-family: 'Roboto',sans-serif;">{{$total_price}}</p>
                            </div>

                        </div>

                                <div class="text-center">
                                    <button id="complete_order" class="btn btn-primary" style="font-size:22px;font-family: 'Roboto',sans-serif;">ΟΛΟΚΛΗΡΩΣΗ ΑΓΟΡΩΝ</button>
                                </div>
                            @endif


                    @else
                        @if($total_items > 0)

                            <div class="span span3">
                                <div class="row justify-content-center">
                                     <label class="col-md-3 ">Τελική τιμή: </label>
                                     <p class="text-left col-md-7 changeable" style="font-size:15px;font-family: 'Roboto',sans-serif;">{{$total_price}}</p>
                                </div>

                            </div>

                            <div class="text-center">
                                <button id="complete_order" class="btn btn-primary" style="font-size:22px;font-family: 'Roboto',sans-serif;">ΟΛΟΚΛΗΡΩΣΗ ΑΓΟΡΩΝ</button>
                            </div>
                        @endif
                    @endif

                </div>

                <div class="text-center alert-info" >
                    <p class="text-center " style="font-size:15px;font-family: 'Roboto',sans-serif;">
                    Με την ολοκλήρωση των αγορών σας σας αποστέλνετε ένα ηλ. μήνυμα με την απόδειξη, την οποία χρειάζεται να προσκομίσετε για την παραλαβή της παραγγελίας σας από το κατάστημα μας
                    </p>
                </div>

        

        
    <script>

        $(document).ready(function(){
            var i=0;
            $('#complete_order').on('click', function(){
                $('#complete_order').addClass("disabled");
                var p=$('#points').val();
                $.ajax({
                    method: 'post',
                    url: '{{route('new_order')}}',
                    data: {'points':p},
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 'error1'){//log in problems
                            $('#alerts').addClass("alert alert-info");
                            $('#cl').removeClass("hidden");
                            $('#alert_text').html("<b>"+response.message+"</b>");
                            window.location='{{route('general_login_form')}}';
                        } else if(response.status == 'error2') {//stock problems
                            $('#alerts').addClass("alert alert-info");
                            $('#cl').removeClass("hidden");
                            $('#alert_text').html("<b>"+response.message+"</b>");
                            window.location='{{route('show_cart')}}';
                        }else if(response.status == 'ok'){
                            $('#alerts').addClass("alert alert-success");
                            $('#cl').removeClass("hidden");
                            $('#alert_text').html("<b>"+response.message+"</b>");
                            window.location= '{{route('homepage')}}';
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(d);
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }

                });

            });

            $('#text_points').on( "mouseenter", function(){
                i++;
                if(i<3){
                    $(this).notify(
                    "Σαν φοιτητής που συμμετέχει στον Εύδοξο+ μπορείς να χρησιμοποιήσεις τους πόντους σου σαν έκπτωση στα προϊόντα μας",
                    {position: "top",showAnimation: 'slideDown', className: "info",autoHideDelay: 1000,});
                }
            });

        });

    </script>

    </div>

@endsection