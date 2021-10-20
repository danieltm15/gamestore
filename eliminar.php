<?php
	include 'librerias/conexion.php';
	
$sql = "create table Juego(
	idJuego int auto_increment primary key,
    nombre varchar(30) not null,
    precio float,
    descriShort varchar(600),
    descriLong varchar(2500),
    categoria varchar(30) not null,
    plataforma varchar(30) not null
)";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Database elimino successfully');</script>";
} else {
  echo "<script> alert('DError elimi database');</script>";
}
	echo "salio";
$conn->close();


?>