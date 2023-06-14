<div class="container">
	<div class="row mt-5">
		<div class="col-lg-6 offset-lg-3 text-center">
			<?php if($this->session->flashdata('errors')): ?>
				<div style="background-color:rgba(255,255,255,0.8) !important;" class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong class="text-danger">🔒 Authentication Error.</strong>
					<br>
					<?php echo $this->session->flashdata('errors'); ?>.
					<br/>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>

			<?php echo validation_errors(); ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row mt-5">
		<div class="col-lg-6 offset-lg-3">
			<div style="min-height: 400px" class="card">
				<div class="card-body">
					<div class="text-center">
						<img class="text-danger align-content-center" src="<?php echo base_url() ?>assets/avanti.png" alt="" width="150">
					</div>
					<h2 class="m-t-20 font-weight-bolder fw-bolder">Sign In</h2>
					<p class="m-b-30">
						To make a purchase order or follow up on order status, you need to be logged in.
						Enter your credentials to access your profile,
					</p>

					<?php echo form_open_multipart(base_url() . "auth/login")?>
						<div class="form-group">

							<input style="opacity: 0;" name="user_name" type="text"><br>

							<label class="font-weight-semibold" for="userName">Email:</label>
							<div class="input-affix">
								<i class="prefix-icon anticon anticon-user"></i>
								<input type="email" class="form-control" name="email" id="userName" placeholder="Your email">
							</div>
						</div>
						<div class="form-group">
							<label class="font-weight-semibold" for="password">Password:</label>
							<a class="float-right font-size-13 text-muted" href="http://mxmtsvrandon1/authentication">Forgot Password?</a>
							<div class="input-affix m-b-10">
								<i class="prefix-icon anticon anticon-lock"></i>
								<input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
							</div>
						</div>
						<div class="form-group">
							<div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Dont have an account?
                                                    <a class="small" href="http://mxmtsvrandon1/authentication"> Register here</a>
                                                </span>
								<button type="submit" class="btn btn-primary btn-rounded">Sign-In</button>
							</div>
						</div>
					<?php echo form_close(); ?>

				</div>
			</div>
		</div>
	</div>
</div>

