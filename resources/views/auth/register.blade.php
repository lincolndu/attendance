@extends('app')

@section('title')
:: User Registration ::
@stop


@section('style')
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

@stop

@section('content')


                <div class="panel-heading">
                   <div class="panel-title text-center">
                        <h1 class="title"> Attendance System </h1>
                    </div>
                </div> 
                <div class="main-login main-center">
                    {!! Form::open(['url' => 'register', 'class'=>'form-horizontal']) !!}
                        
                        <div class="form-group">
                        {!! Form::label('name','Your name',['class'=>' cols-sm-2 control-label']) !!}
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    {!! Form::text('name',null, ['id' => 'name', 'class' =>'form-control', 'placeholder'=>'Enter your Name' , 'required' => 'true']) !!}
                                </div>
                            </div>
                            <div class="cols-sm-10">
                                <p class="text-danger">{{$errors->first('name')}}</p>
                            </div>
                        </div>


                        <div class="form-group">
                            {!! Form::label('email','Your Email',['class'=>'cols-sm-2 control-label']) !!}
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    {!! Form::text('email',null, ['id' => 'email', 'class' =>'form-control','placeholder'=>'Enter your Email', 'required' => 'true']) !!}
                                </div>
                            </div>
                            <div class="cols-sm-10">
                                <p class="text-danger">{{$errors->first('email')}}</p>
                            </div>

                        </div>          

                        <div class="form-group">
                            {!! Form::label('password','Password',['class'=>'cols-sm-2 control-label']) !!}
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    
                                    {!! Form::password('password', ['id' => 'password', 'class' =>'form-control ', 'maxlength' => '50','placeholder'=>'Enter your Password' ,'required' => 'true']) !!}
                                </div>
                            </div>
                            <div class="cols-sm-10">
                                <p class="text-danger">{{$errors->first('password')}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                        {!! Form::label('confirm','Confirm Password',['class'=>'cols-sm-2 control-label']) !!}
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    {!! Form::password('password_confirmation', ['id' => 'confirm_password', 'class' =>'form-control ', 'maxlength' => '50','placeholder'=>'Confirm your Password' ,'required' => 'true']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                        </div>
                        <div class="login-register">
                            <a href="{{ url('/login') }}">Login</a>
                         </div>
                    {!! Form::close() !!}

                </div>

@section('script')
<script src="{{ asset('js/login.js') }}"></script>
@stop

@endsection
