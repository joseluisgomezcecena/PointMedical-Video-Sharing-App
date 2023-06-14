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

		<a href="<?php echo base_url() ?>admin/products/new" class="btn btn-primary mb-5 btn-rounded"><i class="anticon anticon-plus-circle"></i> New Product</a>

		<table style="font-size: 11px;" id="data-table" class="table ">
			<thead>
			<tr>
				<th>Image</th>
				<th>Product</th>
				<th>Category</th>
				<th>Sub-Category</th>
				<th>Price</th>
				<th>Options</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($products as $product): ?>
				<tr>
					<td>
						<img src="<?php echo base_url() ?>uploads/<?php echo $product['image_url']; ?>" width="120"  alt=""  class="img-thumbnail img-fluid">
					</td>
					<td>
						<?php echo $product['name']; ?>
					</td>
					<td>
						<?php echo $product['category_name']; ?>
					</td>
					<td>
						<?php echo $product['sub_name']; ?>
					</td>
					<td>
						<?php echo "$" . $product['product_price']; ?>
					</td>
					<td>
						<div class="float-right">
							<a href="<?php echo base_url() ?>admin/products/delete/<?php echo $product['id'] ?>" class="btn btn-danger"><i class="anticon anticon-delete"></i> Delete</a>
							<a href="<?php echo base_url() ?>admin/products/edit/<?php echo $product['id'] ?>" class="btn btn-success"><i class="anticon anticon-edit"></i> Edit</a>
						</div>
					</td>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

