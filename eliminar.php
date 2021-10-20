<?php
	include 'librerias/conexion.php';
	
	$elimi = 5;
	
	// sql to delete a record
$sql = "DELETE FROM imgjuego WHERE id_Juego=".$elimi;

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();


	include 'librerias/conexion.php';
	
	// sql to delete a record
$sql = "DELETE FROM juego WHERE idJuego=".$elimi;

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();


?>