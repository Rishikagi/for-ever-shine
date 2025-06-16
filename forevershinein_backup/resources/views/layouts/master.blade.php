<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>@yield('title') | Admin </title>
		<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
		<link rel="icon" href="{{ asset('admin-assets/images/favicon.ico')}}" type="image/x-icon">
		<link href="{{ asset('admin-assets/css/app.min.css') }}" rel="stylesheet">
		<link href="{{ asset('admin-assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{ asset('admin-assets/css/fSelect.css')}}" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css">
		
		@stack('custom_css')
	
	</head>

	<body class="light">
		 <!-- Page Loader -->
		 <div class="page-loader-wrapper">
			<div class="loader">
				<div class="m-t-30">
					<img class="loading-img-spin" src="{{ asset('admin-assets/images/logo.png')}}" alt="admin">
				</div>
				<p>Please wait...</p>
			</div>
		</div>
		
		<div id="preloader" style="display: none;">
			 <div class="loader_spinner_inside"></div>
			 <span class="loader_spinner_text">Please Wait...</span>
		 </div>
	  
		<!-- #END# Page Loader -->
		<div class="overlay"></div>
		<nav class="navbar">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="#" onClick="return false;" class="navbar-toggle collapsed" data-bs-toggle="collapse"
						data-target="#navbar-collapse" aria-expanded="false"></a>
					<a href="#" onClick="return false;" class="bars"></a>
					<a class="navbar-brand" href="index.php">
						<img src="{{ asset('admin-assets/images/logo.png')}}" alt="" />
						<span class="logo-name">Ecomm.</span>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="pull-left">
						<li>
							<a href="#" onClick="return false;" class="sidemenu-collapse">
								<i data-feather="menu"></i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<!-- Full Screen Button -->
						<li class="fullscreen">
							<a href="javascript:;" class="fullscreen-btn">
								<i class="fas fa-expand"></i>
							</a>
						</li>
						<!-- #END# Full Screen Button -->
						<!-- #START# Notifications-->
						<li class="dropdown">
							<a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
								role="button">
								<i class="far fa-bell"></i>
								<span class="notify"></span>
								<span class="heartbeat"></span>
							</a>
							<ul class="dropdown-menu pullDown">
								<li class="header">NOTIFICATIONS</li>
								<li class="body">
									<ul class="menu">
										@php  $notification = \App\Models\Notification::orderBy('id','Desc')->where('user_id',\Auth::user()->id)->limit(5)->get(); @endphp
										@if(!empty($notification) && count($notification)>0)
											@foreach($notification as $val)
												<li>
													<a href="#" onClick="return false;">
														
														<span class="menu-info">
															<span class="menu-title">{{$val->title}}</span>
															<span class="menu-desc">
															<i class="far fa-clock"></i> {{ Carbon\Carbon::parse($val->created_at)->diffForHumans()}}
															</span>
															<span class="menu-desc">{!! $val->message !!}</span>
														</span>
													</a>
												</li>
											@endforeach
										@else
											<li>
												<p> Notification not available!
											</li>
										@endif
									</ul>
								</li>
								<li class="footer">
									<a href="{{url('admin/notification/list')}}" >View All Notifications</a>
								</li>
							</ul>
						</li>
						<!-- #END# Notifications-->
						<li class="dropdown user_profile" style="margin-right: 30px;">
							<div class="dropdown-toggle" data-bs-toggle="dropdown">
								<img src="{{ asset('admin-assets/images/user1.jpg') }}" alt="">
							</div>
							<ul class="dropdown-menu pullDown">
								<li class="body">
									<ul class="user_dw_menu">
										<!--
										<li>
											<a href="#" onClick="return false;">
											<i class="fas fa-user"></i> Profile
											</a>
										</li>
										<li>
											<a href="#" onClick="return false;">
											<i class="fas fa-comment-alt"></i> Feedback
											</a>
										</li>
										-->
										<li>
											<a href="{{url('admin/change-password')}}" onClick="return true;">
											<i class="fa fa-key" aria-hidden="true"></i> Password Change
											</a>
										</li>
										<li>
											<a href="#" onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
											<i class="fas fa-power-off"></i> Logout
											</a>
											<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
												@csrf
											</form>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- #END# Tasks -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- #Top Bar -->
		<div>
			<!-- Left Sidebar -->
			<aside id="leftsidebar" class="sidebar">
				<!-- Menu -->
				<div class="menu">
					@php echo \App\Helpers\commonHelper::getSidebarMenu(); @endphp
				</div>
				<!-- #Menu -->
			</aside>
			<!-- #END# Left Sidebar -->
		</div>
		
		@yield('content')
		 
		<script src="{{ asset('admin-assets/js/app.min.js')}}"></script>
		<script src="{{ asset('admin-assets/js/table.min.js') }}"></script>
		<script src="{{ asset('admin-assets/js/index.js') }}"></script> 
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
		<script src="{{ asset('admin-assets/js/fSelect.js') }}"></script> 
		<script src="{{ asset('admin-assets/js/common.js') }}"></script> 
		<script>
		$(document).ready(function(){
			@if(Session::has('adminerror'))
				sweetAlertMsg('error',"{{ Session::get('adminerror') }}");
			@elseif(Session::has('adminsuccess'))
				sweetAlertMsg('success',"{{ Session::get('adminsuccess') }}");
			@endif
		 });

		 var baseUrl = "{{ url('/') }}";
		   
		</script>
		
		@stack('custom_js')
		
		<script src="{{ asset('admin-assets/js/jquery-datatable.js') }}"></script>
	</body>

</html>