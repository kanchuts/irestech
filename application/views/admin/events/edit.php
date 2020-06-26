<?php  echo form_open_multipart('events/edit'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Event Edit</h1>
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
					<?php foreach($event as $e) : ?>
						<input type="hidden" name="id" value="<?php echo $e->event_id; ?>">
					<div class="card-body">
						<div class="form-group">
							<label for="inputName">Title</label>
							<input name="title" type="text" id="inputName" class="form-control" value="<?php echo $e->title; ?>">
						</div>
						<div class="form-group">
							<label for="inputDate">Date</label>
							<input name="date" type="date" id="inputDate" class="form-control" value="<?php echo $e->date ?>">
						</div>
						<div class="form-group">
							<label for="inputTime">Time</label>
							<input name="time" type="time" id="inputTime" class="form-control" value="<?php echo $e->time ?>">
						</div>
						<div class="form-group">
							<label for="inputParticipant">Location</label>
							<input name="location" type="text" id="inputParticipant" class="form-control" value="<?php echo  $e->location ?>">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
                			<textarea name="description" id="description" class="textarea" ><?php echo $e->description ?></textarea>
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
