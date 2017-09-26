<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />


    <!-- Scripts -->
    <script src="{{URL::to('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap-3.1.1.min.js') }}"></script>
    <script src="{{URL::to('js/notify.min.js')}}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        {{config('app.name')}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{Auth::user()->name}}</a>
                    <a class="navbar-brand" href="{{ route('admin.logout') }}">Log out</a>



                            

                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script>
    @if(session('status'))
    $(document).ready(function(){
        $('.panel-heading').notify("{{session('status')}}","info ");

    });
    @endif
</script>
</body>
</html>
