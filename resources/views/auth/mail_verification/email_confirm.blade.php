@extends('frontend.base.base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Εγγραφή επιβεβαιώθηκε
				</div>
				<div class="panel-body">
					 Το e-mail σας επιβεβαιώθηκε επιτυχώς.Πατήστε τον σύνδεσμο για να συνδεθείτε στον λογαριασμό σας

					<a href="{{url('system/login')}}">Σύνδεση</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection