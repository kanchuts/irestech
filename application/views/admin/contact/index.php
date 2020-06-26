<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Contact</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Contact</h3>
			</div>
			<div class="card-body p-0">
				<table class="table table-striped projects text-center">
					<thead>
						<tr>
							<th style="width: 5%;">
								No
							</th>
							<th style="width: 10%;">
								Name
							</th>
							<th style="width: 15%;"> 
								Email
							</th>
							<th style="width: 10%;">
								Subjects
							</th>
							<th style="width: 10%;">
								message
							</th>
							<th style="width: 15%;">
								Action
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach($contact as $c) :
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $c['name']; ?></td>
							<td><?php echo $c['email']; ?></td>
							<td><?php echo $c['subject']; ?></td>
							<td><?php echo $c['message']; ?></td>
							<td class="project-actions text-center">
								<a href="<?php echo base_url('deleteContact/'.$c['id']); ?>" class="btn btn-danger btn-sm">
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
