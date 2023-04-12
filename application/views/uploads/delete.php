<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<?php echo form_open_multipart(base_url() . 'videouploads/delete/' . $video['video_id']); ?>

<div id="videoform" class="row">

	<div class="col-lg-12">
		<!--dismissable alert-->

		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Are you sure you want to delete this video?</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

	</div>


	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<h4>Video Details</h4>

				<?php echo validation_errors() ?>

				<?php
				if ($this->session->flashdata('message'))
				{
					echo '<div class="alert alert-success">' . $this->session->flashdata('message') . '</div>';
				}

				if ($this->session->flashdata('errors'))
				{
					echo '<div class="alert alert-danger">' . $this->session->flashdata('errors') . '</div>';
				}

				?>

				<div class="m-t-25">
					<div class="">
							<div class="row">
								<div class="col-lg-6">
									<label>Video Title</label>
									<input type="text" class="form-control" name="video_title" placeholder="Video Title" value="<?php echo $video['video_title'] ?>" disabled>
								</div>
								<div class="col-lg-3">
									<label>Document Number</label>
									<input type="text" class="form-control" name="document_no" placeholder="Document Number" value="<?php echo $video['document_no'] ?>" disabled>
								</div>
								<div class="col-lg-3">
									<label>Category</label>
									<select  name="video_category_id" class="form-control" disabled>
										<option value="">Select an Option</option>
										<?php foreach ($options as $option): ?>
											<option <?php if ($video_category == $option['category_id']){echo "selected";}else{echo'';} ?> value="<?php echo $option['category_id']; ?>"><?php echo $option['category_name']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-lg-12 mt-3">
									<label>Video Description</label>
									<textarea class="form-control" rows="10" name="video_description" placeholder="Video Description" disabled><?php echo $video['video_description']; ?></textarea>
								</div>
							</div>

							<div class="row mt-3">
								<div class="col-lg-12">
									<button type="submit" name="delete_video" id="save" class="btn btn-danger float-right btn-rounded"><i class="fa fa-trash-alt"></i>&nbsp; Delete Video</button>
								</div>
							</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card card-hover" style="width: 100%">
			<img class="card-img-top" src="<?php echo base_url() ?>assets/uploads/screenshots/<?php echo $video['screenshot_url'] ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">Current Video</h5>
				<p class="card-text">File Name: <b class="text-success"><?php echo $video['video_url'] ?></b></p>
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
	</div>
</div>
<?php echo form_close(); ?>
<!--
<button id="hide">Hide</button>
-->
<script>
	$('#inputGroupFile02').on('change',function(){
		//get the file name
		var fileName = $(this).val();
		//replace the "Choose a file" label
		$(this).next('.custom-file-label').html(fileName);
		//change text color to red
		$(this).next('.custom-file-label').css('color', '#2b5afd');
	})

	//hide the form on button click
	$('#loading').hide();

	$('#save').click(function(){
		$('#videoform').hide();
		$('#loading').show();
	});





</script>
