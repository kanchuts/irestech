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
					<h2>What's New</h2>
					<hr class="bottom-line">
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php foreach($posts as $p)  : ?>
				<div class="col-md-6 padleft-right">
					<div class="single-blog">
						<div class="single-blog-img">
							<a href="#"><img src="<?php echo base_url('assets') ?>/banner/<?php echo $p['image'] ?>"
									alt=""></a>
						</div>
						<div class="blog-content-box">
							<div class="blog-post-date">
								<span><?php echo date('j', strtotime($p['date_published'])) ?></span>
								<span><?php echo date('F Y', strtotime($p['date_published'])) ?></span>
							</div>
							<div class="blog-content">
								<h4><a href="#"><?php echo $p['title'] ?></a></h4>
								<div class="meta-post">
									<span class="author">Post By : <?php echo $p['username'] ?></span>
									<span><?php echo $p['category'] ?></span>
								</div>
								<div class="exerpt" style="padding-right: 20px;">
									<?php echo substr($p['article'], 0, 400)." . . . ." ?>
								</div>
								<a href="<?php echo base_url('singleBlog/'.$p['post_id']); ?>" class="btn-two">Read More</a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="pagination-link">
					<?php
					
					echo $links ;
					
					?>
				</div>
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
