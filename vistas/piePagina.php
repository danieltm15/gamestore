<?php
  $pie1_2 = '<div class="row"><rigth><b><p align="right">Esta pagina web es una demostracion.</br>No compres! ;)</p></rigth></b></div>';
  $pie2='<div class="row col-9" style="margin:10px"><a align="right"  class="btn btn-outline-dark"  href="index.php?inicioSesionAdmin">Iniciar como Administrador</a></div>'.$pie1_2;

  if (isset($_GET['inicioSesionAdmin']) or isset($_GET['admin']))
  {
    $pie2 = $pie1_2;
      }
  
?>


<footer>
  <div class="contenedor-pie">
    <div class="columna"><b>
      <p style="margin:1px">Autor:</p>
      <p style="margin:1px">Daniel Toledo Moreno. Codigo 2170454</br>Programacion de computadores 2. Grupo H1</p></b>
      </div>
    <div class="columna">
      <center>
      <?php echo $pie2;?>
      </center>
    </div>
  </div>
</footer>
  