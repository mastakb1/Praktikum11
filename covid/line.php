<?php
include('conn2.php');
$case = mysqli_query($conn2, "select * from tb_covid");
while($row = mysqli_fetch_array($case)){
    $country[] = $row['country'];
    $case_total[] = $row['case_total'];
    $new_case[] = $row['new_case'];
    $total_deaths[] = $row['total_deaths'];
    $new_deaths[] = $row['new_deaths'];
    $total_recover[] = $row['total_recover'];
    $new_recover[] = $row['new_recover'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Line Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($country); ?>,
				datasets: [{
					label: 'Total Case',
					data: <?php echo json_encode($case_total); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				},
				{
					label: 'New Case',
					data: <?php echo json_encode($new_case); ?>,
					backgroundColor: 'rgba(62, 166, 250, 0.2)',
					borderColor: 'rgba(62, 166, 250,1)',
					borderWidth: 1
				},
				{
					label: 'Total Deaths',
					data: <?php echo json_encode($total_deaths); ?>,
					backgroundColor: 'rgba(247, 222, 32, 0.2)',
					borderColor: 'rgba(247, 222, 32,1)',
					borderWidth: 1
				},
				{
					label: 'New Deaths',
					data: <?php echo json_encode($new_deaths); ?>,
					backgroundColor: 'rgba(255, 159, 56, 0.2)',
					borderColor: 'rgba(255, 159, 56,1)',
					borderWidth: 1
				},
				{
					label: 'Total Recovered',
					data: <?php echo json_encode($total_recover); ?>,
					backgroundColor: 'rgba(86, 245, 128, 0.2)',
					borderColor: 'rgba(86, 245, 128,1)',
					borderWidth: 1
				},
				{
					label: 'New Recovered',
					data: <?php echo json_encode($new_recover); ?>,
					backgroundColor: 'rgba(139, 71, 255, 0.2)',
					borderColor: 'rgba(139, 71, 255,1)',
					borderWidth: 1
				},
				]
			},

			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>