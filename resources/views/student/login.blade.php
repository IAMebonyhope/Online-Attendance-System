
<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance System</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<meta name="keywords" content="effective register form Widget a Flat Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<link rel="stylesheet" href="{{asset('css/styleform.css')}}" type="text/css" media="all" /><!-- Style-CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Expletus+Sans" rel="stylesheet">
</head>
<body>

<div class=" col-lg-12">
	<h1 class="whi">STUDENT</h1>

<section class="agile-main col-lg-3"><p></p></section>
<section class="agile-main col-lg-6">
	<!-- <header><h1>effective <label>register</label> form</h1></header> -->
	<div class="agile-top">
		<h2 >Student Login</h2><br><br>
		@if(Session::has('registrationError'))
					<div class="alert alert-warning">
						 {{ session('registrationError')}}
					</div>
		@elseif(Session::has('incorrectDetails'))
					<div class="alert alert-warning">
						 {{ session('incorrectDetails')}}
					</div>
		@endif
		<form action="{{ route('student-login') }}" method="post">
			{{ csrf_field() }}
			<div class="agile-username{{ $errors->has('matricNo') ? ' has-error' : '' }}">
				<p>Matric Number</p>
				<span><i class="fa fa-users" aria-hidden="true"></i></span>
				<input type="text" name="matricNo" placeholder="enter your Matric No" value="{{ old('matricNo') }}" required autofocus>
				<div class="clear"></div>
				@if ($errors->has('matricNo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('matricNo') }}</strong>
                    </span>
            	@endif
			</div><br>

			<div class="agile-password{{ $errors->has('password') ? ' has-error' : '' }}">
				<p>password</p>
				<span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
				<input type="password" name="password" placeholder="enter your password" value="" required="">
				<div class="clear"></div>
				@if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            	@endif
			</div><br>
			<br>
			<button type="back" class="btn form-control" style="background-color: #000022; color: white">LOGIN</button>
		</form>
		
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	</section>
	<section class="agile-main col-lg-3"><p></p></section>
</div>
</body>
</html>