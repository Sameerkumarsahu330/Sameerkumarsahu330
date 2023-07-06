<?php

$server = "localhost";
$userName = "root";
$passWord = "";
$database = "express";


$conn = mysqli_connect($server, $userName, $passWord, $database);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
?>