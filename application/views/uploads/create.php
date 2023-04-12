<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<?php echo form_open_multipart(base_url() . 'videouploads/create'); ?>

<div id="loading" class="row text-center">
	<div class="col-lg-12">
		<div class="spinner-border text-center" style="width: 5rem; height: 5rem;" role="status"></div>
		<p>Uploading and compressing your file, please wait...⌛</p>
	</div>
</div>


<div id="videoform" class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<h4>Video Details</h4>
				<p>Video screenshots will automatically be created at <code> 15 seconds</code>.</p>

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
									<input type="text" class="form-control" name="video_title" placeholder="Video Title">
								</div>
								<div class="col-lg-3">
									<label>Document Number</label>
									<input type="text" class="form-control" name="document_no" placeholder="Document Number">
								</div>
								<div class="col-lg-3">
									<label>Category</label>
									<select  name="video_category_id" class="form-control">
										<option value="">Select an Option</option>
										<?php foreach ($options as $option): ?>
											<option value="<?php echo $option['category_id']; ?>"><?php echo $option['category_name']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-lg-12 mt-3">
									<label>Video Description</label>
									<textarea class="form-control" rows="10" name="video_description" placeholder="Video Description"></textarea>
								</div>
							</div>

							<div class="row mt-3">
								<div class="col-lg-12">
									<button type="submit" name="submit" id="save" class="btn btn-success float-left">Upload Video</button>
								</div>
							</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<h4>Upload Video.</h4>


				<div class="m-t-25">
					<div class="input-group mb-3">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="userfile" id="inputGroupFile02">
							<label class="custom-file-label" for="inputGroupFile02">Choose file</label>
						</div>

					</div>
				</div>
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
