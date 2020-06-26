<?php echo form_open_multipart('events/create'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Event Add</h1>
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
							<label for="inputName">Title</label>
							<input name="title" type="text" id="inputName" class="form-control">
						</div>
						<div class="form-group">
							<label for="inputDate">Date</label>
							<input name="date" type="date" id="inputDate" class="form-control">
						</div>
						<div class="form-group">
							<label for="inputTime">Time</label>
							<input name="time" type="time" id="inputTime" class="form-control">
						</div>
						<div class="form-group">
							<label for="inputParticipant">Location</label>
							<input name="location" type="text" id="inputParticipant" class="form-control">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
                			<textarea name="description" id="description" class="textarea"></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Image Poster Input (42 x 59,4 cm)</label>
							<div class="input-group">
								<div class="custom-file">
                      				<input name="poster" type="file" class="custom-file-input" id="exampleInputFile">
                      				<label class="custom-file-label" for="exampleInputFile">Choose File</label>
								</div>	
							</div>
						</div>
						
						<?php
						foreach($user as $u) :
						echo form_hidden('user_id', $u->id);
						endforeach;
						?>
						
						<div class="form-group">
							<a href="<?php echo base_url('posts') ?>" class="btn btn-secondary">Cancel</a>
							<input type="submit" value="Publish Now" class="btn btn-success float-right">
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

