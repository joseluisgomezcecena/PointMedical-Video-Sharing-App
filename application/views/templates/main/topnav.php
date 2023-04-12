<body style="background-color: #ffffff">
<div class="app">
	<div class="layout">
		<!-- Header START -->
		<div class="header">
			<div class="logo logo-dark">
				<a href="<?php echo base_url() ?>">
					<span style="font-size: 25px; margin-top: -25px;" class=""></span>
					<img style="margin-top: 10px;" src="<?php echo base_url() ?>assets/images/logo/logopoint.png" alt="Logo" width="220">
					<img style="text-align: center; padding-left: 22px;" class="logo-fold" src="<?php echo base_url() ?>assets/images/logo/Martech.ico" alt="Logo">
				</a>
			</div>
			<div class="logo logo-white">
				<a href="<?php echo base_url() ?>">
					💡
					<img src="<?php echo base_url() ?>assets/images/logo/transparente.png" alt="Logo">
					<img class="logo-fold" src="<?php echo base_url() ?>assets/images/logo/transparente.png" alt="Logo">
				</a>
			</div>
			<div class="nav-wrap">
				<ul class="nav-left">
					<li class="desktop-toggle">
						<a href="javascript:void(0);">
							<i class="anticon"></i>
						</a>
					</li>
					<li class="mobile-toggle">
						<a href="javascript:void(0);">
							<i class="anticon"></i>
						</a>
					</li>
					<!--
					<li>
						<a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
							<i class="anticon anticon-search"></i>
						</a>
					</li>
					-->
				</ul>
				<ul class="nav-right">
					<!--
					<li class="dropdown dropdown-animated scale-left">
						<a href="javascript:void(0);" data-toggle="dropdown">
							<i class="anticon anticon-bell notification-badge"></i>
						</a>

						<div class="dropdown-menu pop-notification">
							<div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
								<p class="text-dark font-weight-semibold m-b-0">
									<i class="anticon anticon-bell"></i>
									<span class="m-l-10">Notification</span>
								</p>
								<a class="btn-sm btn-default btn" href="javascript:void(0);">
									<small>View All</small>
								</a>
							</div>
							<div class="relative">
								<div class="overflow-y-auto relative scrollable" style="max-height: 300px">
									<a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
										<div class="d-flex">
											<div class="avatar avatar-blue avatar-icon">
												<i class="anticon anticon-mail"></i>
											</div>
											<div class="m-l-15">
												<p class="m-b-0 text-dark">You received a new message</p>
												<p class="m-b-0"><small>8 min ago</small></p>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
										<div class="d-flex">
											<div class="avatar avatar-cyan avatar-icon">
												<i class="anticon anticon-user-add"></i>
											</div>
											<div class="m-l-15">
												<p class="m-b-0 text-dark">New user registered</p>
												<p class="m-b-0"><small>7 hours ago</small></p>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
										<div class="d-flex">
											<div class="avatar avatar-red avatar-icon">
												<i class="anticon anticon-user-add"></i>
											</div>
											<div class="m-l-15">
												<p class="m-b-0 text-dark">System Alert</p>
												<p class="m-b-0"><small>8 hours ago</small></p>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
										<div class="d-flex">
											<div class="avatar avatar-gold avatar-icon">
												<i class="anticon anticon-user-add"></i>
											</div>
											<div class="m-l-15">
												<p class="m-b-0 text-dark">You have a new update</p>
												<p class="m-b-0"><small>2 days ago</small></p>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>

					</li>
					-->
					<li class="dropdown dropdown-animated scale-left">
						<?php if (isset($this->session->userdata['logged_in'])) : ?>
						<div class="pointer" data-toggle="dropdown">
							<div class="avatar avatar-image bg-success  m-h-10 m-r-15">
								<!--
								<img src="assets/images/avatars/thumb-3.jpg"  alt="">
								-->
								<?php if (isset($this->session->userdata['logged_in'])) : ?>
									<span class="avatar-title rounded-circle "><?php echo strtoupper(substr($this->session->userdata['user_name'],'0','1')); ?></span>
								<?php endif; ?>
							</div>
						</div>
						<?php else: ?>

						<div>
							<a href="<?php echo base_url('auth/login'); ?>" class="btn btn-primary btn-rounded btn-outline-dark btn-sm">
							    <i class="anticon anticon-user"></i>	Login
							</a>
						</div>

						<?php endif; ?>
						<div class="p-b-15 p-t-20 dropdown-menu pop-profile">
							<?php  if (isset($this->session->userdata['logged_in'])) :  ?>
							<div class="p-h-20 p-b-15 m-b-10 border-bottom">
								<div class="d-flex m-r-50">
									<div class="avatar avatar-lg avatar-image">
										<!--
										<img src="assets/images/avatars/thumb-3.jpg" alt="">
										-->
										<span class="avatar-title rounded-circle">
											<?php if (isset($this->session->userdata['logged_in'])) : ?>
												<span class="avatar-title rounded-circle"><?php echo substr($this->session->userdata['user_name'],'0','1') ?></span>
											<?php endif; ?>
										</span>
									</div>
									<div class="m-l-10">
										<p class="m-b-0 text-dark font-weight-semibold">
											<?php if (isset($this->session->userdata['logged_in'])) : ?>
												<?php echo $this->session->userdata['user_name'] ?>
											<?php endif; ?>
										</p>
										<p class="m-b-0 opacity-07"><?php echo $this->session->userdata['user_name']; ?></p>
									</div>
								</div>
							</div>
							<?php endif; ?>

							<?php if (isset($this->session->userdata['logged_in'])) : ?>
								<a href="<?php echo base_url() ?>admin/profile" class="dropdown-item d-block p-h-15 p-v-10">
									<div class="d-flex align-items-center justify-content-between">
										<div>
											<i class="anticon opacity-04 font-size-16 anticon-user"></i>
											<span class="m-l-10">Edit Profile</span>
										</div>
										<i class="anticon font-size-10 anticon-right"></i>
									</div>
								</a>

								<!--
								<a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
									<div class="d-flex align-items-center justify-content-between">
										<div>
											<i class="anticon opacity-04 font-size-16 anticon-lock"></i>
											<span class="m-l-10">Account Setting</span>
										</div>
										<i class="anticon font-size-10 anticon-right"></i>
									</div>
								</a>
								<a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
									<div class="d-flex align-items-center justify-content-between">
										<div>
											<i class="anticon opacity-04 font-size-16 anticon-project"></i>
											<span class="m-l-10">Projects</span>
										</div>
										<i class="anticon font-size-10 anticon-right"></i>
									</div>
								</a>
								-->


								<a href="<?php echo base_url() ?>auth/logout" class="dropdown-item d-block p-h-15 p-v-10">
									<div class="d-flex align-items-center justify-content-between">
										<div>
											<i class="anticon opacity-04 font-size-16 anticon-logout"></i>
											<span class="m-l-10">Logout</span>
										</div>
										<i class="anticon font-size-10 anticon-right"></i>
									</div>
								</a>
							<?php else: ?>
								<a href="<?php echo base_url() ?>auth/login" class="dropdown-item d-block p-h-15 p-v-10">
									<div class="d-flex align-items-center justify-content-between">
										<div>
											<i class="anticon opacity-04 font-size-16 anticon-logout"></i>
											<span class="m-l-10">Login</span>
										</div>
										<i class="anticon font-size-10 anticon-right"></i>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</li>

					<li>
						<a href="<?php echo base_url() . "admin/uploads/new" ?>"  >
							+<i class="anticon anticon-video-camera"></i>
						</a>
					</li>

				</ul>
			</div>
		</div>
		<!-- Header END -->
