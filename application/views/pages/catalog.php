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
					alert('Product added to cart!'+ product_id + ' quantity ' + quantity);
					refreshCartTable();
					countCartItems();
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
					alert('Cart updated successfully!');
					refreshCartTable(); // Refresh the cart table
					countCartItems();
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
					alert('Product removed from cart!');
					refreshCartTable(); // Refresh the cart table
					countCartItems();
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
						<button id="show-cart" class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-5" >
							Show Order<!--.-->
						</button>


						<div id="my-order" class="relative overflow-x-auto">
							<table class="cart-container w-1/2 text-sm text-left text-gray-500 dark:text-gray-400" id="cart-table">
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
						<?php else: ?>

							<p class="mb-5">To place an order you must sign-in. If you do not have an account please contact our sales team <a class="text-lime-600" href="<?php echo base_url() ?>contact">Here</a>.</p>


						<a  href="<?php echo base_url() ?>auth/login" class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-5" >
							Sign in to order
						</a>
						<?php endif; ?>



						<div class="shadow p-5 overflow-hidden border-b border-gray-200 sm:rounded-lg">


							<table style="font-size: 13px;" id="data-table" class="min-w-full divide-y divide-gray-200">
								<thead>
								<tr>
									<th style="width: 25%" scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

									</th>
									<th style="width: 10%" scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Part number
									</th>
									<th style="width: 10%" scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Product
									</th>
									<th style="width: 10%" scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Category
									</th>
									<th style="width: 20%" scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Description
									</th>

									<?php if (isset($this->session->userdata['logged_in'])):?>
									<th style="width: 10%" scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Product Price
									</th>
									<?php endif; ?>

									<th style="width: 15%" scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
									<td><?php echo $product['category_name']; ?>-<span class="text-emerald-500 font-bold"><?php echo $product['sub_name']; ?></span></td>
									<td><?php echo $product['description'] ?></td>

									<?php if (isset($this->session->userdata['logged_in'])):?>
										<td><?php echo "$" . $product['product_price']; ?></td>
									<?php endif; ?>

									<td>
										<?php if (isset($this->session->userdata['logged_in'])):?>

											<input style="width: 120px;" type="number" min="1" value="1" class="quantity bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2" placeholder="Quantity">

											<a href="#" data-product-id="<?php echo $product['id']; ?>"  class="add-to-cart text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-2" >
												Add to order
											</a>
										<?php endif; ?>

										<a class="text-black bg-white hover:bg-[#cbd5e1]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-2" href="<?php echo base_url() ?>details/<?php echo $product['id']; ?>">
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



<?php # print_r($this->cart->contents()); ?>

<script>
	//hide div with id my-order.
	$(document).ready(function () {
		$("#my-order").hide();
	});

	//if button with id my-order-btn is clicked, show div with id my-order.
	$(document).ready(function () {
		$("#show-cart").click(function () {
			if($("#my-order").is(":hidden"))
			{
				$("#my-order").show(300);
				//change button text to hide cart.
				$("#show-cart").text("Hide Order.");
			}
			else
			{
				$("#my-order").hide(300);
				//change button text to show cart.
				$("#show-cart").text("Show Order.");
			}
		});
	});

</script>
