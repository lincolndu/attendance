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

            <?php $alert_type = ''; $msg = ''; ?>
            @if (Session::has('success_msg'))
            <?php $alert_type = 'success';
            $msg = Session::get('success_msg');
            Session::forget('success_msg');
            ?>
            @elseif(Session::has('error_msg'))
            <?php $alert_type = 'error';
            $msg = Session::pull('error_msg');
            ?>
            @else
            <?php $alert_type = '';
            $msg = '';
            ?>
            @endif
      
      <div class="col-md-8 col-md-offset-2 text-center bg-success">
        <h1>{{ $msg }}</h1>
      </div>



      @if(Auth::user()->role != 'admin')

      <div class="col-md-4 col-md-offset-4" style="margin-top:100px;">
             <!-- small box -->
        <a href="{{ url('/logout') }}"onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                                                        class="view btn-sm active">

              <div class="small-box bg-grass text-center btn" style="height:200px;padding:50px;">
                  <div class="inner">
                    <h3 id="sub_present">Log out</h3>
                  </div>
                  <div class="icon"> <i class="fa fa-sign-out"></i> </div>
              </div>

          </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>

      </div>
      @endif


    </div>

@include('dashboard.bottom')



@section('script')
<script src="{{ asset('js/main.js') }}"></script>
@stop

@endsection