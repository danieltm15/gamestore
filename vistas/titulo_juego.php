<?php
  if (!isset($_GET['idJuego'])){
    //echo "<script> alert('Error al registrar juego'); </script>";	
    echo "<script> window.open('index.php','_self');</script>";		
  }

  $imagenJ='';
  $nombreJ='';
  $precioJ='';
  $descriShort='';
  $descriLong='';
  

  include('librerias/conexion.php');

  $juegoU = "SELECT idJuego, nombre, precio, descriShort, descriLong FROM Juego WHERE idJuego=".$_GET['idJuego'];

  $result = mysqli_query($conn, $juegoU);
  
  
  if (mysqli_num_rows($result) > 0) {
    
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $nombreJ=$row["nombre"];
      
      $precioJ=$row["precio"];
      $descriShort=$row["descriShort"];
      $descriLong=$row["descriLong"];
      $imgID = $row["idJuego"];

    }
  } else {
    echo "<script> alert('Error al encontrar juego'); </script>";
    echo "<script> window.open('index.php','_self');</script>";	
  }

  mysqli_close($conn);

  
  include('librerias/conexion.php');

  $ImagenBD = "SELECT url FROM ImgJuego WHERE id_Juego=".$_GET['idJuego'];
  
  $resultImg = mysqli_query($conn, $ImagenBD);
  
  
  if (mysqli_num_rows($resultImg) > 0) {
    
    // output data of each row
    while($row = mysqli_fetch_assoc($resultImg)) {
      $imagenJ=''.$row["url"];
    }
  } else {
    echo "<script> alert('Error al encontrar la imagen del juego'); </script>";
    echo "<script> window.open('index.php','_self');</script>";	
  }

  mysqli_close($conn);


  
?>


  <body>

    <?php include('encabezado.php'); ?>


    <div class="container-fluid justify-center;">
</br>
      <center>
      <div class="row col-10">
        <div class="col-4 superficie" style="background-color:#EEEEEE;margin: 0px">
        <img src= <?php echo $imagenJ; ?> class="img-fluid" style="max-height:300px">
          
        </div>
        <div class="col d-flex align-content-center justify-content-center">
          <div class="row superficie   bordeDark" style="padding: 0px">
            <div class="row ">
              <div class="col altura"><h2  style="padding: 0px; margin: 0px" ><?php echo $nombreJ; ?></h2></div>
            </div>
            <div class="row">
              <div class="col "><p style="text-align: left"><?php echo $descriShort; ?></p></div>
            </div>
            <div class="row">
              <div class="col"><h5><?php echo "$ ".$precioJ; ?></h5></div>
              <div class="col"><button type="button" class="btn btn-dark">Comprar</button></div>
            </div>
          </div>
        </div>
      </div>


      
  
  
  
  
      <div class="row col-10">
        <div class="col superficie bordeDark "><p style="text-align: left">
        <?php echo $descriLong; ?></p>
        </div>
      </div>
      </center>
    </div>

    <?php include('piePagina.php'); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>