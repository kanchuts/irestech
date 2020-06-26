<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Categories</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card" style="width: 50%;">
			<div class="card-header">
				<h3 class="card-title">Categories</h3>

				<div class="card-tools">
					<li class="breadcrumb-item"><a href="<?php echo base_url('addCategory'); ?>">Add Category</a></li>
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table table-striped projects">
					<thead>
						<tr>
							<th style="width: 5%">
								No
							</th>
							<th style="width: 20%">
								Category Name
							</th>
							<th style="width: 20%">
								Created at
							</th>
							<th style="width: 20%">
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach($categories as $c) : 
						?>
						<tr>
							
							<td><?php echo $no; ?></td>
							<td><?php echo $c['category']; ?></td>
							<td><?php echo $c['created_at']; ?></td>
							<td class="project-actions text-left">
								<a href="<?php echo base_url('deleteCategory/'.$c['id']); ?>" class="btn btn-danger btn-sm">
									<i class="fas fa-trash"></i>
									Delete
								</a>
							</td>
						</tr>
						<?php $no++;
						endforeach; 	
						?>
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
