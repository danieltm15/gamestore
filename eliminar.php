<?php
	include 'librerias/conexion.php';
	
$sql = "create table ImgJuego(
	idImagen int auto_increment primary key,
    url varchar(400)  not null,
    id_Juego int,
    
    foreign key (id_Juego) references Juego(idJuego)
)";

if ($conn->query($sql) === TRUE) {
  echo "<script> alert('Database elimino successfully');</script>";
} else {
  echo "<script> alert('DError elimi database');</script>";
}
	echo "salio";
$conn->close();


?>