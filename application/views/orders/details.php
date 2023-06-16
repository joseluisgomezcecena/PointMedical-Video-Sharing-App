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

		<div class="col-lg-12 mt-5 mb-5">
			<h2 class="text-black font-weight-bolder">PO#:<?php echo $order['po_id']; ?></h2>
		</div>

		<table id="data-table" class="table ">
			<thead>
			<tr>
				<th>Product</th>
				<th>Qty</th>
				<th>Unit Price</th>
				<th>Price</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($order_items as $item): ?>
				<tr>
					<td>
						<?php echo $item['name']; ?>
					</td>
					<td>
						<?php echo $item['qty']; ?>
					</td>
					<td>
						<?php echo $item['price']; ?>
					</td>
					<td>
						<?php echo $item['qty']*$item['price']; ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			<tfoot>
			<tr>
				<td colspan="3" class="text-right">Total</td>
				<td><?php echo $order['total']; ?></td>
			</tr>
			</tfoot>
		</table>

		<div>
			<!-- form to update status of order -->
			<form action="<?php echo base_url() ?>adminorders/details/<?php echo $order['po_id']; ?>" method="post">
				<div class="form-group">
					<label for="status">Status</label>
					<select class="form-control" id="status" name="status" required>
						<option value="0" <?php if ($order['status'] == 0) echo 'selected'; ?>>Pending</option>
						<option value="1" <?php if ($order['status'] == 1) echo 'selected'; ?>>Processing</option>
						<option value="2" <?php if ($order['status'] == 2) echo 'selected'; ?>>Shipped</option>
						<option value="4" <?php if ($order['status'] == 86) echo 'selected'; ?>>Cancelled</option>
					</select>
				</div>
				<button type="submit" name="update" class="btn btn-primary">Update Status</button>
			</form>
		</div>

	</div>

</div>

