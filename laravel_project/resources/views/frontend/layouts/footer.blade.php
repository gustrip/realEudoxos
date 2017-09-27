<div class="container ">
    <div class="footer_top">
        <div class="span_of_4">
            <div class="col-md-3 span1_of_4">
                <h4>Αγορές</h4>
                <ul class="f_nav">
                    <li><a href="{{route('homepage')}} ">Αρχική</a></li>
                    <li><a href="{{route('best_sellers')}} ">Δημοφιλείς Εκδόσεις</a></li>
                    <li><a href="{{route('all_books')}} ">Βιβλία</a></li>
                    <li><a href="{{route('show_cart')}} ">Καλάθι</a></li>

                </ul>
            </div>
            <div class="col-md-3 span1_of_4">
                <h4>Βοήθεια</h4>
                <ul class="f_nav">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Επικοινωνία</a></li>
                    <li><a href="#">Όροι Χρήσης</a></li>
                    <li><a href="#">Τρόποι Πληρωμής</a></li>
                </ul>
            </div>
            <div class="col-md-3 span1_of_4">
                <h4>Λογαριασμός</h4>
                <ul class="f_nav">
                    <li><a href="{{route('general_login_form')}} ">Είσοδος</a></li>
                    <li><a href="{{route('general_register_form')}} ">Εγγραφή</a></li>
                    <li><a href="{{route('show_cart')}} ">Καλάθι</a></li>
                </ul>
            </div>
            @if(Auth::guard('student')->check())
            <div class="col-md-3 span1_of_4">
                <h4>RealEudoxosProject</h4>
                <ul class="f_nav">
                    <li><a href="{{route('battle')}} ">Η Μάχη των Πανεπιστημίων</a></li>
                    <li><a href="http://eudoxus.gr">Εύδοξος</a></li>
                    <li><a href="#">Σκοπός project</a></li>
                </ul>
            </div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="copyright text-center">
        <p>© 2017 RealEudoksos Eshop. All Rights Reserved</p>
    </div>
</div>






<script>

    $(document).ready(function () {



        // Clear Cart - Zero Values
        $('#clearCart').on('click', function(e){

            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '{{route('clear_cart')}}',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#alerts').addClass("alert alert-success");
                    $('#alert_text').html("<b>"+data.message+"</b>");
                    location.reload();
                },
                error: function() {
                    alert('Ajaxian Error - Cart Not Empty');
                }
            });
        }); // Clear Cart - Zero Values END



        // Add Item To Cart - Green Flash Notification Only
        $('.item_add').on('click', function(e){

            e.preventDefault();

            var this_item = $(this);
            var book_id = $(this).data('id');
            var change_total_items = $('.tot_items');
            var change_total_price = $('.tot_price');
            $.ajax({
                type: 'post',
                url: '{{route('add_to_cart')}}',
                data: {'book_id':book_id},
                dataType:'JSON',
                success:function(data){
                    if(data.status == true) {
                        $(this_item).notify(
                            "Προστέθηκε",
                            {position: "down", className: "success", autoHideDelay: 1000}
                        );
                        change_total_items.html(data.total_items);
                        change_total_price.html(data.total_price);
                    } else {
                        $(this_item).notify(
                            data.message,
                            {position: "down", className: "info", autoHideDelay: 5000}
                        );
                    }
                },
                error: function(){
                    alert('Ajaxian Error');
                }
            });


        }); // Add Item To Cart - Green Flash Notification Only END


        // Delete Item From Cart
        $('.close1').on('click', function(){

            var this_item = $(this).closest('.cart-header');

            var row_id = $(this).data('id');

            var change_total_items = $('.tot_items');
            var change_total_price = $('.tot_price');
            var change_ch = $('.changeable');

            $.ajax({

                type: 'post',
                url: '{{route('delete_cart_item')}}',
                data: {'row_id':row_id},
                dataType:'JSON',
                success: function(data) {
                    if(data.status == true){
                        change_total_items.html(data.total_items);
                        change_total_price.html(data.total_price);
                        change_ch.html(data.total_price);
                        this_item.fadeOut('slow', function(){
                            this_item.remove();
                        });
                    }
                },
                error: function(){
                    alert('Ajaxian Error - Not Deleted')
                }

            });
        }); // Delete Item From Cart END


    }); // Document On Ready Close
</script>
