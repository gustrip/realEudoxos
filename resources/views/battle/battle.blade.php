@extends('layouts.app')

@section('content')

<div >
	<ul class="pager">
  		<li><a href="{{route('admin.dashboard')}} ">Previous</a></li>
	</ul>
</div>

<div class="container">
  <h2>Universities Battle</h2>

	@if($winner)
	<div class="container"><h3 class="center">{{$winner->name}} has won the Battle!!!!</h3></div>
  	
	@else
		@foreach($uni as $u)
		<span class="label label-default">{{$u->name}}</span>
			<div class="progress">
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{round(100*($u->total_points*$u->weight)/$limit->limit,2)}} "
			aria-valuemin="0" aria-valuemax="100" style="width:{{round(100*($u->total_points*$u->weight)/$limit->limit,2)}}%">
			{{round(100*($u->total_points*$u->weight)/$limit->limit,2)}}%
			</div>
		</div>
	@endforeach

	@endif

</div>


<div >
	<ul class="pager">
  		<li><a href="{{route('admin.dashboard')}} ">Previous</a></li>
	</ul>
</div>
@endsection