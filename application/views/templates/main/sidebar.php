<!-- Side Nav START -->
<div style="" class="side-nav">
	<div class="side-nav-inner">
		<ul class="side-nav-menu scrollable">
			<!--Main-->
			<li class="nav-item dropdown open " >
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-video-camera"></i>
                                </span>
					<span class="title">Videos</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li class="active">
						<a href="<?php echo base_url() ?>videos/all">Search All</a>
					</li>

					<?php foreach ($categories as $category): ?>

						<li class="">
							<a href="<?php echo base_url()?>category/<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></a>
						</li>

					<?php endforeach; ?>
				</ul>
			</li>

			<?php if (isset($this->session->userdata['logged_in'])) : ?>

			<li class="nav-item dropdown" >
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-cloud-upload"></i>
                                </span>
					<span class="title">My Uploads</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li class="">
						<a href="<?php echo base_url() ?>admin/uploads">Manage my uploads</a>
					</li>
				</ul>
			</li>




			<li class="nav-item dropdown" >
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-setting"></i>
                                </span>
					<span class="title">Config</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li class="">
						<a href="<?php echo base_url() ?>admin/categories">Categories</a>
					</li>
					<li class="">
						<a href="<?php echo base_url() ?>admin/users">Users</a>
					</li>
				</ul>
			</li>

			<?php endif; ?>


		</ul>
	</div>
</div>
<!-- Side Nav END -->

