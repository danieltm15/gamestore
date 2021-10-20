
  <body>

  <?php include('vistas/encabezado.php'); ?>

</br>
</br>

      <div class="row justify-content-center" style="backgorund:cian; min-height: 400px">  
        <div class="col-10 superficie">

        
        <?php

          $retorno ='  <div class="card mb-3" style="max-width: 100%; margin:10px">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <center>
                      <img src="img/predeterminado.jpg" class="img-fluid rounded-start" alt="...">
                      </center>
                      </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Sin busqueda</h5>
                        <p class="card-text">Haga una busqueda</p>
                      </div>
                    </div>
                  </div>
                </div>';

          if(isset($_POST['buscar'])){

            $retorno1 ='  <div class=" bordeDark card mb-3 " style="max-width: 100%; margin:10px">
            <div class="row g-0">
              <div class="col-md-4" style="background-color:#black">
                <center>
                <img src="';
            $retorno2='" class="img-fluid rounded-start"  style="max-height:270px" alt="...">
              </center>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                <h4 class="card-title"><a class='.'tituloJuego'.'';
            $retornI='>';
            $retorno3='</a></h4>
                  <p class="card-text">';
            $retorno4='</p>
                </div>
              </div>
            </div>
            </div>';

            $busqueda = $_POST['busquedaform'];
            echo "<h2>Busqueda: ".$busqueda."</h2></br>";
            //consultar de la base de datos

                 //Traer URL de imagenes
            include("librerias/conexion.php");
            $consulta = "SELECT id_Juego, url  FROM ImgJuego";
            $Imagenes  = mysqli_query($conn, $consulta);
            $URLImg = array();
            
            if (mysqli_num_rows($Imagenes) > 0) {
                while($imag = mysqli_fetch_assoc($Imagenes)) {
                  $URLImg[$imag["id_Juego"]]=$imag["url"];
                }
            } 
            mysqli_close($conn);

            //Taaer Juegos
            include("librerias/conexion.php");
            
            $consulta = "SELECT idJuego, nombre, descriShort FROM Juego";
            $juegos = mysqli_query($conn, $consulta);

            if (mysqli_num_rows($juegos) > 0) {
              // output data of each row
                while($row = mysqli_fetch_assoc($juegos)) {
                  $idJuego=$row["idJuego"];
                  $nombreJuego=$row["nombre"];
                  $descripShortJuego=$row["descriShort"];
                  if (strpos(strtolower($nombreJuego), strtolower($busqueda))!==false){
                    echo $retorno1.$URLImg[$idJuego].$retorno2.' href="index.php?idJuego='.$idJuego.'"'.$retornI.$nombreJuego.$retorno3.$descripShortJuego.$retorno4;
                  }
                }
        
        
              } else {
                $retorno ='No existe en la db';
              echo $retorno;
              }
        
              mysqli_close($conn);



          } else {
            echo $retorno;
          }

        ?>




        </div>
      </div>
      
    </div>


    <?php include('piePagina.php'); ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>