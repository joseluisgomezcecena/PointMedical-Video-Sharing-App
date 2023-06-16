<div id="videoform" class="row">

	<div class="col-lg-12">
		<div style="background-color: #d72f4e;color: white" class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Order Cancellation</strong><br><br>Are you sure you want to cancel this order?, if you cancel this order will appear under manage cancelled orders menu.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>

	<div class="col-lg-12">

		<div class="col-lg-12 mt-5 mb-5">
			<h2 class="text-black font-weight-bolder">PO#:<?php echo $order['po_id']; ?></h2>
		</div>

		<table id="data-table-cancel" class="table ">
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
			<form action="<?php echo base_url() ?>adminorders/cancel/<?php echo $order['po_id']; ?>" method="post">
				<div class="form-group">
					<label for="reason">Reason for cancellation.</label>
					<textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
				</div>
				<button type="submit" name="cancel" class="btn btn-danger">Confirm Cancellation</button>
			</form>
		</div>

	</div>
</div>

