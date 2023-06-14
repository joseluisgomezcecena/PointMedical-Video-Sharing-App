






<script src="<?php echo base_url() ?>assets/alpine.js"></script>
<script src="terminal.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url() ?>assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables/dataTables.bootstrap.min.js"></script>

<script>
	//add classes to the table
	function customizeDataTables() {
		// Add Tailwind classes to DataTables components

		// Add classes to the search input field

		$('.dataTables_filter input')
			.addClass('border border-gray-300  px-4 py-2 rounded-xl shadow-sm m-2')
			.attr('placeholder', 'Search Products...').removeClass('form-control form-control-sm');

		$('.dataTables_length select')
			.addClass('border border-gray-300 rounded-md px-4 py-2').removeClass('form-control form-control-sm');


		// Add classes to the table
		$('.dataTables_wrapper table')
			.addClass('w-full whitespace-no-wrap');


		// Add classes to the table header cells
		$('.dataTables_wrapper thead th')
			.addClass('px-4 py-2 text-left');

		// Add classes to the table body
		$('.dataTables_wrapper tbody')
			.addClass('bg-white divide-y divide-gray-200');

		// Add classes to the table rows
		$('.dataTables_wrapper tbody tr')
			.addClass('hover:bg-gray-50');

		// Add classes to the table cells
		$('.dataTables_wrapper tbody td')
			.addClass('px-4 py-2');


		/*
		$('.dataTables_paginate li').addClass('py-1 px-2 m-1 rounded-md border border-gray-300');


		$('.dataTables_paginate a').addClass('px-2 py-1 rounded-md border border-gray-300');
		*/

	}



	$('#data-table').DataTable({
		"responsive": "true",
		"language": {
			"search":"Search: ",
			"lengthMenu": "Show _MENU_ ",
		}
	});
	customizeDataTables();

</script>


<script>
	var text = ["Web Apps", "Mobile Apps", "Desktop", "Web Sites", "And More..."];
	var counter = 0;
	var elem = $("#greeting");
	setInterval(change, 2500);
	function change() {
		elem.fadeOut(function(){
			elem.html(text[counter]);
			counter++;
			if(counter >= text.length) { counter = 0; }
			elem.fadeIn();
		});
	}
</script>


<script>
	/*
	function handleIntersection(entries, observer) {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				entry.target.classList.add('animate__fadeInRight');
				entry.target.classList.remove('opacity-0');
				entry.target.classList.add('opacity-100');
				entry.target.classList.add('animate__slow');
				observer.unobserve(entry.target);
			}
		});
	}

	const observer = new IntersectionObserver(handleIntersection, {
		threshold: 0.5,
	});

	const targetElements = document.querySelectorAll('.animate__animated');
	targetElements.forEach((element) => {
		observer.observe(element);
	});
*/
</script>

<script>
	function handleIntersection(entries, observer) {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				const animationClass = entry.target.getAttribute('data-animation');
				entry.target.classList.add(animationClass);
				entry.target.classList.remove('opacity-0');
				entry.target.classList.add('opacity-100');
				entry.target.classList.add('animate__slow');

				observer.unobserve(entry.target);
			}
		});
	}

	const observer = new IntersectionObserver(handleIntersection, {
		threshold: 0.5,
	});

	const targetElements = document.querySelectorAll('.animate__animated');
	targetElements.forEach((element) => {
		observer.observe(element);
	});
</script>

</body>
</html>
