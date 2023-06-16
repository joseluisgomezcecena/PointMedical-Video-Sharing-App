<div id="videoform" class="row">

	<div class="col-lg-12">
		<div style="background-color: #d72f4e;color: white" class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Delete Order.</strong><br><br>Are you sure you want to delete this order?, this action cannot be undone.
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
			<form action="<?php echo base_url() ?>adminorders/delete/<?php echo $order['po_id']; ?>" method="post">
				<button type="submit" name="delete" class="btn btn-danger">Delete</button>
			</form>
		</div>

	</div>
</div>

