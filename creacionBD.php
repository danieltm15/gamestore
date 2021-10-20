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
	
	
	$sql = "
create table ImgJuego(
	idImagen int auto_increment primary key,
    url varchar(400)  not null,
    id_Juego int,
    
    foreign key (id_Juego) references Juego(idJuego)
)
";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

	

?>