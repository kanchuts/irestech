<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Posts</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Comments</h3>
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
								Comments
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
						foreach($comments as $c) :
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $c['name']; ?></td>
							<td><?php echo $c['email']; ?></td>
							<td><?php echo $c['comment']; ?></td>
							<td><?php echo $c['created_at']; ?></td>
							<td class="project-actions text-center">
								<a href="<?php echo base_url('deleteComment/'.$c['id']); ?>" class="btn btn-danger btn-sm">
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
