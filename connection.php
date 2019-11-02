<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing";

$link = mysqli_connect($servername,$username,$password,$dbname);
if(!$link){
	//die("connection failed." . $conn->connect_error);
echo "The Connection Has Failed!!";
}
?>

 