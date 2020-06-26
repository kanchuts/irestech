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
	<section id="blog" class="section-padding blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 entries">
					<?php foreach($single as $s) : ?>
					<article class="entry entry-single" data-aos="fade-up">
						<div class="entry-img">
							<img src="<?php echo base_url('assets/banner/'.$s->image); ?>" alt="" class="img-fluid" style="height: 100%; width: 100%;">
						</div>
						<h2 class="entry-title">
							<?php echo $s->title ?>
						</h2>
						<div class="entry-meta">
							<ul>
								<li class="d-flex align-items-center"><i class="fa fa-user"></i> <a href="blog-single.html"><?php echo $s->username ?></a></li>
                  				<li class="d-flex align-items-center"><i class="fa fa-clock-o"></i><?php echo date('jS F Y', strtotime($s->date_published)) ?></li>
                  				<li class="d-flex align-items-center"><i class="fa fa-comments"></i><?php echo count($comment) ?> Comments</li>	
							</ul>
						</div>
						<div class="entry-content">
							<p>
								<?php echo $s->article ?>
							</p>
						</div>
						<div class="entry-footer clearfix">
							<div class="float-left">
								<i class="fa fa-folder"></i>
								<ul class="cats">
									<li><a href="#"><?php echo $s->category ?></a></li>
								</ul>
							</div>
						</div>
					</article>
					<?php endforeach; ?>

					
					<div class="blog-comments clearfix" data-aos="fade-up">
						<h4 class="comments-count"><?php echo count($comment) ?> comments</h4>
						<?php foreach($comment as $c) : ?>
						<div class="comment clearfix">
							<h5><a href=""><?php echo $c['name'] ?></a></h5>
							<time><?php echo $c['created_at'] ?></time>
							<p>
								<?php echo $c['comment'] ?>
							</p>
						</div>
						
						<?php endforeach; ?>
						<div class="reply-form">
							<h4>Leave Reply</h4>
							<p>Your email address will not be published</p>
							<form action="<?php echo base_url().'front/addComment'; ?>" method="POST">
								<div class="row">
									<div class="col-md-6 form-group">
										<input name="name" type="text" class="form-control" placeholder="Your Name" required>
									</div>
									<div class="col-md-6 form-group">
										<input name="email" type="text" class="form-control" placeholder="Your Email" required>
									</div>
								</div>
								<div class="row">
                  				  <div class="col form-group">
                  				    <textarea name="comment" class="form-control" placeholder="Your Comment" required></textarea>
                  				  </div>
								</div>
								
								<?php foreach($single as $s) :
								echo form_hidden('id_post', $s->post_id); 
								endforeach;
								?>
								<button type="submit" class="btn btn-primary">Post Comments</button> 
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar" data-aos="fade-left">
						<h3 class="sidebar-title">Recent Post</h3>
						<div class="sidebar-item recent-posts">
							<?php foreach($posts as $p) : ?>
							<div class="post-item clearfix">
								<img src="<?php echo base_url('assets') ?>/banner/<?php echo $p['image'] ?>" alt="">
								<h4><a href="<?php echo base_url('singleBlog/'.$p['post_id']); ?>"><?php echo $p['title'] ?></a></h4>
								<time><?php echo $p['created_at'] ?></time>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
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
