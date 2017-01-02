@extends('app')

@section('title')
:: Check Area ::
@stop

@section('style')
<link rel="stylesheet" href="{{ asset('css/check.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<style>
    body, html {
    background-image: none !important;
}

button img{
  width: 110px;
  height: 110px;
}




</style>
@stop

@section('content')

<div class="container">
	<a href="{{ url('/') }}">
		<button class="btn btn-default btn-sm">
	      <span class="glyphicon glyphicon-fast-backward"></span> Go Dashboard
	    </button>
	</a>
	

		<div class="row">
              <div class="col-md-4 col-md-offset-4">
              {!! Form::open(['url' => 'check', 'class'=>'']) !!}
              
              @if( count($check) < 1 || $check->check_in != '' && $check->check_out != '' )
              	<button  type="submit" class="btn btn-xlarge " name="check_in" value="1" />
                  <img src="{{ url('image/check_in.png')}}" alt="Check in">
                </button>

              	<button type="submit"  class="btn btn-xlarge " name="check_out" value="2" />
                    <img src="{{ url('image/check_out.png')}}" alt="Check Out"> 
                </button>
			        @elseif($check->check_out == '')
                <button type="submit"  class="btn btn-xlarge " name="check_out" value="2" />
                      <img src="{{ url('image/check_out.png')}}" alt="Check out"> 
                </button>
              @endif

              {!! Form::close() !!}

              </div>
    </div>
</div>



@section('script')
<script>
	$("button").click(function() {
    var fired_button = $(this).val();
    // alert(fired_button);
});
</script>
@stop



@endsection