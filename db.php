<?php 
$host="localhost";
$dbUsername="root";
$dbPwd="";
$dbName="sqlclasses";

$conn = mysqli_connect($host,$dbUsername,$dbPwd,$dbName);

if (!$conn) {
	die("Connection Failed: ".mysqli_connect_error());
}
?>