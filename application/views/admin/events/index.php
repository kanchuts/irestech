<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Events</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Events</h3>

				<div class="card-tools">
					<li class="breadcrumb-item"><a href="<?php echo base_url('addEvent'); ?>">Add Event</a></li>
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table table-striped projects text-center">
					<thead>
						<tr>
							<th style="width: 5%;">
								No
							</th>
							<th style="width: 10%;">
								Title
							</th>
							<th style="width: 10%;">
								Date
							</th>
							<th style="width: 5%;">
								Time
							</th>
							<th style="width: 10%;">
								Location
							</th>
							<th style="width: 10%;">
								description
							</th>
							<th style="width: 10%;">
								Poster
							</th>
							<th style="width: 10%;">
								Creator
							</th>
							<th style="width: 10%;">
								Created At 
							</th>
							<th style="width: 15%;">
								Action
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach($events as $e) :
						?>
						<tr>
							
							<td><?php echo $no; ?></td>
							<td><?php echo $e['title']; ?></td>
							<td><?php echo $e['date']; ?> </td>
							<td><?php echo $e['time']; ?></td>
							<td><?php echo $e['location']; ?></td>
					 		<td><?php echo substr($e['description'], 0, 400) ?></td>
							<td><img src="./assets/poster/<?php echo $e['poster']; ?>" alt="image poster" class="img-thumbnail" ></td>
							<td><?php echo $e['username']; ?></td>
							<td><?php echo $e['created_at']; ?></td>
							<td class="project-actions text-left">
								<a class="btn btn-primary btn-sm" href="#">
									<i class="fas fa-folder">
									</i>
									View
								</a>
								<a class="btn btn-info btn-sm" href="<?php echo base_url('editEvent/'.$e['event_id']); ?>">
									<i class="fas fa-pencil-alt">
									</i>
									Edit
								</a>
								<a href="<?php echo base_url('deleteEvent/'.$e['event_id']); ?>" class="btn btn-danger btn-sm">
									<i class="fas fa-trash"></i>
									Delete
								</a>
							</td>
						</tr>
						<?php $no++;
					 	endforeach; ?>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
