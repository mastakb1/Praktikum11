<?php
include('conn2.php');
$case = mysqli_query($conn2, "select * from tb_covid");
while($row = mysqli_fetch_array($case)){
    $country[] = $row['country'];
    $case_total[] = $row['case_total'];
}
?>

<!DOCTYPE html>
<head>
      <title>Bar Chart Kasus Covid</title>
      <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width: 800px; height:800px">
        <canvas id="myChart"></canvas>
    </div>
    
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data:{
                labels: <?php echo json_encode($country);?>,
                datasets : [{
                    label : 'Total Kasus',
                    data: <?php echo json_encode($case_total);?>,

                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth : 1
                }
                ]
            },
            options: {
                scales:{
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