<?php
 //db credentials
$servername = 'localhost';
$dbusername = "root";
$dbpassword = "";
$dbname = "grades";

//connecting to the database
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

//checking errors
if ($conn->connect_error) {
	die("Connection error".$conn->connect_error);
}
?>