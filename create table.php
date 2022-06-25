<?php
$servername = "localhost";
$username= "root";
$password = "";
$dbname = "db_penjualan";

include "conn.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("connection failed : " . mysqli_connect_error()); 

}

$querysql = "CREATE TABLE tb_kasus(
    id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Country  VARCHAR(100),
    case_total  VARCHAR(255),
    case_new VARCHAR(255),
    death_total VARCHAR(255),
    death_new VARCHAR(255),
    recover_total VARCHAR(255),
    recover_new VARCHAR(255))";

if(mysqli_query($conn, $querysql)){
    echo "Table created succesfully";
} else{
    echo "Table creating failed!". mysqli_error($conn);
}

mysqli_close($conn)
?>