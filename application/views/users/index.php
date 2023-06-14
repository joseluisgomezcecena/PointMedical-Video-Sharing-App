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
				<th style="width: 15%">username</th>
				<th>Email</th>
				<th>Company</th>
				<th>Phone</th>
				<th>Register Date</th>
				<th>Staff</th>
				<th>Options</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td>
						<span class="avatar avatar-text bg-success">
							<span><?php echo strtoupper(substr($user['user_name'], '0', '1')); ?></span>
						</span>
						<span><?php echo $user['user_name'] ?></span>

					</td>
					<td>
						<p class=""><?php echo $user['email'] ?></p>
					</td>
					<td>
						<p class=""><?php echo $user['company'] ?></p>
					</td>
					<td>
						<p class=""><?php echo $user['phone'] ?></p>
					</td>
					<td>
						<p class=""><?php echo date_format(date_create($user['created_at']) , 'd-m-Y')  ?></p>
					</td>
					<td>
						<p class="">
							<?php
							if ($user['staff'] == 1)
							{
								echo '<span class="badge badge-success">Staff</span>';
							}
							else
							{
								echo '<span class="badge badge-danger">Client</span>';
							}

							?>
						</p>
					</td>
					<td>
						<div class="">
							<a href="<?php echo base_url() ?>admin/users/edit/<?php echo $user['user_id'] ?>" class="btn btn-sm btn-primary btn-rounded"> <i class="anticon anticon-edit"></i> Edit</a>
							<a href="<?php echo base_url() ?>admin/users/delete/<?php echo $user['user_id'] ?>" class="btn btn-sm btn-danger btn-rounded"> <i class="anticon anticon-delete"></i> Delete</a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

