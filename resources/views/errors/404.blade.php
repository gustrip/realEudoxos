@extends('frontend.base.base')


@section('error_class')


<div class="container col-md-3 col-md-offset-4">
        <div class="content center span span3">
            <div class="title">Error 404</div>
            <p><STRONG> Αυτό που ψάχνεις δεν υπάρχει </STRONG></p>
            <p><a class="title-sub" href="{{ route('homepage') }}">Αρχική</a></p>
        </div>
    </div>


@endsection