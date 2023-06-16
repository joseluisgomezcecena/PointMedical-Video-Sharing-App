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
<script>
	$(document).ready(function() {
		$('.add-to-cart').on('click', function(e) {
			e.preventDefault();
			var product_id = $(this).data('product-id');
			var quantity = $(this).siblings('.quantity').val();

			$.ajax({
				url: '<?php echo base_url('cart/add_to_cart'); ?>',
				method: 'POST',
				data: {
					product_id: product_id,
					quantity: quantity
				},
				success: function(response) {
					console.log(response);
					//alert('Product added to cart!'+ product_id + ' quantity ' + quantity);
					refreshCartTable();
					countCartItems();
					mySnack()
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
					alert('An error occurred. Please try again.');
				}
			});
		});


		$('.cart-container').on('click', '.update-cart', function(e) {
			e.preventDefault();
			var row_id = $(this).data('row-id');
			var quantity = $(this).siblings('.quantity').val();

			$.ajax({
				url: '<?php echo site_url('cart/update_cart'); ?>',
				method: 'POST',
				data: {
					row_id: row_id,
					quantity: quantity
				},
				success: function(response) {
					console.log(response);
					//alert('Cart updated successfully!');
					refreshCartTable(); // Refresh the cart table
					countCartItems();
					mySnack();
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
					alert('An error occurred. Please try again.');
				}
			});
		});

		$('.cart-container').on('click', '.remove-from-cart', function(e) {
			e.preventDefault();
			var row_id = $(this).data('row-id');

			$.ajax({
				url: '<?php echo site_url('cart/remove_from_cart'); ?>',
				method: 'POST',
				data: {
					row_id: row_id
				},
				success: function(response) {
					console.log(response);
					//alert('Product removed from cart!');
					refreshCartTable(); // Refresh the cart table
					countCartItems();
					mySnack();
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
					alert('An error occurred. Please try again.');
				}
			});
		});

		// Function to refresh the cart table
		function refreshCartTable() {
			$.ajax({
				url: '<?php echo site_url('cart/get_cart_table'); ?>',
				method: 'GET',
				success: function(response) {
					$('.cart-container').html(response);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
				}
			});
		}


		function countCartItems() {
			$.ajax({
				url: '<?php echo site_url('cart/count_cart_items'); ?>',
				method: 'GET',
				success: function(response) {
					$('.cart-count').html(response);
					$("#cart-item-count").html(response);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
				}
			});
		}




		/*
		$('.update-cart').on('click', function(e) {
			e.preventDefault();
			var row_id = $(this).data('row-id');
			var quantity = $(this).siblings('.quantity').val();

			$.ajax({
				url: '<?php echo site_url('cart/update_cart'); ?>',
				method: 'POST',
				data: {
					row_id: row_id,
					quantity: quantity
				},
				success: function(response) {
					console.log(response);
					alert('Cart updated successfully!');
					//window.location.reload(); // Refresh the page
					refreshCartTable();
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
					alert('An error occurred. Please try again.');
				}
			});
		});




		$('.remove-from-cart').on('click', function(e) {
			e.preventDefault();
			var row_id = $(this).data('row-id');

			$.ajax({
				url: '<?php echo site_url('cart/remove_from_cart'); ?>',
				method: 'POST',
				data: {
					row_id: row_id
				},
				success: function(response) {
					console.log(response);
					alert('Product removed from cart!');
					//window.location.reload(); // Refresh the page
					refreshCartTable();
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
					alert('An error occurred. Please try again.');
				}
			});
		});




		function refreshCartTable() {
			$.ajax({
				url: '<?php echo site_url('cart/get_cart_table'); ?>',
				method: 'GET',
				success: function(response) {
					$('#cart-table').html(response);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.status);
					console.log(thrownError);
				}
			});
		}

		*/


	});


</script>

<section class="py-12 sm:py-16">
	<div class="flex max-w-screen-xl px-4 py-4 mx-auto lg:gap-8 xl:gap-0 lg:py-8">
		<div  class="w-full">

			<div class="flex flex-col">
				<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">




						<?php if (isset($this->session->userdata['logged_in'])):?>
							<!--cart-->
							<div id="my-order" class="relative overflow-x-auto">
								<table class="cart-container w-full text-sm text-left text-gray-500 dark:text-gray-400" id="cart-table">
									<thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
									<tr>
										<th scope="col" class="px-6 py-3 rounded-l-lg">Name</th>
										<th scope="col" class="px-6 py-3 ">Price</th>
										<th scope="col" class="px-6 py-3">Quantity</th>
										<th scope="col" class="px-6 py-3">Total</th>
										<th scope="col" class="px-6 py-3 rounded-r-lg">Action</th>
									</tr>
									</thead>
									<tbody class="bg-white divide-y divide-gray-200">
									<?php foreach ($this->cart->contents() as $item) { ?>
										<tr>
											<td><?php echo $item['name']; ?></td>
											<td><?php echo $item['price']; ?></td>
											<td>
												<input style="width: 100px;" type="number" min="1" value="<?php echo $item['qty']; ?>" class="quantity bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
												<a href="#" class="update-cart" data-row-id="<?php echo $item['rowid']; ?>">Update</a>
											</td>
											<td><?php echo $item['subtotal']; ?></td>
											<td>
												<a href="#" class="remove-from-cart" data-row-id="<?php echo $item['rowid']; ?>">Remove</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
									<tfoot>
									<tr>
										<td colspan="3"></td>
										<td><strong>Total:</strong></td>
										<td><?php echo $this->cart->total(); ?></td>
									</tr>
									</tfoot>
								</table>
							</div>
							<!--cart end-->

							<div>

								<?php echo form_open(base_url() . 'orders/create') ?>

								<button class="text-white bg-red-500 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-5">
									<!--trash can svg-->
									<svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M3 5C3 3.89543 3.89543 3 5 3H15C16.1046 3 17 3.89543 17 5V6H18C18.5523 6 19 6.44772 19 7C19 7.55228 18.5523 8 18 8H2C1.44772 8 1 7.55228 1 7C1 6.44772 1.44772 6 2 6H3V5ZM5 5H15V6H5V5ZM17 9V17C17 18.1046 16.1046 19 15 19H5C3.89543 19 3 18.1046 3 17V9H17ZM7 11C7 10.4477 7.44772 10 8 10C8.55228 10 9 10.4477 9 11V15C9 15.5523 8.55228 16 8 16C7.44772 16 7 15.5523 7 15V11ZM11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11V15C13 15.5523 12.5523 16 12 16C11.4477 16 11 15.5523 11 15V11Z" />
									</svg>
									Clear Order
								</button>

								<button style="float: right;" class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-5">
									Finish Order
								</button>

								<?php echo form_close(); ?>


							</div>
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
