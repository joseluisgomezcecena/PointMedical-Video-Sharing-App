<section class="py-12 sm:py-16">
	<div class="container max-w-screen-xl mx-auto px-4">
		<nav class="flex">
			<ol role="list" class="flex items-center">
				<li class="text-left">
					<div class="-m-1">
						<a href="#" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> Home </a>
					</div>
				</li>

				<li class="text-left">
					<div class="flex items-center">
						<span class="mx-2 text-gray-400">/</span>
						<div class="-m-1">
							<a href="#" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> <?php echo $product['category_name']; ?> </a>
						</div>
					</div>
				</li>

				<li class="text-left">
					<div class="flex items-center">
						<span class="mx-2 text-gray-400">/</span>
						<div class="-m-1">
							<a href="#" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800" aria-current="page"> <?php echo $product['sub_name']; ?> </a>
						</div>
					</div>
				</li>
			</ol>
		</nav>

		<div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
			<div class="lg:col-span-3 lg:row-end-1">
				<div class="lg:flex lg:items-start">
					<div class="lg:order-2 lg:ml-5">
						<div class="max-w-xl overflow-hidden rounded-lg">
							<img class="h-full w-full max-w-full object-cover" src="<?php echo base_url() ?>uploads/<?php echo $product['image_url']; ?>" alt="" />
						</div>
					</div>
				</div>
			</div>

			<div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
				<h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl"><?php echo $product['name']; ?></h1>

				<div class="mt-5 mb-5 flex items-center">
					<div class="flex items-center"></div>
					<span class="ml-2 text-sm font-medium text-gray-500">
						Reference Number:
					</span>
					<span class="ml-2 text-sm font-medium text-emerald-500">
						<?php echo $product['number'] ?>
					</span>
				</div>

				<h1 class="text-3xl font-bold">Description</h1>
				<h2 class="mt-8 text-base text-gray-900">
					<?php echo $product['description'] ?>
				</h2>
				<h2 class="mt-8 text-base text-gray-900"><?php echo $product['notes'] ?></h2>


				<?php if (isset($this->session->userdata['logged_in'])):?>

				<div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
					<div class="flex items-end">
						<h1 class="text-3xl font-bold">$<?php echo $product['product_price'] ?></h1>
					</div>


					<input style="width: 120px;" type="number" min="1" value="1" class="quantity bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-6" placeholder="Quantity">




					<button type="button" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-gray-900 bg-none px-12 py-3 text-center text-base font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
						<svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
						</svg>
						Add to cart
					</button>




				</div>
				<?php endif; ?>

				<ul class="mt-8 space-y-2">
					<li class="flex items-center text-left text-sm font-medium text-gray-600">
						<svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
						</svg>
						Shipping worldwide
					</li>
				</ul>
			</div>

			<!--
			<div class="lg:col-span-3">
				<div class="border-b border-gray-300">
					<nav class="flex gap-4">
						<a href="#" title="" class="border-b-2 border-gray-900 py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800"> Description </a>

						<a href="#" title="" class="inline-flex items-center border-b-2 border-transparent py-4 text-sm font-medium text-gray-600">
							Reviews
							<span class="ml-2 block rounded-full bg-gray-500 px-2 py-px text-xs font-bold text-gray-100"> 1,209 </span>
						</a>
					</nav>
				</div>

				<div class="mt-8 flow-root sm:mt-12">
					<h1 class="text-3xl font-bold">Delivered To Your Door</h1>
					<p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia accusantium nesciunt fuga.</p>
					<h1 class="mt-8 text-3xl font-bold">From the Fine Farms of Brazil</h1>
					<p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio numquam enim facere.</p>
					<p class="mt-4">Amet consectetur adipisicing elit. Optio numquam enim facere. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore rerum nostrum eius facere, ad neque.</p>
				</div>
			</div>
			-->

		</div>
	</div>
</section>
