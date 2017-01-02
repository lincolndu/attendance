@extends('app')

@section('title')
:: Dashboard Area ::
@stop

@section('style')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<style>
    body, html {
    background-image: none !important;
}
</style>
@stop

@section('content')

@include('dashboard.head')


      <div class="row main">
        
        <div class="col-md-6 col-md-offset-3 main-login main-center">
        {!! Form::model($user,['method' =>'PUT', 'url' => ["users",$user->id], 'class' =>'form-horizontal' ]) !!}
           
            <div class="form-group">
            {!! Form::label('name','User name',['class'=>' cols-sm-2 control-label']) !!}
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
                {!! Form::label('email','User Email',['class'=>'cols-sm-2 control-label']) !!}
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
                        
                        {!! Form::password('password', ['id' => 'password', 'class' =>'form-control ', 'maxlength' => '50','placeholder'=>'Enter your Password']) !!}
                    </div>
                </div>
                <div class="cols-sm-10">
                    <p class="text-danger">{{$errors->first('password')}}</p>
                </div>
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Update</button>
            </div>
           
            
          {!! Form::close() !!}
        </div>
      </div>

@include('dashboard.bottom')



@section('script')
<script src="{{ asset('js/main.js') }}"></script>
@stop

@endsection