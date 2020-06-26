<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- SEARCH FORM -->

			<!-- Right navbar links -->
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?php echo base_url('assets'); ?>/index3.html" class="brand-link">
				<span class="brand-text font-weight-light"><?php echo $title ?></span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="info">
						<a href="#" class="d-block"><?php echo $this->session->userdata('username') ?></a>
						<a href="<?php echo base_url('logout'); ?>" class="nav-link">
							<i class="nav-icon fas fa-sign-out-alt"></i> LOGOUT	
						</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->

						<!-- dashboard -->
						<?php if($this->session->flashdata('dashboard') == 'active'){ ?>
						<a href="<?php echo site_url('dashboard') ?>" class="nav-link active">
							<i class="nav-icon fas fa-home"></i>
							<p>
								Dashboard
							</p>
						</a>
						<?php } else { ?>
						<a href="<?php echo site_url('dashboard') ?>" class="nav-link">
							<i class="nav-icon fas fa-home"></i>
							<p>
								Dashboard
							</p>
						</a>
						<?php } ?>

						<!-- categories -->
						<?php if($this->session->flashdata('categories') == 'active'){ ?>
						<a href="<?php echo site_url('category') ?>" class="nav-link active">
							<i class="nav-icon fas fa-th-list"></i>
							<p>
								Categories
							</p>
						</a>
						<?php } else { ?>
						<a href="<?php echo site_url('category') ?>" class="nav-link">
							<i class="nav-icon fas fa-th-list"></i>
							<p>
								Categories
							</p>
						</a>
						<?php } ?>

						<!-- tags -->
						<?php if($this->session->flashdata('tags') == 'active'){ ?>
						<a href="<?php echo site_url('tag') ?>" class="nav-link active">
							<i class="nav-icon fas fa-hashtag"></i>
							<p>
								Tags
							</p>
						</a>
						<?php } else { ?>
						<a href="<?php echo site_url('tag') ?>" class="nav-link">
							<i class="nav-icon fas fa-hashtag"></i>
							<p>
								Tags
							</p>
						</a>
						<?php } ?>

						<!-- posts -->
						<?php if($this->session->flashdata('posts') == 'active'){ ?>
						<a href="<?php echo site_url('post') ?>" class="nav-link active">
							<i class="nav-icon far fa-paper-plane"></i>
							<p>
								Posts
							</p>
						</a>
						<?php } else { ?>
						<a href="<?php echo site_url('post') ?>" class="nav-link">
							<i class="nav-icon far fa-paper-plane"></i>
							<p>
								Posts
							</p>
						</a>
						<?php } ?>

						<?php if($this->session->flashdata('events') == 'active'){ ?>
						<a href="<?php echo site_url('event') ?>" class="nav-link active">
							<i class="nav-icon fa fa-calendar"></i>
							<p>
								Events
							</p>
						</a>
						<?php } else { ?>
						<a href="<?php echo site_url('event') ?>" class="nav-link">
							<i class="nav-icon fa fa-calendar"></i>
							<p>
								Events
							</p>
						</a>
						<?php } ?>

						<?php if($this->session->flashdata('comments') == 'active'){ ?>
						<a href="<?php echo site_url('comment') ?>" class="nav-link active">
							<i class="nav-icon fa fa-comments"></i>
							<p>
								Comments
							</p>
						</a>
						<?php } else { ?>
						<a href="<?php echo site_url('comment') ?>" class="nav-link">
							<i class="nav-icon fa fa-comments"></i>
							<p>
								Comments
							</p>
						</a>
						<?php } ?>

						<?php if($this->session->flashdata('contact') == 'active'){ ?>
						<a href="<?php echo site_url('contacts') ?>" class="nav-link active">
							<i class="nav-icon fa fa-phone"></i>
							<p>
								Contact
							</p>
						</a>
						<?php } else { ?>
						<a href="<?php echo site_url('contacts') ?>" class="nav-link">
							<i class="nav-icon fa fa-phone"></i>
							<p>
								Contact
							</p>
						</a>
						<?php } ?>
						
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
