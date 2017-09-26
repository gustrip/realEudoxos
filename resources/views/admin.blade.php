@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div  class="panel-heading text-center">Admin Dashboard</div>
                    
                </div>
            </div>
        </div>

        <h3 class="text-center" >Options</h3>
        <div class="container">
            <div class="row ">
                    <div class="col-md-4 col-md-offset-2"  >
                        <form action={{route('book.index')}} name="book_index" method="GET">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="See All Books">
                        </form>
                    </div>
            </div>

            <div class="row ">
                    <div class="col-md-4 col-md-offset-2"  >
                        <form action={{route('category.index')}} name="category_index" method="GET">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary " value="See All Categories">
                        </form>
                    </div>
            </div>

            <div class="row ">
                    <div class="col-md-4 col-md-offset-2"  >
                        <form action={{route('users.index')}} name="user_index" method="GET">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary " value="See All Users">
                        </form>
                    </div>
            </div>

            <div class="row ">
                    <div class="col-md-4 col-md-offset-2"  >
                         <div class="dropdown ">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="battle" data-toggle="dropdown">Battle Actions
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="battle">
                                <li role="presentation"><a role="menuitem" href="{{route('battle.see')}} ">See Battle</a></li>
                                <li role="presentation"><a role="menuitem" href="{{route('battle.start')}}">Start Battle</a></li>
                                <li role="presentation"><a role="menuitem" href="{{route('battle.showsetlimit')}}">Set Limit</a></li>
                                <li role="presentation"><a role="menuitem" href="{{route('battle.updateWeights')}}">Update Weights</a></li>
                                <li role="presentation"><a role="menuitem" href="{{route('battle.restart')}}">Restart Battle</a></li>
                                <li role="presentation"><a role="menuitem" href="{{route('battle.stop')}}">Stop Battle</a></li>
                              </ul>
                        </div>
                    </div>
            </div>
        </div>




@endsection
