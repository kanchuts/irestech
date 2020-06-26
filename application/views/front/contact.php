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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/contact.css">

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
					<li><a href="<?php echo base_url() ?>/#work-shop">UPCOMING</a></li>
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
	<main>
		<section id="content" class="contact section-padding">
			<div class="container">
				<div class="row">
					<div class="header-section text-center">
						<h2>Contact Us</h2>
						<hr class="bottom-line">
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-4">
						<div class="info">
							<div class="address">
								<i class="fa fa-map-marker"></i>
								<h4>Location:</h4>
								<p>Pendidikan Vokasi Universitas Brawijaya<br>Jl. Veteran No.12-13<br>Malang, Jawa Timur</p>
							</div>
							<div class="email">
								<i class="fa fa-envelope"></i>
								<h4>Email:</h4>
								<p>ubirestech@gmail.com</p>
							</div>
							<div class="phone">
								<i class="fa fa-instagram"></i>
								<h4>Instagram:</h4>
								<p>@Irestech.ub</p>
							</div>
						</div>
					</div>
					<div class="col-lg-8 mt-5 mt-lg-0">
						<form action="<?php echo base_url().'front/sendContact' ?>" method="post" role="form" class="php-email-form">
							<div class="form-row">
								<div class="col-md-6 form-group">
									<input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
										data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
									<div class="validate"></div>
								</div>
								<div class="col-md-6 form-group">
									<input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
										data-rule="email" data-msg="Please enter a valid email" />
									<div class="validate"></div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
									data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validate"></div>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" rows="5" data-rule="required"
									data-msg="Please write something for us" placeholder="Message"></textarea>
								<div class="validate"></div>
							</div>
							<div class="mb-3">
								<div class="loading">Loading</div>
								<div class="error-message"></div>
								<div class="sent-message">Your message has been sent. Thank you!</div>
							</div>
							<div class="text-center"><button type="submit">Send Message</button></div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>
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
