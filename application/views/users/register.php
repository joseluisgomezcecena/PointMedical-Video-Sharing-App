<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<?php echo form_open_multipart(base_url() . 'users/register'); ?>

<div id="videoform" class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4>Register Users</h4>
				<p>These users will have permissions to upload content, edit and delete.</p>

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
								<input type="text" class="form-control" name="user_name" placeholder="User Name">
							</div>

							<div class="col-lg-4">
								<label>Company</label>
								<input type="text" class="form-control" name="company" placeholder="Company Name.">
							</div>

							<div class="col-lg-4">
								<label>E-Mail</label>
								<input type="email" class="form-control" name="email" placeholder="Email">
							</div>

							<div class="col-lg-2">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<div class="col-lg-2">
								<label>Confirm Password</label>
								<input type="password" class="form-control" name="password2" placeholder="Password">
							</div>

							<div class="col-lg-4">
								<label>Phone</label>
								<input type="text" class="form-control" name="phone" placeholder="User Phone">
							</div>

							<div class="col-lg-4">
								<label>Address</label>
								<input type="text" class="form-control" name="address" placeholder="Address">
							</div>

						</div>

						<div class="row mt-5">
							<div class="col-lg-12">
								<button type="submit" name="submit" id="save" class="btn btn-success float-left btn-rounded float-right">Register User</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<?php echo form_close(); ?>
