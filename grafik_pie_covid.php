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
      <title>Membuat Grafik Menggunakan Chart JS</title>
      <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width: 800px; height:800px">
        <canvas id="chart-area"></canvas>
    </div>
    
    <script>
        var config = {
            type:'pie',
            data:{
                datasets : [{
                    data : <?php echo json_encode($case_total);?>,

                    backgroundColor: [
                        "rgba(15, 10, 222, 0.4)", 
                        "rgba(20, 205, 200, 0.4)", 
                        "rgba(147, 250, 165, 0.4)", 
                        "rgba(108, 122, 137, 0.4)", 
                        "rgba(0, 255, 8, 0.8)", 
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
                    
                    label : 'Grafik Covid'
                }],
                labels:<?php echo json_encode($country); ?>
                },
            options : {
                responsive : true
            }
        };

    window.onload = function(){
        var ctx = document.getElementById('chart-area').getContext('2d');
        window.myPie = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', 
    function(){
        config.data.datasets.forEach(function(dataset){
            dataset.data = dataset.data.map(function(){
                return randomScalingFactor();
            });
        });

        window.myPie.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function(){
        var newDataset = {
            backgroundColor: [],
            data : [],
            label: 'New dataset' + config.data.datasets.length,
        };

        for(var index = 0; index < config.data.labels.length;
        ++index){
            newDataset.data.push(randomScalingFactor());

            var colorName = colorNames[index % colorNames.length];
            var newColor = window.chartColors[colorName];
            newDataset.backgroundColor.push(newColor);
        }

        config.data.datasets.push(newDataset);
        window.myPie.update();
        });

        document.getElementById('removeDataset').addEventListener('click', function(){
            config.data.datasets.splice(0, 1);
            window.myPie.update();
        });
    </script>
</body>
</html>