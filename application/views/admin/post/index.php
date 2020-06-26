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
				<h3 class="card-title">Post</h3>

				<div class="card-tools">
					<li class="breadcrumb-item"><a href="<?php echo base_url('addPost'); ?>">Add Post</a></li>
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
							<th style="width: 15%;"> 
								Article
							</th>
							<th style="width: 10%;">
								Banner
							</th>
							<th style="width: 10%;">
								Category
							</th>
							<th style="width: 10%;">
								Tag
							</th>
							<th style="width: 10%;">
								Writer
							</th>
							<th style="width: 10%;">
								Date Published
							</th>
							<th style="width: 5%;">
								Status
							</th>
							<th style="width: 15%;">
								Action
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach($posts as $p) :
							if ($p['enabled'] ==  1) {
								$p['enabled'] = 'active';
							} else {
								$p['enabled'] = 'pending';
							}
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $p['title']; ?></td>
							<td><?php echo substr($p['article'], 0, 500) ?></td>
							<td> <img src="./assets/banner/<?php echo $p['image']; ?>" alt="image banner" class="img-thumbnail" > </td>
							<td><?php echo $p['category']; ?></td>
							<td><?php echo $p['tag']; ?></td>
							<td><?php echo $p['username']; ?></td>
							<td><?php echo $p['date_published']; ?></td>
							<td><?php echo $p['enabled']; ?></td>
							<td class="project-actions text-left">
								<a class="btn btn-primary btn-sm" href="#">
									<i class="fas fa-folder">
									</i>
									View
								</a>
								<a class="btn btn-info btn-sm" href="<?php echo base_url('editPost/'.$p['post_id']); ?>">
									<i class="fas fa-pencil-alt">
									</i>
									Edit
								</a>
								<a href="<?php echo base_url('deletePost/'.$p['post_id']); ?>" class="btn btn-danger btn-sm">
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
