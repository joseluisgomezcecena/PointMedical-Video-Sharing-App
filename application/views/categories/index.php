
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

		<a href="<?php echo base_url() ?>admin/categories/new" class="btn btn-primary mb-5 btn-rounded"><i class="anticon anticon-plus-circle"></i> New Category</a>

		<table id="data-table" class="table ">
			<thead>
			<tr>
				<th>Category</th>
				<th>Options</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($categories as $category): ?>
				<tr>
					<td>
						<?php echo $category['category_name']; ?>
					</td>
					<td>
						<div class="float-right">
							<a href="<?php echo base_url() ?>admin/categories/delete/<?php echo $category['category_id'] ?>" class="btn btn-danger"><i class="anticon anticon-delete"></i> Delete</a>
							<a href="<?php echo base_url() ?>admin/categories/edit/<?php echo $category['category_id'] ?>" class="btn btn-success"><i class="anticon anticon-edit"></i> Edit</a>
						</div>
					</td>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

