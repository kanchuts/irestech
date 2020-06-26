<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('assets') ?>/img/LOGO IRESTECH4.png">
	<meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/style.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<!--Navigation bar-->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url() ?>">Ires<span>tech</span></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url() ?>/#feature">DIVISION</a></li>
					<li><a href="#">UPCOMING</a></li>
					<li><a href="<?php echo base_url() ?>/#faculity-member">OFFICIALS</a></li>
					<li><a href="<?php echo base_url() ?>/#pricing">WHAT'S NEW</a></li>
					<li><a href="<?php echo base_url('contact') ?>">CONTACT US</a></li>
					<li><a href="<?php echo base_url() ?>/admin">Sign in</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!--/ Navigation bar-->
	<!--Banner-->
	<div class="banner">
		<div class="bg-color">
			<div class="container">
				<div class="row">
					<div class="banner-text text-center">
						<div class="text-border">
							<img src="<?php echo base_url('assets'); ?>/img/LOGO%20IRESTECH4.png" alt=""
								href="index.html" />
						</div>
						<div class="intro-para text-center quote">
							<p class="big-text">" BEYOND THE RESEARCH "</p>
							<p class="small-text">IRESTECH (Innovation, research, technology) merupakan wadah yang
								menaungi Mahasiswa
								Vokasi</p>
							<p class="small-text">dalam bidang Research, Entrepreneur, dan competition technology</p>
						</div>
						<a href="<?php echo base_url() ?>events/#content" class="mouse-hover">
							<div class="mouse"></div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content -->
	<section id="content" class="section-padding">
		<div class="container">
			<div class="row">
				<?php foreach($single as $s) ?>
				<div class="header-section text-center">
					<h2><?php echo strtoupper($s->title)  ?></h2>
					<ul class="event-time margin-10px-bottom md-margin-5px-bottom">
							<li><i class="fa fa-clock-o margin-10px-right"></i><?php echo date('j F h:i A', strtotime($s->time))?></li>
							<li><i class="fa fa-map-marker margin-5px-right"></i> <?php echo $s->location ?></li>
						</ul>
					<hr class="bottom-line">
				</div>
				<article class="entry entry-single text-center">
					<div class="entry-img">
						<img src="<?php echo base_url('assets/poster/'.$s->poster); ?>" alt="" style="height: 30%; width: 30%;">
					</div>
					<div class="entry-content">
						<p>
							<?php echo $s->description ?>
						</p>
					</div>
				</article>
			</div>
		</div>
	</section>
	<!-- /content -->
	<footer id="footer" class="footer">
		<div class="container text-center">
			<!-- End newsletter-form -->
			<p>"BEYOND THE RESEARCH"</p>
			<ul class="social-links">
				<li><a href="https://twitter.com/irestechUB"><i class="fa fa-twitter fa-fw"></i></a></li>
				<li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
				<li><a href="https://www.instagram.com/irestech.ub/"><i class="fa fa-instagram fa-fw"></i></a></li>
			</ul>
			©2020 IRESTECH
			<div class="credits">
			</div>
		</div>
	</footer>
	<!--/ Footer-->

	<script src="<?php echo base_url('assets'); ?>/js/custom.js"></script>
	<script src="<?php echo base_url('assets'); ?>/js/jquery.easing.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
	</script>

</body>

</html>
