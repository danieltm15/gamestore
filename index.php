<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysqli_select_db("test_db", $con);
if (!$db_selected)
  {
  die ("Can\'t use test_db : " . mysql_error());
  }
mysql_close($con);



include('vistas/headerFile.php'); ?>
<?php
include "librerias/UserSesion.php";
include "librerias/Usuarios.php";
//echo isset($_GET['categ']) and isset($_GET['plataf']) ? "entro" : "fuera";


if (ValidarSesion()){ //Si hay sesion se ejecuta este bloque
	include 'vistas/home.php';
} elseif (isset($_POST['IniciarSesion'])){
	
	if (true){
		$emailForm=$_POST['emailForm'];
		$passwForm=$_POST['passwForm'];
		
		if (ValidarUsuario($emailForm, $passwForm)){
			
			if (!(session_status() === PHP_SESSION_ACTIVE)){
				session_start();
			}
			estableserSesion(getNombre($emailForm, $passwForm));
		} else {
			echo "no registrado";
		}
		
		
	}
	include 'vistas/home.php';	
	//Iniciar secion
} elseif(isset($_GET['idJuego'])) {

	include 'vistas/titulo_juego.php';
	
} elseif(isset($_POST['buscar'])) {
	include 'vistas/busqueda.php';
	
} elseif(isset($_GET['categ']) and isset($_GET['plataf'])) {
	include 'vistas/categorias.php';
	
} elseif(isset($_GET['inicioSesion'])) {
	include 'vistas/inicio_sesion.php';
	
} elseif(isset($_GET['Registro'])) {
	include 'vistas/registro.php';
	
} elseif(isset($_GET['inicioSesionAdmin'])) {
	include 'vistas/inicio_sesion_admin.php';
	
} elseif(isset($_GET['admin'])) {
	include 'vistas/admin.php';
	
} else {
	include 'vistas/home.php';
}
    
?>