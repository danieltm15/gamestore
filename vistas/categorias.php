
  <body>

  <?php include('vistas/encabezado.php'); ?>


    <div class="container-fluid">
    </br>

      <div class="row justify-content-center">  
        <div class="row">
          <div class="col">
            <h2 align="center">
              <?php 
              if (isset($_GET["categ"])){
                if ($_GET["categ"]==0){
                  echo 'Plataforma: '.$_GET["plataf"];
                } else {
                  echo 'Categoria: '.$_GET["categ"];
                }
              }
            
            ?></h2> 
          </div>
        </div>        

      </div>  

      <div class="row justify-content-center">
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
                        <h5 class="card-title">Sin resultados</h5>
                        <p class="card-text">Vuelva a inicio y seleccione una categoria.</p>
                      </div>
                    </div>
                  </div>
                </div>';

          if(isset($_GET['categ']) and isset($_GET['plataf'])){

            $retorno1 ='  <div class="card mb-3" style="max-width: 100%; margin:10px">
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
            if ($_GET['categ']=="0"){
              $busqueda = $_GET['plataf'];
            } else {
              $busqueda = $_GET['categ'];
            }
            
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
            
            $consulta = "SELECT idJuego, nombre, descriShort, plataforma, categoria FROM Juego";
            $juegos = mysqli_query($conn, $consulta);

            if (mysqli_num_rows($juegos) > 0) {
              // output data of each row
                while($row = mysqli_fetch_assoc($juegos)) {
                  $idJuego=$row["idJuego"];
                  $nombreJuego=$row["nombre"];
                  $descripShortJuego=$row["descriShort"];
                  $plataforomaJuego=$row["plataforma"];
                  $categoriaJuego=$row["categoria"];

                  if ($_GET['categ']=="0"){
                    if (strpos(strtolower($plataforomaJuego), strtolower($busqueda))!==false){
                      echo $retorno1.$URLImg[$idJuego].$retorno2.' href="index.php?idJuego='.$idJuego.'"'.$retornI.$nombreJuego.$retorno3.$descripShortJuego.$retorno4;
                    }
                  } else {
                    if (strpos(strtolower($categoriaJuego), strtolower($busqueda))!==false){
                      echo $retorno1.$URLImg[$idJuego].$retorno2.' href="index.php?idJuego='.$idJuego.'"'.$retornI.$nombreJuego.$retorno3.$descripShortJuego.$retorno4;
                    }
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