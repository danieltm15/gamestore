<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "gameStoreBaseDatos";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);

if($conn){ 
	$mensaje= "Conexion establesida";
 }
else{
	die("No hay conexion: ".mysqli_connect_error());	
	}
	


    
?>