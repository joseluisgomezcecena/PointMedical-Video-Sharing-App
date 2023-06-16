<!--
<div class="row">
	<div class="col-md-6 col-lg-3">
		<div class="card card-hover">
			<div class="card-body">
				<div class="media align-items-center">
					<div class="avatar avatar-icon avatar-lg avatar-blue">
						<i class="anticon anticon-dollar"></i>
					</div>
					<div class="m-l-15">
						<h2 class="m-b-0"><?php echo $waiting ?></h2>
						<p class="m-b-0 text-muted">En Espera</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="card card-hover">
			<div class="card-body">
				<div class="media align-items-center">
					<div class="avatar avatar-icon avatar-lg avatar-cyan">
						<i class="anticon anticon-line-chart"></i>
					</div>
					<div class="m-l-15">
						<h2 class="m-b-0"><?php echo $accepted ?></h2>
						<p class="m-b-0 text-muted">Aceptadas</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="card card-hover">
			<div class="card-body">
				<div class="media align-items-center">
					<div class="avatar avatar-icon avatar-lg avatar-gold">
						<i class="anticon anticon-profile"></i>
					</div>
					<div class="m-l-15">
						<h2 class="m-b-0"><?php echo $prize ?></h2>
						<p class="m-b-0 text-muted">Premiadas</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="card card-hover">
			<div class="card-body">
				<div class="media align-items-center">
					<div class="avatar avatar-icon avatar-lg avatar-purple">
						<i class="anticon anticon-user"></i>
					</div>
					<div class="m-l-15">
						<h2 class="m-b-0"><?php echo $rejected ?></h2>
						<p class="m-b-0 text-muted">Recahzadas</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
-->

<div class="row">
	<div class="col-md-8 col-lg-8"><!--antes 8-->
		<div class="card sb-card-shadow">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center mb-5">
					<h5 class="font-weight-bolder">Monthly Sales.</h5>

					<div>
						<!--
						<div class="btn-group">
							<button class="btn btn-sm btn-dark">
								<span>Ver Reportes</span>
							</button>
						</div>
						-->
					</div>

				</div>

				<div class="chart-container" style="position: relative; width: 100%; height: auto">
					<canvas class="chart" id="andon-chart"></canvas>
				</div>
			</div>
		</div>
	</div>




	<div class="col-md-12 col-lg-4">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5 class="m-b-0 bold">Sales Insights</h5>
				</div>
				<div class="m-t-30">

					<div style="width: 100%;">
						<canvas id="categoryChart"></canvas>
					</div>

					<?php foreach ($recents as $recent): ?>
					<div class="m-b-25">
						<div class="d-flex align-items-center justify-content-between">
							<div class="media align-items-center">
								<div class="font-size-35">
									<i class="anticon anticon-file text-black"></i>
								</div>
								<div class="m-l-15">
									<h6 class="m-b-0">
										<a class="text-dark" href="javascript:void(0);"><?php echo $recent['company'] ?></a>
									</h6>
									<p class="text-muted m-b-0">Enviada: <?php echo $recent['created_at'] ?></p>
								</div>
							</div>
							<div class="dropdown dropdown-animated scale-left">
								<a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
									<i class="anticon anticon-ellipsis"></i>
								</a>
								<div class="dropdown-menu">
									<a href="<?php echo base_url() ?>admin/order/details/<?php echo $recent['po_id'] ?>" class="dropdown-item">
										<i class="anticon anticon-eye"></i>
										<span class="m-l-10">View Order</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
</div>

</div>


	<div class="row">
		<div class="col-md-12 col-lg-12"><!--antes 8-->
			<div class="card sb-card-shadow">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center mb-5">
						<h5 class="font-weight-bolder">Active Orders.</h5>
					</div>


					<table id="data-table" class="table ">
						<thead>
						<tr>
							<th>PO #</th>
							<th>Client</th>
							<th>Total</th>
							<th>Status</th>
							<th>Created</th>
							<th>Updated</th>
							<th>Options</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($orders as $order): ?>
							<tr>
								<td>
									<?php echo $order['po_id']; ?>
								</td>
								<td>
									<?php echo $order['company']; ?> - <?php echo $order['user_name']; ?>
								</td>
								<td>
									<?php echo $order['total']; ?>
								</td>
								<td>
									<?php
									if ($order['status'] == 0){
										echo "Pending";
									}
									elseif ($order['status'] == 1){
										echo "Processing";
									}
									elseif ($order['status'] == 2){
										echo "Shipped";
									}
									?>
								</td>
								<td>
									<?php echo $order['created_at']; ?>
								</td>
								<td>
									<?php echo $order['updated_at']; ?>
								</td>
								<td>
									<div class="float-right">
										<a href="<?php echo base_url() ?>admin/order/cancel/<?php echo $order['po_id'] ?>" class="btn btn-danger"><i class="anticon anticon-stop"></i> Cancel </a>
										<a href="<?php echo base_url() ?>admin/order/details/<?php echo $order['po_id'] ?>" class="btn btn-success"><i class="anticon anticon-edit"></i> Details</a>
									</div>
								</td>

							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>



				</div>
			</div>
		</div>
	</div>










		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	<script>

		$(function(){
			//get the bar chart canvas
			var cData = JSON.parse(`<?php echo $chart_data; ?>`);
			var ctx = $("#andon-chart");


			//bar chart data
			var data = {
				labels: cData.labels,
				datasets: [
					{
						label: "Monthly Sales.",
						data: cData.sales,
						backgroundColor: [
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
							"rgba(0,210,146,0.5)",
						],
						borderColor: [
							"#00c085",
							"#00c085",
							"#00c085",
							"#00c085",
							"#00c085",
							"#00c085",
							"#00c085",
							"#00c085",
							"#00c085",
							"#00c085",
							"#00c085",
							"#00c085",
						],
						borderWidth: [1, 1, 1, 1, 1,1,1,1, 1, 1, 1,1,1]
					}
				]
			};

			//options
			var options = {
				responsive: true,
				title: {
					display: false,
					position: "top",
					text: "Monthly Sales",
					fontSize: 18,
					fontColor: "#111"
				},
				legend: {
					display: false,
					position: "bottom",
					labels: {
						fontColor: "#333",
						fontSize: 12
					}
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						},
						gridLines: {
							/*display: false ,*/
							drawBorder: false,
							offsetGridLines: false,
							drawTicks: false,
							borderDash: [3, 4],
							zeroLineWidth: 1,
							zeroLineBorderDash: [3, 4]
						},
					}],
					xAxes: [{
						gridLines: {
							display: false ,
							color: "#51ffcb"
						},
					}]
				},
			};

			//create bar Chart class object
			var chart1 = new Chart(ctx, {
				type: "bar",
				data: data,
				options: options
			});

		});


	</script>



	<script>
		$(function(){
		var ctx = document.getElementById('categoryChart').getContext('2d');
		var categoryData = <?php echo json_encode($category_data); ?>;

		var labels = [];
		var data = [];
		categoryData.forEach(function(item) {
			labels.push(item.name);
			data.push(item.total_sold);
		});

		new Chart(ctx, {
			type: 'pie',
			data: {
				labels: labels,
				datasets: [{
					data: data,
					backgroundColor: [
						'rgba(255, 99, 132, 0.6)',
						'rgba(54, 162, 235, 0.6)',
						'rgba(255, 206, 86, 0.6)',
						'rgba(75, 192, 192, 0.6)',
						'rgba(153, 102, 255, 0.6)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: true
			}
		});
		});
	</script>
