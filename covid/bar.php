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
<head>
      <title>Bar Chart</title>
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
                    label : 'Total case',
                    data: <?php echo json_encode($case_total);?>,

                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth : 1
                },
                {
                    label : 'New Case',
                    data: <?php echo json_encode($new_case);?>,

                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth : 1
                },
                {
                    label : 'Total Deaths',
                    data: <?php echo json_encode($total_deaths);?>,

                    backgroundColor: 'rgba(231, 76, 60, 0.2)',
                    borderColor:'rgba(231, 76, 60, 1)',
                    borderWidth : 1
                },
                {
                    label : 'New Deaths',
                    data: <?php echo json_encode($new_deaths);?>,

                    backgroundColor: 'rgba(231, 76, 60, 0.2)',
                    borderColor:'rgba(236, 100, 75, 1)',
                    borderWidth : 1
                },
                {
                    label : 'Total Recover',
                    data: <?php echo json_encode($total_recover);?>,

                    backgroundColor: 'rgba(200, 247, 197, 0.2)',
                    borderColor:'rgba(46, 204, 113, 1)',
                    borderWidth : 1
                },
                {
                    label : 'New Recover',
                    data: <?php echo json_encode($new_recover);?>,

                    backgroundColor: 'rgba(147, 250, 165, 0.2)',
                    borderColor:'rgba(46, 204, 113, 1)',
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