@extends('frontend.base.base')


@section('error_class')


<div class="container">
        <div class="content center ">
            <div class="title">Error 503</div>
            <p>Αυτή τη στιγμή δεν μπορούμε να σας εξυπηρετήσουμε</p>
            <p><a class="title-sub" href="{{ route('homepage') }}">Αρχική</a></p>
        </div>
    </div>


@endsection