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

			<h1 style="margin-top: -25px;" class="text-3xl font-bold mb-4">Your Order: <span class="text-lime-500"><?php echo "PO-" . $order['po_id'] ?></span>.</h1>
			<p class="mb-5 text-gray-500">
				Thank you for your order. Your order has been placed and will be processed shortly. You will be receiving an email shortly with confirmation of your order.
			</p>

			<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
				<?php if (isset($this->session->userdata['logged_in'])):?>
				<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
					<thead class="text-xs text-gray-700 uppercase dark:text-gray-400">

					<tr>
						<th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
							Product name
						</th>
						<th scope="col" class="px-6 py-3">
							Price
						</th>
						<th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
							Quantity
						</th>
						<th scope="col" class="px-6 py-3">
							Price
						</th>
					</tr>

					</thead>
					<tbody>
					<?php
					$total_price = 0;
					foreach ($order_items as $item) :
					?>
					<tr class="border-b border-gray-200 dark:border-gray-700">
						<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
							<?php echo $item['name']; ?>
						</th>
						<td class="px-6 py-4">
							<?php echo "$" . $item['price']; ?>
						</td>
						<td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
							<?php echo $item['qty']; ?>
						</td>
						<td class="px-6 py-4">
							<?php echo "$" . $price =  $item['price'] * $item['qty']; ?>
						</td>
					</tr>

					<?php
						$total_price += $price;
					?>

					<?php endforeach; ?>
					</tbody>
					<tfoot>
					<tr>
						<td colspan="3" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800"></td>
						<td class="px-6 py-4">
							<h2 style="font-size: 20px;"><b>Total: </b><b class="text-lime-400"><?php echo "$" . $total_price; ?></b></h2>
						</td>
					</tr>
					</tfoot>
				</table>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

