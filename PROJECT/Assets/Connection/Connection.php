<?php
$server='localhost';
$user='root';
$password="";
$db="db_travelget";
$con=mysqli_connect($server,$user,$password,$db);
if(!$con)
{
	echo "error";
}
?>