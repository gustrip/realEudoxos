@extends('frontend.base.base')


@section('content')

<div class="container">
  <h2>Η Μάχη των Πανεπιστημίων</h2>

	@if($winner)
	<div class="container"><h3 class="text-center">{{$winner->name}} κέρδισε την μάχη!!!!</h3></div>
	<div class="container">
		<p class="center text-center" style="font-size:15px;font-family: 'Roboto',sans-serif;">
			Τώρα οι φοιτητές του/της {{$winner->name}} μπορούν να κάνουν αγορές με την αναλογία "1 προς 1" 
		</p>
	</div>
  	
	@else
		@if(!$uni)
			<div class="container">
				<h3 class="text-center">Η Μάχη δεν ξεκίνησε ακόμα!!!!</h3>
			</div>
			<div class="container">
				<p class="center text-center" style="font-size:15px;font-family: 'Roboto',sans-serif;">
			Μπορεί όμως τις επόμενες μέρες να ξεκινήσει γιαυτό μην σταματάς να τσεκάρεις 
				</p>" 
			</p>
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

	@endif

</div>

@endsection