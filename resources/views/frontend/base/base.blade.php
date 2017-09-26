<!DOCTYPE html>
<html>

@include('frontend.layouts.header')

<body>

@include('frontend.layouts.topbar')

@include('frontend.layouts.main_menu')

@yield('error_class')

<div class="container content">
	@include('frontend.alerts.alert')
</div>


@yield('cart_class')
<div class="container">
        @yield('content')
</div>

<div class="footer">
    @include('frontend.layouts.footer')
</div>



</body>
</html>