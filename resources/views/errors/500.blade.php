@extends('frontend.base.base')


@section('error_class')


<div class="container">
        <div class="content center ">
            <div class="title">Error 500</div>
            <p>Κάτι πήγε στραβά</p>
            <p><a class="title-sub" href="{{ route('homepage') }}">Αρχική</a></p>
        </div>
    </div>


@endsection