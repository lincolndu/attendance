@extends('app')

@section('title')
:: Check Area ::
@stop

@section('style')
<link rel="stylesheet" href="{{ asset('css/check.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
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
              <div class="col-md-10 col-md-offset-1">
              {!! Form::open(['url' => 'check', 'class'=>'']) !!}
              
              @if( count($check) < 1 || $check->check_in != '' && $check->check_out != '' )
              	<button  type="submit" class="btn btn-xlarge " name="check_in" value="1" />
                  <h2>Check in</h2>
                  <img src="{{ url('image/check_in.png')}}" alt="Check in">
                </button>

              	<button type="submit"  class="btn btn-xlarge " name="check_out" value="2" />
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
    </div>


@include('dashboard.bottom')

@endsection