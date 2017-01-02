
@extends('app')

@section('title')
:: User login ::
@stop


@section('style')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@stop

@section('content')

        <h1 class="text-center">Attendance System</h1>

            <!--
            you can substitue the span of reauth email for a input with the email and
            include the remember me checkbox
            -->
            <div class="container">
                <div class="card card-container">
                    <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    <p id="profile-name" class="profile-name-card"></p>
                    {!! Form::open(['url' => 'login', 'class'=>'form-signin']) !!}
                        <span id="reauth-email" class="reauth-email"></span>
                        {!! Form::text('email',null, ['id' => 'inputEmail', 'class' =>'form-control','placeholder'=>'Email address', 'required' => 'true']) !!}
                        {!! Form::password('password', ['id' => 'inputPassword', 'class' =>'form-control','placeholder'=>'Password', 'required' => 'true']) !!}
                        <div id="remember" class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                    {!! Form::close() !!}
                    <!-- /form -->
                    <a href="{{ url('/password/reset') }}" class="forgot-password">
                        Forgot the password?
                    </a>
                    <a href="{{ url('register') }}" class="pull-right">
                        Register?
                    </a>
                </div><!-- /card-container -->
            </div><!-- /container -->
    

@section('script')
<script src="{{ asset('js/login.js') }}"></script>
@stop

@endsection