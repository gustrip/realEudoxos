@extends('frontend.base.base')


@section('error_class')


<div class="container center">
        <div class="content ">
            <div class="title">Error 403</div>
            <p>Απαγορευμένη περιοχή</p>
            <p><a class="title-sub" href="{{ route('homepage') }}">Αρχική</a></p>
        </div>
    </div>


@endsection