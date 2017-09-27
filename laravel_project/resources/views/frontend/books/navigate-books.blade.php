@extends('frontend.base.base')

@section('content')
    <div class="products-page">
        <div class="products">
            <div class="product-listy">
                <h2>Κατηγορίες Βιβλίων</h2>

                <div id="wrapper">
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
                    @foreach($categories as $category)
                        @if(is_null($category->parent_id) && count($category->children) > 0)
                        <li>
                            <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> {{$category->type}}</a>
                            <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                                @foreach($category->children as $cat)
                                    <li class="subcategory_link"><a href="{{route('category_books', $cat->id)}}">{{$cat->type}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @elseif(is_null($category->parent_id) && count($category->children) == 0)
                            <li>
                                <a href="{{route('category_books', $category->id)}}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span>{{$category->type}}</a>
                            </li>
                        @endif
                    @endforeach
                    </ul>
                </div><!-- /#sidebar-wrapper -->
                </div>


            </div>
        </div>
        <div class="new-product">
            <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                <div class="cbp-vm-options">
                    <a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
                    <a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list" title="list">List View</a>
                </div>
                <div class="clearfix"></div>

                @if(count($books) == 0)
                    @if($cat_head)
                    <h1 class="text-center">{{$cat_head->type}}.</h1>
                    <h4 class="text-center">Δεν βρέθηκαν βιβλία για την συγκεκριμένη κατηγορία.</h4>
                    @endif
                @else
                @if($cat_head)
                <h1 class="text-center">{{$cat_head->type}}.</h1>
                @endif
                <ul>
                    @foreach($books as $book)
                    <li>
                        <a class="cbp-vm-image" href="{{route('single_book', $book->id)}}">
                        </a><div class="simpleCart_shelfItem"><a class="cbp-vm-image" href="{{route('single_book', $book->id)}}">
                                <div class="view view-first">
                                    <div class="inner_content clearfix">
                                        <div class="product_image">
                                            <img src="{{url('images', $book->imageURL)}}" class="img-responsive" alt="">
                                            <div class="product_container">
                                                <div class="cart-left">
                                                    <p class="title">{{str_limit($book->title,20)}}</p>
                                                </div>
                                                <div class="pricey"><span class="item_price">{{$book->price}} EUR</span></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="cbp-vm-details">
                                {{str_limit($book->description, 70)}}
                            </div>
                            <a class="cbp-vm-icon cbp-vm-add item_add" href="#" data-id="{{$book->id}}">Προσθήκη</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            {{ $books->links() }}
            <script src="{{URL::to('js/cbpViewModeSwitch.js')}}" type="text/javascript"></script>
            <script src="{{URL::to('js/classie.js')}}" type="text/javascript"></script>
            <script src="{{URL::to('js/sidebar_menu.js')}}" type="text/javascript"></script>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
@endsection