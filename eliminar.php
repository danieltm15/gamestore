<?php
	include 'librerias/conexion.php';
	
$sql = "DROP TABLE imgjuego";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Database elimino successfully');</script>";
} else {
  echo "<script> alert('DError elimi database');</script>";
}
	echo "salio";
$conn->close();


?>