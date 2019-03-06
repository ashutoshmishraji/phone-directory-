<?php
$connection_servername="localhost";
$connection_username="root";
$connection_password="";
$connection_db="phone_directory";

	$conn=new mysqli($connection_servername,$connection_username,$connection_password,$connection_db);

if($conn->connect_error)
{
	die("Connection Failed:".connect_error);
}
?>