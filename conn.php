<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("connection_faild" . mysqli_connect_error());
}
?>