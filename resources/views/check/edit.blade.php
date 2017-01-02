@extends('app')

@section('title')
:: Dashboard Area ::
@stop

@section('style')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css" />
  

  
  <!-- include your less or built css files  -->
  <!-- 
  bootstrap-datetimepicker-build.less will pull in "../bootstrap/variables.less" and "bootstrap-datetimepicker.less";
  or
  <link rel="stylesheet" href="/Content/bootstrap-datetimepicker.css" />
  -->


<style>
    body, html {
    background-image: none !important;
}
</style>



@stop

@section('content')

@include('dashboard.head')

                    


    <div class="row">
        <div class='col-sm-6 col-sm-offset-3'>
        {!! Form::model($check,['method' =>'PUT', 'url' => ["check",$check->id] ]) !!}
            <div class="form-group">
            <h2> {{ $check->user->name }} on {{$check->check_in}}</h2>
            <h3>Check in time</h3>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="check_in" class="form-control" value="{{ $check->check_in }}" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
            <h3>Check out time</h3>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="check_out" class="form-control" value="{{ $check->check_out }}" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group" style="margin-top:50px;">
               <button type="submit" class="btn btn-primary form-control" >Submit</button>
            </div>
         {!! Form::close() !!}
        </div>
        
    </div>
</div>

@include('dashboard.bottom')


@section('script')
<!-- ... -->
  <script type="text/javascript" src="/js/moment-with-locales.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>

   <script src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                  format: 'YYYY-MM-DD HH:mm:ss'
                });
                $('#datetimepicker2').datetimepicker({
                  format: 'YYYY-MM-DD HH:mm:ss'
                });
            });
        </script>
@stop

@endsection