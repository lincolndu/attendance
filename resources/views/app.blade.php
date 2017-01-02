<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		
		<!-- toastr -->
    	<link href="{{ asset('/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
		<!-- custom css -->
		@yield('style')


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Scripts -->
		    <script>
		        window.Laravel = <?php echo json_encode([
		            'csrfToken' => csrf_token(),
		        ]); ?>
		    </script>
	
	</head>
	<body>

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

			<div class="row main">
				@yield('content')
			</div>				
	
			<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

		<!-- Custom js -->
		@yield('script')

		<!-- Bootstrap toastr -->
		<script src="{{ asset('/js/toastr.min.js') }}" type="text/javascript"></script>

		<script>
		    $(function () {
		        var alert_type = '<?php echo $alert_type; ?>';
		        var msg = '<?php echo $msg; ?>';
		        if((alert_type != '') && (msg != '')){
		            Command: toastr[alert_type](msg);
		            alert_type = '';
		            msg = '';
		        }
		    });

		</script>
 		
	</body>
</html>