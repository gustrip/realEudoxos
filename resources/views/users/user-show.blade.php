@extends('layouts.app')

@section('content')



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="{{ route('users.index')}} ">Previous</a></li>
        </ul>
    </div>
   


	<table class="table table-condensed table-striped">
            @if(!$user->isStudent())
                <tr>
                    <th>Simple User#{{$user->id}} </th>
                    <th></th>

                </tr>
                <tr>
                    <td>
                        <li>Name: {{$user->name}}</li>
                        <li>Last Name: {{$user->lastName}}</li>
                        <li>Email: {{$user->email}} </li>
                        <li><a  href="{{route('users.user.showhistory',['id'=>$user->id])}} ">See History</a> </li>
                        
                    </td>
                </tr>

        </table>

    


@endsection