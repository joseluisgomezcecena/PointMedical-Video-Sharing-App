


<div id="videoform" class="row">
	<div class="col-lg-8">
		<table id="data-table" class="table ">
			<thead>
			<tr>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($videos as $video): ?>
				<tr>
					<td>
						<div class="card card-hover" style="width: 18rem;">
							<img class="card-img-top" src="<?php echo base_url() ?>assets/uploads/screenshots/<?php echo $video['screenshot_url'] ?>" alt="Card image cap">
						</div>
					</td>
					<td>
						<div class="mb-4">
							<h4 class="card-title"><?php echo $video['video_title'] ?></h4>
							<h5 style="margin-top: -15px;" class="card-text">Document #: <b class="text-success"><?php echo $video['document_no'] ?></b></h5>

							<p class="card-text">Uploaded:
								<?php
								//format date
								$date = date_create($video['created_at']);
								echo date_format($date, 'F d, Y');
								echo " at ";
								echo date_format($date, 'g:i A');
								?>
							</p>

						</div>
						<div>
							<p class="card-text"><?php echo $video['video_description'] ?></p>
						</div>
					</td>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="col-lg-4">
		<div class="cards">
			<div class="card-body">
				<h4>Latest Videos</h4>
				<div class="m-t-25">
					<?php foreach ($recents as $recent): ?>

						<div class="card card-hover" style="width: 18rem;">
							<img class="card-img-top" src="<?php echo base_url() ?>assets/uploads/screenshots/<?php echo $recent['screenshot_url'] ?>" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title"><?php echo $recent['video_title'] ?></h5>
								<h5 style="margin-top: -15px;" class="card-text">Document #: <b class="text-success"><?php echo $video['document_no'] ?></b></h5>
								<small class="card-text">Uploaded:
									<?php
									//format date
									$date = date_create($video['created_at']);
									echo date_format($date, 'F d, Y');
									echo " at ";
									echo date_format($date, 'g:i A');
									?>
								</small>
							</div>
						</div>

					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

