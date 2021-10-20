<?php
	echo 'entro';
	include '../librerias/UserSesion.php';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		cerrarSesion();
		echo 'entrpo2';
	}
	
	header("Location: ../index.php");
	die();
	
	
?>