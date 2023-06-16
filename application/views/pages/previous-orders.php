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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<section class="py-12 sm:py-16">
	<div class="flex max-w-screen-xl px-4 py-4 mx-auto lg:gap-8 xl:gap-0 lg:py-8">
		<div  class="w-full">

			<div class="flex flex-col">
				<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

						<h1 class="text-3xl font-bold mb-6 -mt-4">Previous Orders</h1>
						<p class="mb-10">Here you can view your previous orders and check on their status.</p>


						<?php if (isset($this->session->userdata['logged_in'])):?>
							<!--cart-->
							<div id="my-order" class="relative overflow-x-auto">
								<table  class="cart-container w-full text-sm text-left text-gray-500 dark:text-gray-400" id="data-table">
									<thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
									<tr>
										<th scope="col" class="px-6 py-3 rounded-l-lg">PO#</th>
										<th scope="col" class="px-6 py-3 ">Client</th>
										<th scope="col" class="px-6 py-3 ">Company</th>
										<th scope="col" class="px-6 py-3">Total</th>
										<th scope="col" class="px-6 py-3">Status</th>
										<th scope="col" class="px-6 py-3">Date</th>
										<th scope="col" class="px-6 py-3 rounded-r-lg">Action</th>
									</tr>
									</thead>
									<tbody class="bg-white divide-y divide-gray-200">
									<?php foreach ($orders as $item) { ?>
										<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
											<td><?php echo $item['po_id']; ?></td>
											<td><?php echo $item['user_name']; ?></td>
											<td><?php echo $item['company']; ?></td>
											<td>
												<?php echo $item['total']; ?>
											</td>
											<td>
												<?php
												 if ($item['status'] == 0){
													echo "Pending";
												 }
												 elseif ($item['status'] == 1){
													 echo "Processing";
												 }
												 elseif ($item['status'] == 2){
													 echo "Shipped";
												 }
												?>
											</td>
											<td><?php echo $item['created_at']; ?></td>
											<td>
												<a href="<?php echo base_url() ?>order/<?php echo $item['po_id']; ?>" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-gray-900 bg-none px-8 py-2 text-center text-base font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800" >View</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
							<!--cart end-->
						<?php endif; ?>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div id="snackbar" class="top-5 right-5 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
	<div class="ml-3 text-sm font-normal">Order Updated.</div>
</div>

<script>
	function mySnack() {
		// Get the snackbar DIV
		var x = document.getElementById("snackbar");

		// Add the "show" class to DIV
		x.className = "show";

		// After 3 seconds, remove the show class from DIV
		setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
</script>



<?php # print_r($this->cart->contents()); ?>
