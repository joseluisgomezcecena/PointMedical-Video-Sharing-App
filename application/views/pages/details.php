<style>

	/* CSS break points */

	/* Extra Small (XS) */
	@media (max-width: 575.98px) {
		/* CSS rules for extra small screens */
		#data-table_filter{
			float: left;
		}
		.dataTables_empty{
			text-align: left;
		}
	}

	/* Small (SM) */
	@media (min-width: 576px) and (max-width: 767.98px) {
		/* CSS rules for small screens */
		#data-table_filter{
			float: left;
		}

		.dataTables_empty{
			text-align: left;
		}
	}

	/* Medium (MD) */
	@media (min-width: 768px) and (max-width: 991.98px) {
		/* CSS rules for medium screens */
		#data-table_filter{
			float: left;
		}

		.dataTables_empty{
			text-align: center;
		}
	}

	/* Large (LG) */
	@media (min-width: 992px) and (max-width: 1199.98px) {
		/* CSS rules for large screens */
		#data-table_filter{
			float: right;
			margin-top: -45px;
		}

		.dataTables_empty{
			text-align: center;
		}
	}

	/* Extra Large (XL) */
	@media (min-width: 1200px) {
		/* CSS rules for extra large screens */
		#data-table_filter{
			float: right;
			margin-top: -45px;
		}

		.dataTables_empty{
			text-align: center;
		}
	}

	#data-table_info{
		margin-top: 23px;
	}

	#data-table_paginate{
		margin-top: 10px;
	}





	.paginate_button {
		background-color: #73d73d !important;
		color: #fff !important;
		box-shadow: 0 4px 6px rgb(50 50 93 / 11%), 0 1px 3px rgb(0 0 0 / 8%) !important;
		display: inline-block;
		font-weight: 400;
		line-height: 1.5;
		color: #313131;
		text-align: center;
		text-decoration: none;
		vertical-align: middle;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		background-color: transparent;
		border: 1px solid transparent;
		padding: 0.375rem 0.75rem !important;
		margin: 5px !important;
		font-size: 0.875rem;
		border-radius: 2px;
		-webkit-transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
		transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
		-o-transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
		transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
		transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
	}

	menu, ol, ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}


</style>

<section class="bg-white">
	<div class="flex max-w-screen-xl px-4 py-4 mx-auto lg:gap-8 xl:gap-0 lg:py-8">
		<div  class="w-full">

			<div class="flex flex-col">
				<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
						<div class="shadow p-5 overflow-hidden border-b border-gray-200 sm:rounded-lg">
							<table style="font-size: 13px;" id="data-table" class="min-w-full divide-y divide-gray-200">
								<thead ">
								<tr>
									<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

									</th>
									<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Part number
									</th>
									<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Product
									</th>
									<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Category
									</th>
									<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Subcategory
									</th>
									<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Description
									</th>
									<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Product Price
									</th>
									<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Actions
									</th>
								</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">

								<?php foreach ($products as $product): ?>

								<tr>
									<td><img style="width: 150px;" class="h-auto" src="<?php echo base_url() ?>uploads/<?php echo $product['image_url'] ?>" alt="<?php echo $product['name'] ?>"> </td>
									<td><?php echo $product['number']; ?></td>
									<td><?php echo $product['name']; ?></td>
									<td><?php echo $product['category_name']; ?></td>
									<td><?php echo $product['sub_name']; ?></td>
									<td><?php echo $product['description'] ?></td>
									<td><?php echo "$" . $product['product_price']; ?></td>
									<td>
										<a class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-2" href="<?php echo base_url() ?>add/<?php echo $product['id']; ?>">
											Add to order
										</a>
										<a class="text-black bg-white hover:bg-[#cbd5e1]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-2" href="<?php echo base_url() ?>add/<?php echo $product['id']; ?>">
											View details&nbsp;
										</a>

									</td>
								</tr>

								<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>




