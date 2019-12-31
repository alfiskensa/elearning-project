<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Creative One Page Parallax Template">
	<meta name="keywords" content="" />
	<meta name="author" content="">
	<title>E-Learning UHAMKA</title>
	<link href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/frontend/css/prettyPhoto.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/frontend/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/frontend/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/frontend/css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]> <script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script> <![endif]-->
	<!-- <link rel="shortcut icon" href="images/ico/"> belom  -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
	<div class="preloader">
		<div class="preloder-wrap">
			<div class="preloder-inner">
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
			</div>
		</div>
	</div><!--/.preloader-->
	<header id="navigation">
		<div class="navbar navbar-inverse navbar-fixed-top" role="banner">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"><h1><img src="<?php echo base_url(); ?>assets/frontend/images/logo.png" length=80 width=80 alt="logo"></h1></a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="scroll active"><a href="#navigation">Home</a></li>
						<li class="scroll"><a href="#feature">Feature</a></li>
						<li class="scroll"><a href="<?php echo site_url('login'); ?>">Login</a></li>
					</ul>
				</div>
			</div>
		</div><!--/navbar-->
	</header> <!--/#navigation-->

	<section id="home">
		<div class="home-pattern"></div>
		<div id="main-carousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#main-carousel" data-slide-to="1"></li>
				<li data-target="#main-carousel" data-slide-to="2"></li>
			</ol><!--/.carousel-indicators-->
			<div class="carousel-inner">
				<div class="item active" style="background-image: url(<?php echo base_url(); ?>assets/frontend/images/slider/slide3.jpg)">
					<div class="carousel-caption">
						<div>
							<h2 class="heading animated bounceInDown">E-Learning</h2>
							<p class="animated bounceInUp">UHAMKA Bisa....!</p>
						</div>
					</div>
				</div>
				<div class="item" style="background-image: url(<?php echo base_url(); ?>assets/frontend/images/slider/slide2.jpg)">
					<div class="carousel-caption"> <div>
						<h2 class="heading animated bounceInDown">E-Learning</h2>
						<p class="animated bounceInUp">UHAMKA Bisa....! </p>
					</div>
				</div>
			</div>
			<div class="item" style="background-image: url(<?php echo base_url(); ?>assets/frontend/images/slider/slide1.jpg)">
				<div class="carousel-caption">
					<div>
						<h2 class="heading animated bounceInRight">E-Learning</h2>
						<p class="animated bounceInLeft">UHAMKA Bisa....!</p>
					</div>
				</div>
			</div>
		</div><!--/.carousel-inner-->

		<a class="carousel-left member-carousel-control hidden-xs" href="#main-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
		<a class="carousel-right member-carousel-control hidden-xs" href="#main-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
	</div>

</section><!--/#home-->


	<section id="feature" class="parallax-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Feature</h2>
					<p>Feature ini dibuat agar seluruh mahasiswa dapat Mencari soal dan sekaligus berguna untuk mengerjakan tugas yang bisa di download
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="our-service">
						<div class="services row">
							<div class="col-sm-4">
								<div class="single-service">
									<i class="fa fa-th"></i>
									<h2>Mata Kuliah</h2>
									<p>Layanan Feature ini dibuat agar seluruh Mahasiswa dapat mendownload & Meng-Upload Tugas , dengan demikian dapat mengatasi pengumpulan tugas secara fisik ...!</p>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-service">
									<i class="fa fa-pencil"></i>
									<h2>Pengumpulan Tugas</h2>
									<p>Upload Tugas Ini Bertujuan Pengumpulan TUGAS sesuai Dengan Mata kuliah</p>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-service">
									<i class="fa fa-users"></i>
									<h2>News</h2>
									<p>News Ini Bertujuan Memberikan informasi Kepada Seluruh Mahasiswa Yang Berkaitan Dengan Akademik Dan Kegiatan Mahasiswa </p>
									<a href="http://uhamka.ac.id" target="_blank">Link</a>
								</div>
							</div></div>
						</div>
					</div>
				</div>
			</div>
		</section><!--/#service-->


	<footer id="footer">
		<div class="container">
			<div class="text-center">
				<p>Copyright &copy; 2017 - <a href="">E-Learning Uhamka</a> | All Rights Reserved</p>
			</div>
		</div>
	</footer> <!--/#footer-->

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/smoothscroll.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.parallax.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/main.js"></script>
</body>
</html>
