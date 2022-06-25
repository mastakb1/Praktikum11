<?php
include('conn.php');

$label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
for($bulan=1; $bulan<13; $bulan++){
    $sql = mysqli_query($conn, "SELECT sum(jumlah) as jumlah from tb_penjualan where MONTH (tanggal_penjualan)='$bulan'");
    $row = $sql ->fetch_array();
    $jumlah_produk[] = $row ['jumlah'];
}
?>

<!DOCTYPE html>
<head>
    <title> Grafik Bulanan Chart JS </title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width 800px; height: 800px">
    <canvas id="myChart"></canvas>
</div>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data:{
            labels: <?php echo json_encode($label);?>,
            datasets: [{
                label: 'Grafik Penjualan',
                data:<?php echo json_encode($jumlah_produk);?>,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
    </body>
    </html>