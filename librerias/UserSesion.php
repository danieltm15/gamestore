<?php



function ValidarSesion(){
	if (isset($_SESSION['User'])){
		return true;
	} 
	return false;
}

function estableserSesion($User){
	$_SESSION['User']=$User;
}

function cerrarSesion(){
    session_unset();
	session_destroy();
}	


?>