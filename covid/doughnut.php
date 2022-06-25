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
      <title>Doughnut Chart</title>
      <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width: 800px; height:800px">
    <h2 style="font-family: sans-serif;">Total Case</h2>
    <canvas id="myChart"></canvas><br><br>

    <h2 style="font-family: sans-serif;">New Case</h2>
    <canvas id="myChart2"></canvas><br><br>

    <h2 style="font-family: sans-serif;">Total Deaths</h2>
    <canvas id="myChart3"></canvas><br><br>

    <h2 style="font-family: sans-serif;">New Deaths</h2>
    <canvas id="myChart4"></canvas><br><br>

    <h2 style="font-family: sans-serif;">Total Recover</h2>
    <canvas id="myChart5"></canvas><br><br>

    <h2 style="font-family: sans-serif;">New Recover</h2>
    <canvas id="myChart6"></canvas><br><br>
    </div>
    
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart (ctx, {
            type: 'doughnut',
            data: {
            //membuat label
                labels: <?php echo json_encode($country);?>,
                datasets: [{
                    //grafik untuk Total Case
                    label: 'Total Case',
                    data:<?php echo json_encode($case_total); ?>,
                    backgroundColor: [
                        "rgba(15, 10, 222, 0.4)", 
                        "rgba(20, 205, 200, 0.4)", 
                        "rgba(147, 250, 165, 0.4)", 
                        "rgba(108, 122, 137, 0.4)", 
                        "rgba(150, 54, 148, 0.4)", 
                        "rgba(249, 105, 14, 0.4)", 
                        "rgba(219, 10, 91, 0.4)", 
                        "rgba(165, 55, 253, 0.4)", 
                        "rgba(175, 65, 84, 0.4)", 
                        "rgba(240, 255, 0, 0.4)"
                    ],
                    borderColor: [
                        "rgba(15, 10, 222, 1)", 
                        "rgba(20, 205, 200, 1)", 
                        "rgba(147, 250, 165, 1)", 
                        "rgba(108, 122, 137, 1)", 
                        "rgba(150, 54, 148, 1)", 
                        "rgba(249, 105, 14, 1)", 
                        "rgba(219, 10, 91, 1)", 
                        "rgba(165, 55, 253, 1)", 
                        "rgba(175, 65, 84, 1)", 
                        "rgba(240, 255, 0, 1)"
                    ],
                }],
            },
            options: {
                scales: {
                }
            }
        });

        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart (ctx, {
            type: 'doughnut',
            data: {
            //membuat label
                labels: <?php echo json_encode($country);?>,
                datasets: [{
                    //grafik untuk New Case
                    label: 'New Case',
                    data:<?php echo json_encode($new_case); ?>,
                    backgroundColor: [
                        "rgba(15, 10, 222, 0.4)", 
                        "rgba(20, 205, 200, 0.4)", 
                        "rgba(147, 250, 165, 0.4)", 
                        "rgba(108, 122, 137, 0.4)", 
                        "rgba(150, 54, 148, 0.4)", 
                        "rgba(249, 105, 14, 0.4)", 
                        "rgba(219, 10, 91, 0.4)", 
                        "rgba(165, 55, 253, 0.4)", 
                        "rgba(175, 65, 84, 0.4)", 
                        "rgba(240, 255, 0, 0.4)"
                    ],
                    borderColor: [
                        "rgba(15, 10, 222, 1)", 
                        "rgba(20, 205, 200, 1)", 
                        "rgba(147, 250, 165, 1)", 
                        "rgba(108, 122, 137, 1)", 
                        "rgba(150, 54, 148, 1)", 
                        "rgba(249, 105, 14, 1)", 
                        "rgba(219, 10, 91, 1)", 
                        "rgba(165, 55, 253, 1)", 
                        "rgba(175, 65, 84, 1)", 
                        "rgba(240, 255, 0, 1)"
                    ],
                }],
            },
            options: {
                scales: {
                }
            }
        });

        var ctx = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart (ctx, {
            type: 'doughnut',
            data: {
            //membuat label
                labels: <?php echo json_encode($country);?>,
                datasets: [{
                    //grafik untuk Total Deaths
                    label: 'Total Deaths',
                    data:<?php echo json_encode($total_deaths); ?>,
                    backgroundColor: [
                        "rgba(15, 10, 222, 0.4)", 
                        "rgba(20, 205, 200, 0.4)", 
                        "rgba(147, 250, 165, 0.4)", 
                        "rgba(108, 122, 137, 0.4)", 
                        "rgba(150, 54, 148, 0.4)", 
                        "rgba(249, 105, 14, 0.4)", 
                        "rgba(219, 10, 91, 0.4)", 
                        "rgba(165, 55, 253, 0.4)", 
                        "rgba(175, 65, 84, 0.4)", 
                        "rgba(240, 255, 0, 0.4)"
                    ],
                    borderColor: [
                        "rgba(15, 10, 222, 1)", 
                        "rgba(20, 205, 200, 1)", 
                        "rgba(147, 250, 165, 1)", 
                        "rgba(108, 122, 137, 1)", 
                        "rgba(150, 54, 148, 1)", 
                        "rgba(249, 105, 14, 1)", 
                        "rgba(219, 10, 91, 1)", 
                        "rgba(165, 55, 253, 1)", 
                        "rgba(175, 65, 84, 1)", 
                        "rgba(240, 255, 0, 1)"
                    ],
                }],
            },
            options: {
                scales: {
                }
            }
        });

        var ctx = document.getElementById("myChart4").getContext('2d');
        var myChart = new Chart (ctx, {
            type: 'doughnut',
            data: {
            //membuat label
                labels: <?php echo json_encode($country);?>,
                datasets: [{
                    //grafik untuk New Deaths
                    label: 'New Deaths',
                    data:<?php echo json_encode($new_deaths); ?>,
                    backgroundColor: [
                        "rgba(15, 10, 222, 0.4)", 
                        "rgba(20, 205, 200, 0.4)", 
                        "rgba(147, 250, 165, 0.4)", 
                        "rgba(108, 122, 137, 0.4)", 
                        "rgba(150, 54, 148, 0.4)", 
                        "rgba(249, 105, 14, 0.4)", 
                        "rgba(219, 10, 91, 0.4)", 
                        "rgba(165, 55, 253, 0.4)", 
                        "rgba(175, 65, 84, 0.4)", 
                        "rgba(240, 255, 0, 0.4)"
                    ],
                    borderColor: [
                        "rgba(15, 10, 222, 1)", 
                        "rgba(20, 205, 200, 1)", 
                        "rgba(147, 250, 165, 1)", 
                        "rgba(108, 122, 137, 1)", 
                        "rgba(150, 54, 148, 1)", 
                        "rgba(249, 105, 14, 1)", 
                        "rgba(219, 10, 91, 1)", 
                        "rgba(165, 55, 253, 1)", 
                        "rgba(175, 65, 84, 1)", 
                        "rgba(240, 255, 0, 1)"
                    ],
                }],
            },
            options: {
                scales: {
                }
            }
        });

        var ctx = document.getElementById("myChart5").getContext('2d');
        var myChart = new Chart (ctx, {
            type: 'doughnut',
            data: {
            //membuat label
                labels: <?php echo json_encode($country);?>,
                datasets: [{
                    //grafik untuk Total Recover
                    label: 'Total Recover',
                    data:<?php echo json_encode($total_recover); ?>,
                    backgroundColor: [
                        "rgba(15, 10, 222, 0.4)", 
                        "rgba(20, 205, 200, 0.4)", 
                        "rgba(147, 250, 165, 0.4)", 
                        "rgba(108, 122, 137, 0.4)", 
                        "rgba(150, 54, 148, 0.4)", 
                        "rgba(249, 105, 14, 0.4)", 
                        "rgba(219, 10, 91, 0.4)", 
                        "rgba(165, 55, 253, 0.4)", 
                        "rgba(175, 65, 84, 0.4)", 
                        "rgba(240, 255, 0, 0.4)"
                    ],
                    borderColor: [
                        "rgba(15, 10, 222, 1)", 
                        "rgba(20, 205, 200, 1)", 
                        "rgba(147, 250, 165, 1)", 
                        "rgba(108, 122, 137, 1)", 
                        "rgba(150, 54, 148, 1)", 
                        "rgba(249, 105, 14, 1)", 
                        "rgba(219, 10, 91, 1)", 
                        "rgba(165, 55, 253, 1)", 
                        "rgba(175, 65, 84, 1)", 
                        "rgba(240, 255, 0, 1)"
                    ],
                }],
            },
            options: {
                scales: {
                }
            }
        });

        var ctx = document.getElementById("myChart6").getContext('2d');
        var myChart = new Chart (ctx, {
            type: 'doughnut',
            data: {
            //membuat label
                labels: <?php echo json_encode($country);?>,
                datasets: [{
                    //grafik untuk New Recover
                    label: 'New Recover',
                    data:<?php echo json_encode($new_recover); ?>,
                    backgroundColor: [
                        "rgba(15, 10, 222, 0.4)", 
                        "rgba(20, 205, 200, 0.4)", 
                        "rgba(147, 250, 165, 0.4)", 
                        "rgba(108, 122, 137, 0.4)", 
                        "rgba(150, 54, 148, 0.4)", 
                        "rgba(249, 105, 14, 0.4)", 
                        "rgba(219, 10, 91, 0.4)", 
                        "rgba(165, 55, 253, 0.4)", 
                        "rgba(175, 65, 84, 0.4)", 
                        "rgba(240, 255, 0, 0.4)"
                    ],
                    borderColor: [
                        "rgba(15, 10, 222, 1)", 
                        "rgba(20, 205, 200, 1)", 
                        "rgba(147, 250, 165, 1)", 
                        "rgba(108, 122, 137, 1)", 
                        "rgba(150, 54, 148, 1)", 
                        "rgba(249, 105, 14, 1)", 
                        "rgba(219, 10, 91, 1)", 
                        "rgba(165, 55, 253, 1)", 
                        "rgba(175, 65, 84, 1)", 
                        "rgba(240, 255, 0, 1)"
                    ],
                }],
            },
            options: {
                scales: {
                }
            }
        });
    </script>
</body>
</html>