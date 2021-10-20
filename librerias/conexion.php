<?php

$dbhost = "us-cdbr-east-04.cleardb.com";
$dbuser = "b64b78780e07c5";
$dbpass = "1572a9e1";
$dbname = "heroku_7830e8258e6913f";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);

if($conn){ 
	$mensaje= "Conexion establesida";
 }
else{
	die("No hay conexion: ".mysqli_connect_error());	
	}
	


    
?>