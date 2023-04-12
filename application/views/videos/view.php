<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>



<div id="videoform" class="row">
	<div class="col-lg-8">

		<video style="width: 100%; height: auto;" controls autoplay >
			<source src="<?php echo base_url() ?>assets/uploads/<?php echo $video['video_url'] ?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>

		<div class="mt-2 mb-3">
			<h3 class="font-weight-bolder"><?php echo $video['video_title'] ?></h3>
			<small class="card-text">Uploaded:
				<?php
				$date = date_create($video['created_at']);
				echo date_format($date, 'F d, Y');
				echo " at ";
				echo date_format($date, 'g:i A');
				?>
			</small>
			<p class="float-right">Views: <?php echo $views ?></p>


		</div>

		<div class="card">
			<div class="card-body">
				<p style="text-align: justify" class="justify-content-between"><?php echo $video['video_description']; ?></p>
			</div>
		</div>
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

								<small class="card-text float-left">Uploaded:
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


<script>
	//send ajax request to get video
	$(document).ready(function () {
		//get video id
		var video_id = <?php echo $video['video_id'] ?>;

		//send ajax request
		$.ajax({
			url: "<?php echo base_url() ?>views/record",
			method: "POST",
			data: {video_id: video_id},
			success: function (data) {
				console.log(data);
				//parse data
				//var video = JSON.parse(data);

				//set video source
				//$('#video').attr('src', '<?php echo base_url() ?>assets/uploads/' + video.video_url);
			}
		});
	});
</script>
