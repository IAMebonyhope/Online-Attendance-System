<!DOCTYPE HTML>
<html>
<head>
<title>Attendance System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('css/pagestyle.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> 
<!-- <link href="../css/stylet.css" rel="stylesheet">  -->
<!-- //font-awesome icons -->
 <!-- js-->
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/modernizr.custom.js')}}"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<script src="{{asset('js/wow.min.js')}}"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<link href="{{asset('css/custom.css')}}" rel="stylesheet">
<!--//Metis Menu -->
<style>
	.middle{
		text-align: center;
	}
</style>
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<li>
							<a href="#"><i class="fa fa-home nav_icon"></i>Complaint</a>
						</li>
						
						<li>
							<a href="#"><i class="fa fa-check-square-o nav_icon"></i>Registration<span class="fa arrow"></span></a>
						</li>

						<li>
							<a href="http://studentportal.unilag.edu.ng"><i class="fa fa-home nav_icon"></i>Back to School Website</a>
						</li>

						
					</ul>
					<div class="clearfix"> </div>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="index.html">
						<h3 style="padding-top: 3%">LECTURER</h3>
					</a>
				</div>
				<!--//logo-->
				<!--search-box-->
				<div class="search-box">
				</div><!--//end-search-box-->
				<div class="clearfix"> </div>
			</div>
			
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<!-- <span class="prfil-img"><img src="images/a.png" alt=""> </span>  -->
									<div class="clearfix"></div>	
								</div>	
							</a>
							
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1 middle">LECTURER REGISTRATION</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4 class="middle">DETAILS</h4>
						</div>
						<div class="form-body table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td>NAME</td>
										<td>{{$citsStaff->surname . " " . $citsStaff->firstName}}</td>
									</tr>
									<tr>
										<td>STAFF ID</td>
										<td>{{$citsStaff->staffId}}</td>
									</tr>
									<tr>
										<td>DEPARTMENT</td>
										<td>{{$citsStaff->dept}}</td>
									</tr>
									<tr>
										<td>FACULTY</td>
										<td>{{$citsStaff->faculty}}</td>
									</tr>
									<tr>
										<td>PHONE</td>
										<td>{{$citsStaff->phoneNo}}</td>
									</tr>
									<tr>
										<td>EMAIL</td>
										<td>{{$citsStaff->email}}</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="form-title">
							<h4 class="middle">COURSES</h4>
						</div>
						<div class="form-body table-responsive">
							<table class="table">
								<form>
									<thead>
										<th></th>
										<th>COURSE CODE</th>
										<th>COURSE NAME</th>
									</thead>
									<tbody>
										@foreach($courses as $course)
										<tr>
											<td><input type="checkbox" name="newCourses[]" value="{{$course->id}}" required></td>
											<td>{{$course->courseCode}}</td>
											<td>{{$course->courseName}}</td>
										</tr>
										@endforeach
									</tbody>
								</form>
							</table>
							
							<button class="btn form-control">SUBMIT</button>
						</div>
					</div>
					
					
		</div>

	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>