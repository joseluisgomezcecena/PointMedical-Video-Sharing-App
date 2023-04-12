
<!--
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
-->
<?php echo form_open_multipart(base_url() . 'categories/delete/' . $category['category_id']); ?>

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
								<input type="text" class="form-control" name="category_name" placeholder="Category Name" value="<?php echo $category['category_name'] ?>" readonly>
							</div>
						</div>

						<div class="row mt-5 mb-3">
							<div class="col-lg-12">
								<button type="submit" name="delete" id="save" class="btn btn-danger float-left">Delete Category</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	//launch modal.
	$('#exampleModal').modal('show');
</script>
