@extends('app')

@section('title')
:: Statistics Area of {{ Auth::user()->name }}::
@stop

@section('style')
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
   <!-- DATATABLES-->
   <link rel="stylesheet" href="{{ asset('css/dataTables.colVis.css') }}">
   <link rel="stylesheet" href="{{ asset('css/media/app.css') }}">
   <link rel="stylesheet" href="{{ asset('css/media/css/dataTables.bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('css/index.css') }}">


   <link rel="stylesheet" href="{{ asset('css/main.css') }}">

<style>
    body, html {
    background-image: none !important;
}
.sales {
    background: none;
    border: none;
    display: inline-block;
    padding: 0;
    width: auto;
}
.sales h2{
  padding-right: 10px;
}
.user::before, .month::before{
  display: none;
}
</style>
@stop

@section('content')

@include('dashboard.head')


      <?php 

              function HourMin($time, $format = '%02d:%02d') {
                  if ($time < 1) {
                      return;
                  }
                  $hours = floor($time / 60);
                  $minutes = ($time % 60);
                  return sprintf($format, $hours, $minutes);
              }

              Carbon\Carbon::setToStringFormat('F, Y'); 

              function monthYear($data){
                return new Carbon\Carbon($data);
              }

              $months=[];
              foreach($checks as $check){
                 $months[] = substr($check->check_in, 0, 7);
              }

      ?>
                 
                    <div class="sales">
                      <h2> 
                         @if( Auth::user()->role != 'admin')
                          {{ Auth::user()->name }} 
                         @else
                      </h2>

                       <div class="btn-group pull-left">
                            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="user"> All User </span>
                            </button>
                            <div class="dropdown-menu">
                                @if(count($users)>0)
                                @foreach( $users as $user)
                                    <a href="#"><button style="border:0;" class="user" value="{{ $user->name}}">
                                      {{ $user->name }}
                                    </button></a>
                                @endforeach
                                @endif
                            </div>
                        </div>
                           
                         @endif
                         
                          <div class="btn-group pull-right">
                              <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>Period:</span> <span id="month">Last Year</span>
                              </button>
                              <div class="dropdown-menu">
                                  @foreach( array_unique($months) as $month)
                                      <a href="#"><button style="border:0;" class="month" value="{{ monthYear($month) }}">
                                        {{ monthYear($month) }}
                                      </button></a>
                                  @endforeach
                              </div>
                          </div>
                      </div>
               
               <!-- START DATATABLE 1-->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="datatable1" class="table table-striped table-hover">
                                 <thead>
                                    <tr>
                                       <th>Month, Year </th>
                                       @if( Auth::user()->role == 'admin')
                                         <th>Employee Name</th>
                                       @endif
                                       <th> Check In </th>
                                       <th>Check Out</th>
                                       <th class="sort-numeric">Checked Time</th>
                                       @if( Auth::user()->role == 'admin')
                                         <th class="sort-alpha">Action</th>
                                       @endif
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @if(count($checks)>0)
                                   @foreach($checks as $check)
                                      <tr @if( $check->check_time < 420 && $check->check_time != '' ) class="gradeX alert-danger" @endif class="gradeX">

                                         <td>{{ monthYear($check->check_in) }}</td>
                                         @if( Auth::user()->role == 'admin')
                                            <td>{{ $check->user->name }}</td>
                                         @endif
                                         <td>{{ $check->check_in }}</td>
                                         <td>{{ $check->check_out }}</td>

                                         <td>
                                            {{ HourMin($check->check_time, '%02d hours %02d minutes') }}
                                         </td>

                                         @if( Auth::user()->role == 'admin')                                       
                                         <td>
                                         	 <a href="{{ url('/check/'.$check->id.'/edit') }}">
  	                                           <button type="button" class="btn btn-sm btn-default">
  	                                           <em class="fa fa-pencil"></em>
  	                                        </button>
  	                                        </a>
                                         </td>
                                         @endif
                                      </tr>
                                   @endforeach
                                 @endif

                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END DATATABLE 1-->
@include('dashboard.bottom')

@section('script')
	<script src="{{ asset('js/main.js') }}"></script>
 	<!-- DATATABLES-->
   <script src="{{ asset('js/media/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('js/dataTables.colVis.js') }}"></script>
   <script src="{{ asset('js/media/dataTables.bootstrap.js') }}"></script>
   <script src="{{ asset('js/button/dataTables.buttons.js') }}"></script>
   <script src="{{ asset('js/button/buttons.bootstrap.js') }}"></script>
   <script src="{{ asset('js/button/buttons.colVis.js') }}"></script>
   <script src="{{ asset('js/button/buttons.flash.js') }}"></script>
   <script src="{{ asset('js/button/buttons.html5.js') }}"></script>
   <script src="{{ asset('js/button/buttons.print.js') }}"></script>
   <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
   <script src="{{ asset('js/responsive.bootstrap.js') }}"></script>
   <script src="{{ asset('js/demo-datatable.js') }}"></script>

<script>

  $(".month").click(function() {
      var fired_button = $(this).val();
      $(".input-sm").val(fired_button).keyup();
      $("#month").html(fired_button);
  });

  $(".user").click(function() {
      var fired_button = $(this).val();
      $(".input-sm").val( fired_button ).keyup();
      $("#user").html(fired_button);
  });

</script>

@stop

@endsection