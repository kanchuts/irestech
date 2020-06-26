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
					<li><a href="<?php echo base_url() ?>/#work-shop">UPCOMING</a></li>
					<li><a href="#">OFFICIALS</a></li>
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
				<div class="header-section text-center">
					<h2>Upcoming Competition, project and Workshop</h2>
					<hr class="bottom-line">
				</div>
				<?php foreach($events as $e) : 
					$month = date('F', strtotime($e['date']));
				?>
				<div class="row align-items-center event-block no-gutters margin-40px-bottom">
					<div class="col-md-4 col-sm-12">
						<div class="position-relative text-center">
							<img src="<?php echo base_url('assets') ?>/poster/<?php echo $e['poster']  ?>"
								style="width: 40%; height: 40%;" alt="">
							<div class="events-date">
								<div class="font-size28"><?php  echo date('j', strtotime($e['date'])) ?></div>
								<div class="font-size14"><?php  echo substr($month, 0, 3) ?></div>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-sm-12">
						<h5
							class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500">
							<a href="event-details.html" class="text-theme-color"><?php echo $e['title'] ?></a></h5>
						<ul class="event-time margin-10px-bottom md-margin-5px-bottom">
							<li><i class="fa fa-clock-o margin-10px-right"></i><?php echo date('h:i A', strtotime($e['time']))?></li>
							<li><i class="fa fa-map-marker margin-5px-right"></i> <?php echo $e['location'] ?></li>
						</ul>
						<p><?php echo substr($e['description'], 0, 500) ?> . . . .</p>
						<a class="butn small margin-10px-top md-no-margin-top" href="<?php echo base_url('singleEvent/'.$e['event_id']) ?>">Read More <i
								class="fas fa-long-arrow-alt-right margin-10px-left"></i></a>
					</div>
				</div>
				<?php endforeach; ?>
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
