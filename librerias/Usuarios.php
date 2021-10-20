<?php

function ValidarUsuario($User, $Passw) {
	include "librerias/conexion.php";
	
    $sql = "SELECT email, passw FROM Usuario WHERE email='".$User."' AND passw='".$Passw."'";
	$result = mysqli_query($conn, $sql);

	
	if (mysqli_num_rows($result) > 0) {
		
		mysqli_close($conn);
		return true;
	} else {
		mysqli_close($conn);
		return false;
	}
	
}

function getNombre($User, $Passw){
	
	include "librerias/conexion.php";

	$sql = "SELECT nombre, apellido FROM Usuario WHERE email='".$User."' AND passw='".$Passw."'";
	$result = mysqli_query($conn, $sql);

	mysqli_close($conn);
	while($row = mysqli_fetch_assoc($result)) {
		return $row["nombre"];
	}

}



?>