<div id="videoform" class="row">

	<div class="col-lg-12">
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
	</div>

	<div class="col-lg-12">

		<table id="data-table" class="table ">
			<thead>
			<tr>
				<th>PO #</th>
				<th>Client</th>
				<th>Total</th>
				<th>Status</th>
				<th>Created</th>
				<th>Updated</th>
				<th>Options</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($orders as $order): ?>
				<tr>
					<td>
						<?php echo $order['po_id']; ?>
					</td>
					<td>
						<?php echo $order['company']; ?> - <?php echo $order['user_name']; ?>
					</td>
					<td>
						<?php echo $order['total']; ?>
					</td>
					<td>
						<?php
						if ($order['status'] == 0){
							echo "Pending";
						}
						elseif ($order['status'] == 1){
							echo "Processing";
						}
						elseif ($order['status'] == 2){
							echo "Shipped";
						}
						?>
					</td>
					<td>
						<?php echo $order['created_at']; ?>
					</td>
					<td>
						<?php echo $order['updated_at']; ?>
					</td>
					<td>
						<div class="float-right">
							<a href="<?php echo base_url() ?>admin/order/cancel/<?php echo $order['po_id'] ?>" class="btn btn-danger"><i class="anticon anticon-stop"></i> Cancel </a>
							<a href="<?php echo base_url() ?>admin/order/details/<?php echo $order['po_id'] ?>" class="btn btn-success"><i class="anticon anticon-edit"></i> Details</a>
						</div>
					</td>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

