<!DOCTYPE HTML>
<html>
<head>
<title>Online Attendance Portal</title>
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
							<a href="{{ route('dashboard') }}"><i class="fa fa-check-square-o nav_icon "></i>All courses<span class="fa arrow"></span></a>
                        </li>
                        
                        <li>
                            <a href="{{ route('create-new-course') }}"><i class="fa fa-home nav_icon"></i>Add new course</a>
                        </li>

                        <li>
                            <a href="{{ route('view-courses') }}"><i class="fa fa-home nav_icon"></i>View attendances</a>
                        </li>

                        <li>
                            <a href="{{ route('courses-for-new') }}"><i class="fa fa-home nav_icon"></i>Add new attendance</a>
                        </li>

						<li>
							<a href="{{ route('staff-logout') }}"><i class="fa fa-home nav_icon"></i>Logout</a>
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
                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-title">
								<h3 class="middle">{{$course->courseName}}</h3><br>
								<h4 class="middle">{{$course->courseCode}}</h4>
                            </div>
                                <div class="form-body table-responsive middle">
                                    <table class="table">
										@if(count($attendances) == 0)
											<tr>
                                                no attendandance has been taken for this course.
                                            </tr>
										@else
                                        <thead >
                                            <th class="middle">DATE</th>
                                            <th class="middle">LECTURER NAME</th>
                                            <th class="middle">NO OF STUDENTS PRESENT</th>
        
										</thead>
                                        <tbody>
											@foreach($attendances as $attendance)
                                            <tr>
                                                <td><a href="{{url('lecturer/dashboard/courses/' . $course->id. '/attendance/' . $attendance->id)}}">{{$attendance->created_at}}</a></td>
                                                <td>{{$attendance->lect}}</td>
                                                <td>{{$attendance->students}}</td>
											</tr>   
											@endforeach
										</tbody>	</div>
										
										@endif
                        </table>
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