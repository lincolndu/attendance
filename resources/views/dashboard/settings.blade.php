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


<div class="row">


      <div class="col-md-12 bg-primary btn" style="margin-bottom:40px;"> 
        <h1>Log in as your user</h1>
      </div>
      <!-- ./col --> 

      @foreach($users as $user)
	      <a href="{{ url('user_login/' . $user->id ) }}">
		      <div class="col-md-3 btn ">
		      
		      <button class="btn btn-success">
		      	<h1> {{ $user->name }} </h1>
		      </button>
		      	
		      </div>
	      </a>
      @endforeach




    </div>

@include('dashboard.bottom')



@section('script')
<script src="{{ asset('js/main.js') }}"></script>
@stop

@endsection