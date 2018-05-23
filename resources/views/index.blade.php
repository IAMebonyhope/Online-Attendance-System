    
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Atendance Management System</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Education portal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="{{asset('css/carousel.css')}}" type="text/css" rel="stylesheet" media="all"> 
<link href="{{asset('css/stylet.css')}}" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="{{asset('css/vegas.min.css')}}">

<!-- gallery -->
<link href="css/lsb.css" rel="stylesheet" type="text/css">
<!-- //gallery -->
<!-- /fonts -->
<link href="//fonts.googleapis.com/css?family=Montserrat+Alternates:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic" rel="stylesheet">
<!-- //fonts -->




<!-- //css files -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

<!-- //js -->
</head>
<body>
<!--header-banner-section-starts-here -->
<section class="banner-header" id="home">
		<!--header-->
		<div class="header">
			<nav class="navbar navbar-default">
				<div class="container">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2">
						@if(Session::has('registrationSuccessful'))
					<div class="alert alert-success">
						<strong>Success!</strong> {{ session('registrationSuccessful')}}
					</div>
			@endif
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{ route('home')}}">Home</a></li>
							<li><a href="#about" class="scroll">About</a></li>
							<li><a href="#services" class="scroll">Services</a></li>
							<li><a href="#gallery" class="scroll">gallery</a></li>
							<li><a href="#professor" class="scroll">professors</a></li>
							<li><a href="#contact" class="scroll">Contact</a></li>
						</ul>
					</nav>
				</div>
				</div>
			</nav>
			
	</div>
	
</section>	

<div id="about" class="about slider-banner space" style="padding-top: 20%; padding-bottom: 5%">
	
	<div class="container">
			
		<!-- <h3 class="w3-about-title">SIGN UP / SIGN IN</h3> -->
			<div class="col-lg-6"><a href="{{ route('get-student-login')}}">
				<div class="con-left text-center">
					<div class="spa-ico"><span><i class="fa fa-user" aria-hidden="true"></i></span></div>
						<h5>STUDENT</h5>
						<p>LOGIN</p>
				</div></a>
			</div>
			<div class="col-lg-6"><a href="{{ route('get-staff-login')}}">
				<div class="con-left text-center">
					<div class="spa-ico"><span><i class="fa fa-user" aria-hidden="true"></i></span></div>
					<h5>LECTURER</h5>
					<p>LOGIN</p>
				</div></a>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
</div>

	
		
		
<div class="footer">
	<div class="container">
		<div class="footer-grids-all">
		<div class="footer-w3-grid-top">
			<div class="w3layouts_footer_grid" style="text-align: center">
				<h3>CONTACT US </h3>
					<ul>
						<li><i class="glyphicon glyphicon-send"></i> AKOKA YABA<span> UNIVERSITY OF LAGOS. </span></li>
						<li><i class="glyphicon glyphicon-phone"></i> +23456737538<span>  +23456737538 </span></li>
						<li><i class="glyphicon glyphicon-envelope"></i> <a href="mailto:example@mail.com"> unilag@example.com</a></li>
					</ul>

			</div>
		</div>
			<!-- <div class="col-md-8 w3layouts_footer_grid">
				<div class="col-md-6 w3-footer-icons">
				<h3>CATCH ON</h3>
				<p><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span><a href="mailto:example@mail.com"> mail@example.com</a></p>
				</div>
				<div class="col-md-6 w3-footer-icons">
				<h3>MAKE CALL</h3>
				<i class="fa fa-phone" aria-hidden="true"></i><span>+00 1111 222 </span>
				</div>
			</div> -->
			<div class="clearfix"> </div>
		</div>

	</div>
</div>

	<div class="sc">
			<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/vegas.min.js')}}"></script>
		
		
		
		
			<script>
				$(".slider-banner").vegas({
					slides:[
					{src: "{{asset('images/ban11.jpg')}}"},
					 {src: "{{asset('images/ban22.jpg')}}"},
					  {src: "{{asset('images/ban44.jpg')}}"},
					  {src: "{{asset('images/ban33.jpg')}}"},
					],
				});
		
			$(document).ready(function() {
				$('.mdb-select').material_select();
			});
		
				$('#modal-contact').on('shown.bs.modal', function () {
				  $('#myInput').focus()
				})
		
			   
				$('a[data-toggle="list"]').on('shown.bs.tab', function (e) {
				e.target
				e.relatedTarget 
				})
		
			</script>
		
			<script>
				new WOW().init();
		
			</script>
			</div>
			
		</body>
		</html>