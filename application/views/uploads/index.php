<div id="videoform" class="row">
	<div class="col-lg-12">


		<?php echo validation_errors() ?>

		<?php
		//echo flash messages with dismissable alert
		if ($this->session->flashdata('message'))
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $this->session->flashdata('message') . '
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}

		?>


		<a  href="<?php echo base_url() ?>admin/uploads/new" class="btn btn-primary btn-rounded mb-5"> <span style="font-size:16px;">+</span> <i style="font-size: 18px;" class="anticon anticon-video-camera"></i> &nbsp; Upload</a>

		<table id="data-table" class="table ">
			<thead>
			<tr>
				<th style="width: 50%">Video</th>
				<th>Date</th>
				<th>Views</th>
				<th>Options</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($videos as $video): ?>
				<tr>
					<td>
						<div class="row">
							<div class="col-lg-5">
								<div class="card card-hover" style="width: 10rem;">
									<img class="card-img-top" src="<?php echo base_url() ?>assets/uploads/screenshots/<?php echo $video['screenshot_url'] ?>" alt="Card image cap">
								</div>
							</div>
							<div class="col-lg-7">
							<span>
								<p class="card-title"><?php echo $video['video_title'] ?></p>
								<p style="margin-top: -15px;" class="card-text">Document #: <b class="text-success"><?php echo $video['document_no'] ?></b></p>
							</span>

								<small class="card-text"><?php  echo substr($video['video_description'], '0' , '100')  ?>...</small>
							</div>
						</div>
					</td>

					<td>
						<small class="card-text">
						<?php
						//format date
						$date = date_create($video['created_at']);
						echo date_format($date, 'F d, Y');
						echo " at ";
						echo date_format($date, 'g:i A');
						?>
						</small>
					</td>
					<td>
						<div class="mb-4">
							<small><?php echo $video['views'] ?></small>
						</div>
					</td>
					<td>
						<div class="">
							<a href="<?php echo base_url() ?>admin/uploads/edit/<?php echo $video['video_id'] ?>" class="btn btn-sm btn-primary btn-rounded"> <i class="anticon anticon-edit"></i> Edit</a>
							<a href="<?php echo base_url() ?>admin/uploads/delete/<?php echo $video['video_id'] ?>" class="btn btn-sm btn-danger btn-rounded"> <i class="anticon anticon-delete"></i> Delete</a>
						</div>
					</td>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

