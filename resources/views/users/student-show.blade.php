@extends('layouts.app')

@section('content')



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="{{route('users.index')}} ">Previous</a></li>
        </ul>
    </div>
   


	<table class="table table-condensed table-striped">
                <tr>
                    <th>Student User#{{$user->id}} </th>
                    <th></th>

                </tr>
                <tr>
                    <td>
                        <li>Name: {{$user->name}}</li>
                        <li>Last Name: {{$user->lastName}}</li>
                        <li>Email: {{$user->email}} </li>
                        <li>Points: {{$user->points}}</li>
                        <li><a class="btn-info" href="{{route('users.user.studentshowhistory',['id'=>$user->id])}} ">See History</a > </li>
                        
                    </td>
                </tr>
        </table>

    


@endsection