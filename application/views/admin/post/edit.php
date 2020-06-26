<?php  echo form_open_multipart('posts/edit'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2"> 
				<div class="col-sm-6">
					<h1>Post Edit</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Edit</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
								title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
						<br />
						<?php echo validation_errors(); ?>
					</div>
					<?php foreach($post as $p) : ?>
						<input type="hidden" name="id" value="<?php echo $p->post_id; ?>">
					<div class="card-body">
						<div class="form-group">
							<label for="inputName">Title</label>
							<input name="title" type="text" id="inputName" class="form-control" value="<?php echo $p->title; ?>">
						</div>
						<div class="form-group">
							<label for="article">Article</label>
                			<textarea name="article" id="article" class="textarea"><?php echo $p->article; ?></textarea>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="category_id">Select Category</label>
									<select class="form-control" name="category_id" id="category_id">
										<?php foreach($categories as $c) : ?>
										<option value="<?php echo $c['id'] ?>"><?php echo $c['category'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tag_id">Select Tag</label>
									<select class="form-control" name="tag_id" id="tag_id">
										<?php foreach($tags as $t) : ?>
										<option value="<?php echo $t['id'] ?>"><?php echo $t['tag'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="username">Creator</label>
									<input class="form-control" id="usename" value="<?php echo $p->username ?>" type="text" readonly>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Status</label>
									<div class="card-body">
									<input id="enabled" type="checkbox" name="enabled" value="<?php echo $p->enabled ?>" checked data-bootstrap-switch>
									</div>
								</div>
							</div>
						</div>
						
					<?php endforeach; ?>
					
						<div class="form-group">
							<a href="<?php echo base_url('posts') ?>" class="btn btn-secondary">Cancel</a>
							<input type="submit" value="submit" class="btn btn-success float-right">
						</div>
						
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

			</div>
			<div class="col-md-2"></div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
