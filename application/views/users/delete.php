<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<?php echo form_open_multipart(base_url() . 'users/delete/' . $user['user_id']); ?>

<div id="videoform" class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4>Delete</h4>
				<p class="text-danger">This user will be deleted.</p>

				<?php echo validation_errors() ?>

				<?php
				if ($this->session->flashdata('message'))
				{
					//dismissible alert
					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $this->session->flashdata('message') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				}

				if ($this->session->flashdata('errors'))
				{
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $this->session->flashdata('errors') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				}

				?>

				<div class="m-t-25">
					<div class="">
						<div class="row">
							<div class="col-lg-4">
								<label>Username</label>
								<input type="text" class="form-control" name="user_name" placeholder="User Name" value="<?php echo $user['user_name'] ?>" disabled>
							</div>
							<div class="col-lg-4">
								<label>E-Mail</label>
								<input type="email" class="form-control" name="user_email" placeholder="Email" value="<?php echo $user['user_email'] ?>" disabled>
							</div>


						</div>

						<div class="row mt-5">
							<div class="col-lg-12">
								<button type="submit" name="delete_user" id="save" class="btn btn-danger float-left btn-rounded float-right">Delete User</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<?php echo form_close(); ?>
