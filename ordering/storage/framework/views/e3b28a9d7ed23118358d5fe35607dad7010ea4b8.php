<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<title><?php echo e(config('app.name')); ?></title>

	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon.png')); ?>">
	<!-- Bootstrap Core CSS -->
	<link href="<?php echo e(asset('adminassets/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo e(asset('adminassets/css/style.css')); ?>" rel="stylesheet">
	<!-- You can change the theme colors from here -->
	<link href="<?php echo e(asset('adminassets/css/colors/blue.css')); ?>" id="theme" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->  
	<!-- Footable CSS -->
	<link href="<?php echo e(asset('adminassets/assets/plugins/footable/css/footable.core.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('adminassets/assets/plugins/bootstrap-select/bootstrap-select.min.css')); ?>" rel="stylesheet" />

	<style type="text/css">
		body{
			font-size: 13px !important;
			line-height: 1 !important;
		}
		.form-control{
			font-size: 12px !important;
			line-height: 1 !important;
		}
		.note-insert{
			display: none;
		}
		.note-view{
			display: none;
		}
	</style>
	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
	</script>
</head>
<body class="fix-header fix-sidebar card-no-border">
	<div id="main-wrapper">
		<header class="topbar">
			<nav class="navbar top-navbar navbar-expand-md navbar-light">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo e(url('admin/')); ?>">
						<b>
							<img style="width: 80%;" src="<?php echo e(asset('logo.png')); ?>" alt="homepage" class="dark-logo" />
						</b>
					</a>
				</div>
				<div class="navbar-collapse">
					<!-- ============================================================== -->
					<!-- toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav mr-auto mt-md-0">                        
					</ul>
					<!-- ============================================================== -->
					<!-- User profile and search -->
					<!-- ============================================================== -->
					<ul class="navbar-nav my-lg-0">
						<!-- ============================================================== -->
						<!-- Profile -->
						<!-- ============================================================== -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo e(Auth::user()->name); ?></a>
							<div class="dropdown-menu dropdown-menu-right scale-up">
								<ul class="dropdown-user">
									<li>
										<a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
											<i class="fa fa-power-off"></i> Logout
										</a>

										<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
											<?php echo e(csrf_field()); ?>

										</form>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="left-sidebar">
			<!-- Sidebar scroll-->
			<div class="scroll-sidebar">
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav">
					<ul id="sidebarnav">
						<li class="nav-devider"></li>
						<li class="nav-small-cap">MENU</li>
						<li> <a class="waves-effect waves-dark" href="<?php echo e(url('/home')); ?>"><i class="mdi mdi-gauge"></i>Dashboard</a></li>
						<li> <a class="waves-effect waves-dark" href="<?php echo e(url('/category')); ?>"><i class="mdi mdi-format-list-bulleted"></i>Category</a></li>
						<li> <a class="waves-effect waves-dark" href="<?php echo e(url('/company')); ?>"><i class="mdi mdi-garage"></i>Company</a></li>
					</ul>
				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>
		<!-- ============================================================== -->
		<!-- End Left Sidebar - style you can find in sidebar.scss  -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Page wrapper  -->
		<!-- ============================================================== -->
		<div class="page-wrapper">
			<?php echo $__env->yieldContent('content'); ?>
			<!-- ============================================================== -->
			<!-- footer -->
			<!-- ============================================================== -->
			<footer class="footer">
				© 2018 <?php echo e(config('app.name')); ?>

			</footer>
			<!-- ============================================================== -->
			<!-- End footer -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Page wrapper  -->
		<!-- ============================================================== -->
	</div>

	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="<?php echo e(asset('adminassets/assets/plugins/jquery/jquery.min.js')); ?>"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="<?php echo e(asset('adminassets/assets/plugins/bootstrap/js/popper.min.js')); ?>"></script>

	<script src="<?php echo e(asset('adminassets/assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="<?php echo e(asset('adminassets/js/jquery.slimscroll.js')); ?>"></script>
	<!--Wave Effects -->
	<script src="<?php echo e(asset('adminassets/js/waves.js')); ?>"></script>
	<!--Menu sidebar -->
	<script src="<?php echo e(asset('adminassets/js/sidebarmenu.js')); ?>"></script>
	<!--stickey kit -->
	<script src="<?php echo e(asset('adminassets/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminassets/assets/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
	<!--Custom JavaScript -->
	<script src="<?php echo e(asset('adminassets/js/custom.min.js')); ?>"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->
	<!-- sparkline chart -->
	<script src="<?php echo e(asset('adminassets/assets/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
	<!-- ============================================================== -->
	<!-- Style switcher -->
	<!-- ============================================================== -->
	<script src="<?php echo e(asset('adminassets/assets/plugins/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
	<!-- Footable -->
	<script src="<?php echo e(asset('adminassets/assets/plugins/footable/js/footable.all.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminassets/assets/plugins/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
	<!--FooTable init-->
	<script src="<?php echo e(asset('adminassets/js/footable-init.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\503b-admin\resources\views/layouts/adminapp.blade.php ENDPATH**/ ?>