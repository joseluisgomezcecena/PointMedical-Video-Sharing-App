<!-- Side Nav START -->
<div style="" class="side-nav">
	<div class="side-nav-inner">
		<ul class="side-nav-menu scrollable">


			<!--Products-->
			<li class="nav-item dropdown open " >
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-medicine-box"></i>
                                </span>
					<span class="title">Products</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url() ?>admin/products/new">Add New</a>
					</li>

					<li>
						<a href="<?php echo base_url() ?>admin/products">Manage Products</a>
					</li>
				</ul>
			</li>


			<!--Categories-->
			<li class="nav-item dropdown" >
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-bars"></i>
                                </span>
					<span class="title">Categories</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url() ?>admin/categories">Categories</a>
					</li>

					<li>
						<a href="<?php echo base_url() ?>admin/subcategories">Sub Categories</a>
					</li>
				</ul>
			</li>


			<!--Users-->
			<li class="nav-item dropdown" >
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-usergroup-add"></i>
                                </span>
					<span class="title">Users</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url() ?>admin/users/register">Add User</a>
					</li>

					<li>
						<a href="<?php echo base_url() ?>admin/users">Manage Users</a>
					</li>
				</ul>
			</li>

		</ul>
	</div>
</div>
<!-- Side Nav END -->

