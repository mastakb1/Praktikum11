<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_penjualan";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed!". mysqli_connect_error());
}
$sql = "INSERT INTO tb_kasus (id, country, case_total) VALUES 
('1','India', '43.185.049'),
('2','S.Korea', '18.168.708'),
('3','Turkey', '15.072.747'),
('4','Vietnam', '10.726.045'),
('5','Japan', '8.945.784'),
('6','Iran', '7.232.790'),
('7','Indonesia', '6.057.142'),
('8','Malaysia', '4.516.319'),
('9','Thailand', '4.468.955'),
('10','Israel', '4.154.566')";
    
if(mysqli_query($conn, $sql)){
    echo "New record created successfully";
}else{
    echo "Error : ".$sql."<br>".mysqli_error($conn);
}
  
mysqli_close($conn);
?>