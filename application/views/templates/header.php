<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Avanti Manufacturing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="data:image/svg+xml,&lt;svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22&gt;&lt;text y=%22.9em%22 font-size=%2290%22&gt;📲&lt;/text&gt;&lt;/svg&gt;">
	<link rel="stylesheet" href="styles.css">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-rounded/css/uicons-thin-rounded.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<script src="https://cdn.tailwindcss.com"></script>

	<style>

		.sec{
			opacity: 0;
		}

        .opacity-0{
            opacity: 0;
        }

        .border-b{
            border-bottom-width: 0 !important;
            border: none !important;
        }

        body{
            -webkit-animation: fadeIn 1 1s ease-out;
            -moz-animation: fadeIn 1 1s ease-out;
            -o-animation: fadeIn 1 1s ease-out;
            animation: fadeIn 1 1s ease-out;
        }



        @media (max-width: 576px) {
            /* Styles for extra small devices */
            .top-margins
            {
                margin-top: -50px;
            }
			.logo-img
			{
				width: 180px !important;
				height: auto;
			}



        }

        @media (min-width: 576px) and (max-width: 767px) {
            /* Styles for small devices */
        }

        @media (min-width: 768px) and (max-width: 991px) {
            /* Styles for medium devices */
			.logo-img
			{
				width: 150px;
				height: auto;
			}
			.nav-text{
				font-size: 11px !important;
			}

			.btn-nav{
				font-size: 10px !important;
			}

        }

        @media (min-width: 992px) and (max-width: 1199px) {
            /* Styles for large devices */
			.logo-img
			{
				width: 150px;
				height: auto;
			}
			.nav-text{
				font-size: 12px !important;
			}
			.btn-nav{
				font-size: 11px !important;
			}
        }

        @media (min-width: 1200px) {
            /* Styles for extra large devices */
			.logo-img
			{
				width: 196px;
				height: auto;
			}
        }













        .blink_me {
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .cardz:hover > .cardz-content > .cardz-subtitle > .cardz-subtitle-word {
            opacity: 1;
            transform: translateY(0%);
            transition: opacity 0ms, transform 200ms cubic-bezier(.90, .06, .15, .90);
        }


        #section-hero {
            background: linear-gradient(-45deg, #ff4009, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: auto;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .custom_button{
            background-color: #ea2845;
        }

        .custom_button:hover{
            background-color: #c4112b;
        }

		.dropdown-options:hover .absolute {
			display: block;
		}


		/* The snackbar - position it at the bottom and in the middle of the screen */
		#snackbar {
			visibility: hidden; /* Hidden by default. Visible on click */
			min-width: 250px; /* Set a default minimum width */
			margin-left: -125px; /* Divide value of min-width by 2 */
			background-color: #333; /* Black background color */
			color: #fff; /* White text color */
			text-align: center; /* Centered text */
			border-radius: 25px; /* Rounded borders */
			padding: 16px; /* Padding */
			position: fixed; /* Sit on top of the screen */
			z-index: 1; /* Add a z-index if needed */
			left: 50%; /* Center the snackbar */
			bottom: 30px; /* 30px from the bottom */
		}

		/* Show the snackbar when clicking on a button (class added with JavaScript) */
		#snackbar.show {
			visibility: visible; /* Show the snackbar */
			/* Add animation: Take 0.5 seconds to fade in and out the snackbar.
			However, delay the fade out process for 2.5 seconds */
			-webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
			animation: fadein 0.5s, fadeout 0.5s 2.5s;
		}

		/* Animations to fade the snackbar in and out */
		@-webkit-keyframes fadein {
			from {bottom: 0; opacity: 0;}
			to {bottom: 30px; opacity: 1;}
		}

		@keyframes fadein {
			from {bottom: 0; opacity: 0;}
			to {bottom: 30px; opacity: 1;}
		}

		@-webkit-keyframes fadeout {
			from {bottom: 30px; opacity: 1;}
			to {bottom: 0; opacity: 0;}
		}

		@keyframes fadeout {
			from {bottom: 30px; opacity: 1;}
			to {bottom: 0; opacity: 0;}
		}

	</style>


</head>
<body>


<!--NAVIGATION-->
<section class="w-full px-6 pb-12 antialiased bg-white shadow-lg" data-tails-scripts="//unpkg.com/alpinejs">
	<div  class="mx-auto max-w-7xl">

		<nav  class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
			<div class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0">
				<div class="flex items-center justify-start sm:w-1/2 md:w-1/4  h-full pr-4">
					<a href="#_" class="inline-block py-4 md:py-0">
						<span class="p-1 text-3xl font-black leading-none text-gray-900">
							<img  class="logo-img" src="<?php echo base_url('assets/avanti.png') ?>" alt="Avanti Logo">
						</span>
					</a>
				</div>
				<div class="nav-text   sm:w-1/2 top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex" :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
					<div class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
						<a href="#_" class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">tails<span class="text-indigo-600">.</span></a>
						<div class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-1/2 md:mt-0 md:flex-row md:items-center">
							<a
								href="<?php echo base_url() ?>" class="inline-block w-full py-2 mx-0 ml-6 font-medium text-left text-lime-600 md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Home</a>
							<a
								href="<?php echo base_url() ?>catalog" class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-lime-600 lg:mx-3 md:text-center">Catalog</a>
							<a


							<a href="<?php echo base_url() ?>contact" class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-lime-600 lg:mx-3 md:text-center">
								Contact
							</a>


							<?php if (isset($this->session->userdata['logged_in'])):?>

							<a href="<?php echo base_url() ?>previous-orders" class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-lime-600 lg:mx-3 md:text-center">My Orders</a>

							<?php endif; ?>


						</div>
						<div class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/2 md:flex-row md:py-0">

							<?php if ($this->session->userdata('logged_in')) : ?>

								<a href="<?php echo base_url() ?>auth/logout" class=" w-full px-3 py-2 mr-0 text-gray-700 md:mr-2 lg:mr-3 md:w-auto">
									Logout
								</a>

							<span  class="relative inline-flex w-full md:w-auto lg:m-2">
								<a href="<?php echo base_url() ?>order-summary" class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-lime-600 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-lime-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600 btn-nav">


									<svg fill="#ffffff" height="15px" width="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										 viewBox="0 0 511.999 511.999" xml:space="preserve">
									<g>
										<g>
											<path d="M434.83,1.624c-7.967-3.301-17.148-1.478-23.249,4.625L383.999,33.83L356.418,6.249c-8.33-8.331-21.838-8.331-30.17,0
												L298.666,33.83L271.085,6.249c-8.33-8.331-21.838-8.331-30.169,0L213.333,33.83L185.752,6.249c-8.33-8.331-21.838-8.331-30.169,0
												L128,33.83L100.419,6.249c-6.1-6.103-15.277-7.926-23.249-4.625C69.198,4.927,64,12.705,64,21.333v469.332
												c0,11.782,9.552,21.333,21.333,21.333h341.332c11.782,0,21.333-9.552,21.333-21.333V21.333
												C447.999,12.705,442.802,4.927,434.83,1.624z M298.666,426.667h-128c-11.782,0-21.333-9.553-21.333-21.333
												c0-11.783,9.552-21.333,21.333-21.333h128c11.782,0,21.333,9.55,21.333,21.333C319.999,417.114,310.447,426.667,298.666,426.667z
												 M341.332,341.334H170.666c-11.782,0-21.333-9.553-21.333-21.333c0-11.783,9.552-21.333,21.333-21.333h170.666
												c11.782,0,21.333,9.55,21.333,21.333C362.666,331.781,353.114,341.334,341.332,341.334z M149.333,234.667
												c0-11.783,9.552-21.333,21.333-21.333h128c11.782,0,21.333,9.55,21.333,21.333c0,11.78-9.552,21.333-21.333,21.333h-128
												C158.885,256.001,149.333,246.448,149.333,234.667z M341.332,170.668H170.666c-11.782,0-21.333-9.553-21.333-21.333
												c0-11.783,9.552-21.333,21.333-21.333h170.666c11.782,0,21.333,9.55,21.333,21.333
												C362.666,161.115,353.116,170.668,341.332,170.668z"/>
										</g>
									</g>
									</svg>
									My Order

								</a>
								 <span id="cart-item-count" class="absolute top-0 right-0 px-2 py-1 -mt-3  text-xs font-medium leading-tight text-white bg-rose-600 rounded-full">
									 <?php  echo $this->cart->total_items(); ?>
          						 </span>
							</span>




							<?php endif; ?>

							<a
								href="<?php echo base_url()?><?php if ($this->session->userdata('logged_in')){ echo "catalog";}else{ echo "auth/login";}  ?>" class="btn-nav inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-lime-600 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-lime-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600">
								Purchase Products
							</a>
						</div>
					</div>
				</div>
				<div
					@click="showMenu = !showMenu" class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">

					<svg
						class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
						<path
							d="M4 6h16M4 12h16M4 18h16"></path>
					</svg>
					<svg
						class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak>
						<path
							stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</div>
			</div>




		</nav>
	</div>
</section>


