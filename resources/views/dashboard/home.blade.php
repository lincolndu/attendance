@extends('app')

@section('title')
:: Dashboard Area ::
@stop

@section('style')

<link rel="stylesheet" href="{{ asset('css/check.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<style>

    body, html {
        background-image: none !important;
    }
    button img{
      width: 210px;
      height: 210px;
    }
    .btn-xlarge{
      border-radius: 20px;
    }



</style>
@stop

@section('content')

@include('dashboard.head')


<div class="row">
      <div class="col-lg-3 col-xs-6"> 
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3 id="sub_reg">{{ $users->count() }}</h3>
            <p> Registered Employee </p>
          </div>
          <div class="icon"> <i class="fa fa-users"></i> </div>
          <a href="#" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a> </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6"> 
        <!-- small box -->
        <div class="small-box bg-wood">
          <div class="inner">
            <h3 id="sub_act">0</h3>
            <p> Active Employees </p>
          </div>
          <div class="icon"> <i class="fa fa-building-o"></i> </div>
          <a href="#" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a> </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6"> 
        <!-- small box -->
        <div class="small-box bg-grass">
          <div class="inner">
            <h3 id="sub_present">0</h3>
            <p> Present Today </p>
          </div>
          <div class="icon"> <i class="fa fa-user"></i> </div>
          <a href="#" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a> 
          </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6"> 
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h3 id="sub_act_device">0</h3>
            <p> Devices </p>
          </div>
          <div class="icon"> <i class="fa fa-desktop"></i> </div>
          <a href="#" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a> </div>
      </div>
      <!-- ./col -->

      @if(Auth::user()->role != 'admin')
       <div class="col-md-10 col-md-offset-1">
        {!! Form::open(['url' => 'check', 'class'=>'']) !!}
        
            @if( count($check) < 1 || $check->check_in != '' && $check->check_out != '' )
              <button  type="submit" class="btn btn-xlarge pull-left " name="check_in" value="1" />
                <h2>Check in</h2>
                <img src="{{ url('image/check_in.png')}}" alt="Check in">
              </button>

              <button type="submit"  class="btn btn-xlarge pull-right " name="check_out" value="2" />
                  <h2>Check out</h2>
                  <img src="{{ url('image/check_out.png')}}" alt="Check Out"> 
              </button>
            @elseif($check->check_out == '')
              <div class="col-md-offset-3">
                <button type="submit"  class="btn btn-xlarge" name="check_out" value="2" />
                    <h2>Check out</h2>
                    <img src="{{ url('image/check_out.png')}}" alt="Check out"> 
              </button>
              </div>
            @endif
          {!! Form::close() !!}
        </div>
        @endif



    </div>

@include('dashboard.bottom')

@section('script')
<script src="{{ asset('js/main.js') }}"></script>
@stop

@endsection