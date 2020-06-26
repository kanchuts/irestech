<?php  echo form_open_multipart('categories/create'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Category Add</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Add</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
								title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
						<br />
						<?php echo validation_errors(); ?>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="inputName">Category Name</label>
							<input name="category" type="text" id="inputName" class="form-control">
						</div>
						<div class="form-group">
							<a href="<?php echo base_url('category') ?>" class="btn btn-secondary">Cancel</a>
							<input type="submit" value="Create new Category" class="btn btn-success float-right">
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

			</div>
			<div class="col-md-3"></div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
