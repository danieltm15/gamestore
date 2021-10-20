<div class="col-3">

<form class="d-flex" method="POST" action="index.php">
  <input class="form-control me-2" name="busquedaform" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-light" name="buscar" type="submit">Search</button>
</form>

</div>
<div class="col-2">'
<?php
  if (ValidarSesion()){
    $UserInit=$_SESSION["User"];
    echo '
        <div><p style="margin:2px; color:white">Hola, '.$UserInit.'</p></div>
      <div><form  method="POST" action="vistas/cerrarSesion.php"><button class="btn btn-outline-light" style="margin:2px">Cerrar Sesion</button></form></div>';
  } else {
    echo '<div><a href="index.php?inicioSesion" class="btn btn-outline-light" style="margin:2px">Inicio Sesion</a></div>
    <div><a href="index.php?Registro" class="btn btn-outline-light" style="margin:2px">Registro</a></div>';

  }
?>
  </div>