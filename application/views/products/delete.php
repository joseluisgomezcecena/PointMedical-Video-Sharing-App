
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<?php echo form_open_multipart(base_url() . 'products/delete/' . $product['id']); ?>

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
								<input type="text" class="form-control" name="name" placeholder="Product Name" value="<?php echo $product['name'] ?>" disabled>
							</div>

							<div class="col-lg-3">
								<label>Product Number</label>
								<input type="text" class="form-control" name="number" placeholder="Product Number" value="<?php echo $product['number'] ?>" disabled>
							</div>

							<div class="col-lg-3">
								<label>Category</label>
								<select class="form-control" name="category_id" id="category" disabled>
									<option value="">Select</option>
									<?php foreach ($categories as $category) : ?>
										<option <?php if ($product['category_id'] == $category['category_id']){echo "selected";}else{echo "";} ?> value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col-lg-3">
								<label>Sub-Category</label>
								<select class="form-control" name="subcategory_id" id="sub_category" disabled>
									<option value="<?php echo $product['subcategory_id'] ?>"><?php echo $product['sub_name'] ?></option>


								</select>
							</div>
						</div>

						<div class="row mt-3">

							<div class="col-lg-2">
								<label>Product Price</label>
								<input type="number" step="0.1" class="form-control" name="product_price" placeholder="Product Price" value="<?php echo $product['product_price'] ?>" disabled>
							</div>

						</div>

						<div class="row mt-3">

							<div class="col-lg-12">
								<label>Description</label>
								<textarea class="form-control" name="description" placeholder="Description" disabled><?php echo $product['description'] ?></textarea>
							</div>

							<div class="col-lg-12">
								<label>Notes</label>
								<textarea class="form-control" name="notes" placeholder="Notes" disabled><?php echo $product['notes'] ?></textarea>
							</div>


							<div class="col-lg-12">
								<label id="current-label">Current Image</label>
								<br>
								<img id="current-img" class="img-fluid img-thumbnail shadow-sm" src="<?php echo base_url() . 'uploads/' . $product['image_url'] ?>">
							</div>

						</div>

						<div class="row mt-5 mb-3">
							<div class="col-lg-12">
								<button type="submit" name="delete" id="delete" class="btn btn-danger float-left">Delete Product</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>

