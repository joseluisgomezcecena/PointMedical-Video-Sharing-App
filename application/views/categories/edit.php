
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<?php echo form_open_multipart(base_url() . 'categories/update/' . $category['category_id']); ?>

<div id="videoform" class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4>Category Details</h4>
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
								<label>Category Name</label>
								<input type="text" class="form-control" name="category_name" placeholder="Category Name" value="<?php echo $category['category_name'] ?>">
							</div>
						</div>

						<div class="row mt-5 mb-3">
							<div class="col-lg-12">
								<button type="submit" name="submit" id="save" class="btn btn-success float-left">Update Category</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
