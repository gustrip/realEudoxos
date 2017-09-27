@extends('frontend.base.base')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default kos">
                <div class="panel-heading kos"><span style="font-family: sans-serif">Είσοδος Μέλους</span></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user_login_post') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Κωδικός Πρόσβασης:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_type" style="font-family: 'Roboto', sans-serif;" class="col-md-4 control-label">Τύπος Χρήστη:</label>

                            <div class="col-md-6">
                                <input type="radio" name="user_type" class="change_user" id="user_type" value="user" checked>  <span style="font-family: sans-serif;"> Απλός Χρήστης</span>
                                <input type="radio" name="user_type" class="change_user" id="user_type" value="student">  <span style="font-family: sans-serif;"> Φοιτητής</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="font-family: sans-serif;">
                                    Είσοδος
                                </button>

                                <a class="btn btn-link" id="reset_btn" href="{{ route('password.request') }}" style="font-family: sans-serif;">
                                    Ξεχάσατε τον κωδικό σας ?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>

       $('.change_user').on('change', function(){

           var user_type = $(this).val();

           var form = $('.form-horizontal');
           var a = $('#reset_btn');

           if (user_type == 'user'){
               form.attr('action', '{{route('user_login_post')}}');
               a.attr('href', "{{route('password.request')}}");
           } else {
               form.attr('action', '{{route('student.login.submit')}}');
               a.attr('href', "{{route('student.password.request')}}");
           }
       });

    </script>
@endsection
