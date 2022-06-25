<?php
include 'conn.php';
$case = mysqli_query($conn, "SELECT * FROM tb_kasus");
while ($row = mysqli_fetch_array($case)) {
	$country[] = $row['country'];

	$sql = mysqli_query($conn, "SELECT SUM(case_total) AS Total_Kasus FROM tb_kasus WHERE id='".$row['id']."'");
	$row = $sql->fetch_array();
	$case_total[] = $row['case_total'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menggunakan Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px; height: 800px;">
		<canvas id="myChart"></canvas>
	</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart (ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($country);?>, datasets: [{
					labels: 'Grafik Covid',
					data: <?php echo json_encode($case_total); ?>,

					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255, 99, 132, 1)',
					borderWidth: 1			
				}]
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