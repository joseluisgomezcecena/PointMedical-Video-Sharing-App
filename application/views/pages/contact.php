<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<section class="py-12 sm:py-16">
	<div class="flex max-w-screen-xl px-4 py-4 mx-auto lg:gap-8 xl:gap-0 lg:py-8">
		<div  class="w-full">
			<div class="-my-10 flex flex-col">
				<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					<div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
						<div class="max-w-4xl mx-auto bg-white">
							<h1 class="text-3xl font-bold mb-6">Contact Sales</h1>
							<p class="mb-10">Please fill out the form below and we will get back to you as soon as possible.</p>


							<div id="message-container"></div>


							<form id="contact-form" method="post" class="mb-5">
								<div class="grid gap-6 mb-6 lg:grid-cols-2">
									<div>
										<label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First name</label>
										<input type="text" id="first_name" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
									</div>
									<div>
										<label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last name</label>
										<input type="text" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
									</div>
									<div>
										<label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number</label>
										<input type="tel" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+01 123-456-789"  required>
									</div>
									<div>
										<label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
										<input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="your@email.com" required>
									</div>


								</div>

								<div class="mb-6">
									<label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Message</label>
									<textarea id="message" name="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message." required></textarea>
								</div>

								<div class="flex items-start mb-6">
									<div class="flex items-center h-5">
										<input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
									</div>
									<label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">I consent to share my information  <!--<a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>-->.</label>
								</div>


								<button id="sender" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
									Send Message
								</button>

								<div id="loader" style="text-align: center;">
									<div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
										<span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
									</div>
									Sending...
								</div>
							</form>



						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	//send email with ajax.
	$(document).ready(function() {

		$('#loader').css('display', 'none');


		$('#contact-form').submit(function(e) {
			e.preventDefault();
			const first_name = $('#first_name').val();
			const last_name = $('#last_name').val();
			const phone = $('#phone').val();
			const email = $('#email').val();
			const message = $('#message').val();

			//display none on button
			$('#sender').css('display', 'none');
			$('#loader').css('display', 'block');

			//display loading



			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>email/send",
				data: {
					first_name: first_name,
					last_name: last_name,
					phone: phone,
					email: email,
					message: message
				},
				success: function(data) {
					$('#loader').css('display', 'none');
					$('#sender').css('display', 'block');
					$('#contact-form')[0].reset();
					$('#message-container').html('<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-5" role="alert"><div class="flex"><div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg></div><div><p class="font-bold">Success!</p><p class="text-sm">Your message has been sent successfully.</p></div></div></div>')

				},
				error: function() {
					$('#message-container').html('<div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md mb-5" role="alert"><div class="flex"><div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg></div><div><p class="font-bold">Success!</p><p class="text-sm">Your message has been sent successfully.</p></div></div></div>')
				}
			});
		});

	});
</script>
