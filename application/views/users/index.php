<div id="videoform" class="row">
	<div class="col-lg-12">


		<?php echo validation_errors() ?>

		<?php
		//echo flash messages with dismissable alert
		if ($this->session->flashdata('message'))
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $this->session->flashdata('message') . '
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}

		?>


		<a  href="<?php echo base_url() ?>users/register" class="btn btn-primary btn-rounded mb-5"> <i style="font-size: 18px;" class="anticon anticon-user-add"></i> &nbsp; New User</a>

		<table id="data-table" class="table ">
			<thead>
			<tr>
				<th style="width: 25%">username</th>
				<th></th>
				<th>Email</th>
				<th>Options</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td>
						<!--circle avatar with letter-->
						<div class="avatar avatar-text bg-success">
							<span><?php echo strtoupper(substr($user['user_name'], '0', '1')); ?></span>
						</div>
					</td>
					<td>
						<p class=""><?php echo $user['user_name'] ?></p>
					</td>
					<td>
						<p class=""><?php echo $user['user_email'] ?></p>
					</td>
					<td>
						<div class="">
							<?php if ($user['super'] != 1): ?>
								<a href="<?php echo base_url() ?>admin/users/edit/<?php echo $user['user_id'] ?>" class="btn btn-sm btn-primary btn-rounded"> <i class="anticon anticon-edit"></i> Edit</a>
								<a href="<?php echo base_url() ?>admin/users/delete/<?php echo $user['user_id'] ?>" class="btn btn-sm btn-danger btn-rounded"> <i class="anticon anticon-delete"></i> Delete</a>
							<?php else: ?>
								Super User. No options available.
							<?php endif; ?>


						</div>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

