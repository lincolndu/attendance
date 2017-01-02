@extends('app')

@section('title')
:: All user area::
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
</style>
@stop

@section('content')

@include('dashboard.head')

                 <h3>  All User </h3>
               <!-- START DATATABLE 1-->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="datatable1" class="table table-striped table-hover">
                                 <thead>
                                    <tr>
                                       <th>User Name</th>
                                       <th> Email </th>
                                       <th>Role</th>
                                       <th class="sort-numeric">Register Time</th>
                                      <th class="sort-alpha">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                                 @if(count($users)>0)
                                   @foreach($users as $user)
                                      <tr class="gradeX">
                                         <td>{{ $user->name }}</td>
                                         <td>{{ $user->email }}</td>
                                         <td>{{ $user->role }}</td>
                                         <td>
                                            {{ $user->created_at->diffForHumans()  }}
                                         </td>
                                         <td>
                                           @if( $user->role != 'admin' )
                                           	 <a href="{{ url('/users/'.$user->id.'/edit') }}">
    	                                           <button type="button" class="btn btn-sm btn-default">
    	                                           <em class="fa fa-pencil"></em>
    	                                        </button>
    	                                        </a>
                                            @endif
                                         </td>  
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
@stop

@endsection