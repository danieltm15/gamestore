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
	
	
	$sql = "create table Usuario(
	idUser int auto_increment primary key,
    nombre varchar(30) not null,
    apellido varchar(50) not null,
    email varchar(100) not null unique,
    moneda varchar(30) not null,
    passw varchar(30) not null
)
";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

	

?>