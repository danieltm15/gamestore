<!-- Esta en la pagina principal
    aqui se presenta la tienda de video juegos-->
	
    
  <body>

	<?php
		include('vistas/encabezado.php');
	?>

      <div class="row">

        <div class="col-2 d-flex align-items-stretch">

          <nav class="navbar-light flex-column align-items-stretch p-4" style="background-color: #476072;">
            <p class="navbar-brand" style='margin:0px; color: #EEEEEE;'>Categorias</p>
            <nav class="nav nav-pills flex-column">
              <a class="nav-link navTitulo2" href="">Tipos de juegos</a>
              <nav class="nav nav-pills flex-column navTexto">
                <a class="nav-link ms-3 my-1" href="index.php?categ=Accion&plataf=0">Acción</a>
                <a class="nav-link ms-3 my-1" href="index.php?categ=Arcade&plataf=0">Arcade</a>
                <a class="nav-link ms-3 my-1" href="index.php?categ=Deportivo&plataf=0">Deportivo</a>
                <a class="nav-link ms-3 my-1" href="index.php?categ=Estrategia&plataf=0">Estrategia</a>
                <a class="nav-link ms-3 my-1" href="index.php?categ=Simulacion&plataf=0">Simulacion</a>
                <a class="nav-link ms-3 my-1" href="index.php?categ=Juegos musicales&plataf=0">Juegos musicales</a>
              </nav>
              <a class="nav-link navTitulo2" href="">Plataforma</a>
              <nav class="nav nav-pills flex-column navTexto">
                <a class="nav-link ms-3 my-1" href="index.php?categ=0&plataf=Xbox">Xbox</a>
                <a class="nav-link ms-3 my-1" href="index.php?categ=0&plataf=Atari 2600">Atari 2600</a>
                <a class="nav-link ms-3 my-1" href="index.php?categ=0&plataf=Nintendo 64">Nintendo 64</a>
                <a class="nav-link ms-3 my-1" href="index.php?categ=0&plataf=Super Nintendo">Super Nintendo</a>
              </nav>
            </nav>
          </nav>

        </div>
		
        <div class="col" >
		</br>
          <h2>Titulos Disponibles</h2>
		  
		  
		<?php

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
          
          echo $retorno1.$URLImg[$idJuego].$retorno2.' href="index.php?idJuego='.$idJuego.'"'.$retornI.$nombreJuego.$retorno3.$descripShortJuego.$retorno4;
				}


			} else {
        $retorno ='  <div class="card mb-3" style="max-width: 100%; margin:10px">
            <div class="row g-0">
              <div class="col-md-4" style="background-color:#b1b0af">
                <img src="img/predeterminado.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">LLene la base de datos</h5>
                  <p class="card-text">Para que se muestre algo llene la base de datos</p>
                </div>
              </div>
            </div>
          </div>';
			echo $retorno;
			}

			mysqli_close($conn);
		
		
		?>








        </div>

      </div>


      <?php include('piePagina.php'); ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>