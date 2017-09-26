@extends('layouts.app')

@section('content')



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="{{route('admin.dashboard')}} ">Previous</a></li>
        </ul>
    </div>
    
    @foreach($users as $type_of_user)
	<table class="table table-condensed table-striped">
        
        @if($loop->first)
            <h2>Simple Users</h2>
            <div class="container-fluid">
                <a  class="btn btn-warning btn-sm" href="{{route('users.create')}} ">Add New Simple User</a>
            </div>
            @foreach($type_of_user as $user)
        
        
        <tr>
            <th>User#{{$user->id}} </th>
            <th></th>

        </tr>
        <tr>
            <td>
                <li>Name:{{$user->name}}</li>
                <li>Last Name:{{$user->lastName}}</li>
                <li>Email: {{$user->email}} </li>
                <td>
                <div class="container-fluid">
                    <ul class="list-inline">
                        <li>
                            <form action="{{route('users.edit',['id'=>$user->id])}}" name="edit_user" method="GET">
                            {{ csrf_field() }}
                                <input type="hidden" name="user" value="{{$user->id}}" />
                                <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                            </form>
                        </li>
                        <li>
                            <form action="{{route('users.destroy',['id'=>$user->id])}}" name="delete_user" method="POST">
                            {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="user" value="{{$user->id}}" />
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </li> 
                        <li>
                            <form action="{{route('users.show',['id'=>$user->id])}}" name="show_user" method="GET">
                                {{ csrf_field() }}
                                <input type="hidden" name="user" value="{{$user->id}}" />
                                <input type="submit" class="btn btn-primary btn-sm" value="Show More Details">
                            </form>
                        </li>
                    </ul>
                </div>
                </td>
                
        @endforeach
            </td>
        </tr>
        </table>
        @else
        
            <h2>Student Users</h2>
            <div class="container-fluid">
                <a  class="btn btn-warning btn-sm" href="{{route('users.studentCreate')}} ">Add New Student </a>
            </div>
            @foreach($type_of_user as $user)
        
        
        <tr>
            <th>User#{{$user->id}} </th>
            <th></th>

        </tr>
        <tr>
            <td>
                <li>Name:{{$user->name}}</li>
                <li>Last Name:{{$user->lastName}}</li>
                <li>Email: {{$user->email}} </li>
                <td>
                <div class="container-fluid">
                    <ul class="list-inline">
                        <li>
                            <form action="{{route('users.studentEdit',['id'=>$user->id])}}" name="edit_student" method="GET">
                            {{ csrf_field() }}
                                <input type="hidden" name="user" value="{{$user->id}}" />
                                <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                            </form>
                        </li>
                        <li>
                            <form action="{{route('users.studentDestroy',['id'=>$user->id])}}" name="delete_student" method="POST">
                            {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="user" value="{{$user->id}}" />
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </li>
                        <li>
                            <form action="{{route('users.studentShow',['id'=>$user->id])}}" name="show_student" method="GET">
                            {{ csrf_field() }}
                                <input type="hidden" name="user" value="{{$user->id}}" />
                                <input type="submit" class="btn btn-primary btn-sm" value="Show More Details">
                            </form>
                        </li>
                    </ul>
                </div>
                </td>
                
        @endforeach
            </td>
        </tr>
        </table>
        @endif
        
    @endforeach 

    
</div>
<div >
	<ul class="pager">
  		<li><a href="{{route('admin.dashboard')}} ">Previous</a></li>
	</ul>
</div>

@endsection