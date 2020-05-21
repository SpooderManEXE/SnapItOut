<?php
$server = "localhost";
$username = "1110776";
$password = "Cartoons001";
$dbname = "1110776";

// Create connection
try{
	$conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	die('Unable to connect with the database');
}
