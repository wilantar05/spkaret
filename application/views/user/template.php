<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>Sitem Pakar - <?php echo $title ?></title>
	<!-- Favicon -->
	<!-- <link rel="icon" href="<?php echo base_url() ?>/assets/img/brand/logo.png" type="image/png"> -->
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
	<!-- Page plugins -->
	<!-- Argon CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/argon.css?v=1.2.0" type="text/css">
	<script src="<?php echo base_url() ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/vendor/js-cookie/js.cookie.js"></script>
	<script src="<?php echo base_url() ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
	<!-- Optional JS -->
	<!-- <script src="<?php echo base_url() ?>/assets/vendor/chart.js/dist/Chart.min.js"></script> -->
	<!-- <script src="<?php echo base_url() ?>/assets/vendor/chart.js/dist/Chart.extension.js"></script> -->

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
	<style>
        .select2-container .select2-search--inline {
            display: inline;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            padding-left: 10px;
        }
    </style>
	
	<script src="https://adminlte.io/themes/AdminLTE/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="https://adminlte.io/themes/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="https://adminlte.io/themes/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js"></script>

	<!-- Argon JS -->

</head>

<body>
	<!-- Sidenav -->
	<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<!-- Brand -->
			<div class="sidenav-header  align-items-center">
				<a class="navbar-brand" href="javascript:void(0)">
					<img src="<?php echo base_url() ?>/assets/img/brand/elastis.png" class="navbar-brand-img" alt="...">
				</a>
			</div>
			<div class="navbar-inner">
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<!-- Nav items -->
					<?php if($this->session->username == "Guest"){ ?>
						<ul class="navbar-nav">
                        <li class="nav-item">
							<a class="nav-link <?php if($head == "Konsultasi") echo "active";?>"  href="<?php echo base_url() ?>user/auth/">
								<i class="ni ni-tv-2 text-primary"></i>
								<span class="nav-link-text">Konsultasi</span>
							</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link <?php if($head == "Panduan") echo "active";?>" href="<?php echo base_url() ?>user/panduan/">
								<i class="ni ni-tv-2 text-primary"></i>
								<span class="nav-link-text">Panduan</span>
							</a>
						</li>
					</ul>
					<?php }else{ ?>		
						<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link <?php if($head == "Dashboard") echo "active";?>" href="<?php echo base_url() ?>user/auth/">
								<i class="ni ni-tv-2 text-primary"></i>
								<span class="nav-link-text">Dashboard</span>
							</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link <?php if($head == "Konsultasi") echo "active";?>" href="<?php echo base_url() ?>user/dashboard/konsultasi">
								<i class="ni ni-tv-2 text-primary"></i>
								<span class="nav-link-text">Konsultasi</span>
							</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link <?php if($head == "Panduan") echo "active";?>" href="<?php echo base_url() ?>user/panduan/">
								<i class="ni ni-tv-2 text-primary"></i>
								<span class="nav-link-text">Panduan</span>
							</a>
						</li>
					</ul>
					<?php } ?>

					<!-- Divider -->
					<hr class="my-3">
					<!-- Heading -->

					<!-- Navigation -->
				</div>
			</div>
		</div>
	</nav>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Search form -->
					<!-- Navbar links -->
					<ul class="navbar-nav align-items-center  ml-md-auto ">
						<li class="nav-item d-xl-none">
							<!-- Sidenav toggler -->
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
								data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
						<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
							<li class="nav-item dropdown">
								<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false">
									<div class="media align-items-center">
										<span class="avatar avatar-sm rounded-circle">
											<img alt="Image placeholder"
												src="<?php echo base_url() ?>/assets/img/theme/team-4.jpg">
										</span>
										<div class="media-body  ml-2  d-none d-lg-block">
											<span
											class="mb-0 text-sm  font-weight-bold"><?php echo ($user != null && count($user) > 0) ? $user[0]['nama_user'] : 'Guest' ?></span>
										</div>
									</div> 
								</a>
								<div class="dropdown-menu  dropdown-menu-right ">
									<div class="dropdown-header noti-title">
										<h6 class="text-overflow m-0">Welcome!</h6>
									</div>
									<!-- <a href="index.php?p=profile" class="dropdown-item">
										<i class="ni ni-single-02"></i>
										<span>My profile</span>
									</a> -->
									<div class="dropdown-divider"></div>
									<a href="<?php echo base_url() ?>index.php/user/auth/logout" class="dropdown-item">
										<i class="ni ni-user-run"></i>
										<span>Logout</span>
									</a>
								</div>
							</li>
						</ul>
				</div>
			</div>
		</nav>