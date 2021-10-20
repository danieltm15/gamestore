<?php
	include 'librerias/conexion.php';
	
$sql = "DROP TABLE juego";

if ($conn->query($sql) === TRUE) {
  echo "Database elimino successfully";
} else {
  echo "Error elimi database: " . $conn->error;
}
	echo "salio";
$conn->close();


?>