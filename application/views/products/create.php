
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<?php echo form_open_multipart(base_url() . 'products/create'); ?>

<div id="videoform" class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4>Product Details</h4>
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
							<div class="col-lg-3">
								<label>Name</label>
								<input type="text" class="form-control" name="name" placeholder="Product Name">
							</div>

							<div class="col-lg-3">
								<label>Product Number</label>
								<input type="text" class="form-control" name="number" placeholder="Product Number">
							</div>

							<div class="col-lg-3">
								<label>Category</label>
								<select class="form-control" name="category_id" id="category">
									<option value="">Select</option>
									<?php foreach ($categories as $category) : ?>
										<option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col-lg-3">
								<label>Sub-Category</label>
								<select class="form-control" name="subcategory_id" id="sub_category">
									<option value="">Select</option>
								</select>
							</div>
						</div>

						<div class="row mt-3">

							<div class="col-lg-4">
								<label>Product Price</label>
								<input type="number" step="0.1" class="form-control" name="product_price" placeholder="Product Price">
							</div>

						</div>

						<div class="row mt-3">

							<div class="col-lg-12">
								<label>Description</label>
								<textarea class="form-control" name="description" placeholder="Description"></textarea>
							</div>

							<div class="col-lg-12">
								<label>Notes</label>
								<textarea class="form-control" name="notes" placeholder="Notes"></textarea>
							</div>


							<div class="col-lg-12">
								<label>Image</label>
								<input type="file" class="form-control" name="userfile" placeholder="Product Name" id="image">
							</div>

							<div class="col-lg-4" id="image-preview"></div>

						</div>

						<div class="row mt-5 mb-3">
							<div class="col-lg-12">
								<button type="submit" name="submit" id="save" class="btn btn-success float-left">Save Product</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>

<script>
	$(document).ready(function () {
		$('#category').change(function () {
			var category_id = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>categories/fetch_sub_category",
				method: "POST",
				data: {category_id: category_id},
				dataType: "text",
				success: function (data) {
					$('#sub_category').html(data);
				}
			});
		});
	});
</script>

<script>
	// Image preview
	$("#image").change(function () {
		$("#image-preview").html("");
		var total_file = document.getElementById("image").files.length;
		for (var i = 0; i < total_file; i++) {
			$("#image-preview").append("<img class='img-fluid img-thumbnail shadow-sm' src='" + URL.createObjectURL(event.target.files[i]) + "'>");
		}
	});
</script>
