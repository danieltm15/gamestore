<?php
session_start();
	if (!isset($_SESSION['Administrador'])){
		echo "<script> window.open('index.php?inicioSesionAdmin','_self');</script>";
	}
?>
  <body>

  
  <?php include('encabezado.php'); ?>


    <div class="container-fluid">
</br>
      <div class="row justify-content-center">
        <div class="col-4" >
          <h2 align="center">Administrador</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-7 superficie bordeDark">
          <div class="altura">
            <form class="row" method="POST" action="index.php?admin" enctype="multipart/form-data">
              <div class="mb-3">
				<div class="row">
				
					<div class="col-8">
					<label for="exampleInputEmail1" class="form-label"><h5>Nombre de Juego</h5></label>
					<input type="txt" class="form-control" name="nombreJFROM">
					</div>
				
					<div class="col">
					<label for="exampleInputEmail1" class="form-label"><h5>Precio</h5></label>
					<input type="number" class="form-control" name="precioJFROM">
					</div>
					
				</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><h5>Descripcion corta</h5></label>
                <textarea name="descriShortJFROM" class="form-control" rows="5" cols="40"></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><h5>Descripcion Larga</h5></label>
                <textarea name="descriLongJFROM" class="form-control" rows="10" cols="40"></textarea>
              </div>

              <div class="mb-3">
			  <label for="exampleInputEmail1" class="form-label"><h5>Plataforma</h5></label>
                <select class="form-select mb-3" aria-label="Default select example" name="plataformaJFROM">
                  <option value="Xbox">Xbox</option>
                  <option value="Atari 2600">Atari 2600</option>
                  <option value="Nintendo 64">Nintendo 64</option
                  <option value="Mega Drive">Mega Drive</option>
                  <option value="Super Nintendo">Super Nintendo</option>
                </select>
              </div>
              <div class="mb-3">
			  <label for="exampleInputEmail1" class="form-label"><h5>Categoria</h5></label>
                <select class="form-select mb-3" aria-label="Default select example" name="categoriaJFROM">
                  <option value="Accion">Accion</option>
                  <option value="Arcade">Arcade</option>
                  <option value="Deportivo">Deportivo</option>
                  <option value="Estrategia">Estrategia</option>
                  <option value="Simulacion">Simulacion</option>
                  <option value="Juegos musicales">Juegos musicales</option>
                </select>
              </div>
			  

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><h5>Imagenes</h5></label>
                <input type="file" class="form-control" name="imgJFROM" id="imgJFROM">
              </div>
              <center>
              <button type="submit" class="btn btn-dark" style="width:110px" name="insert">Registrar</button>
			  <button type="submit" class="btn btn-dark" style="width:200px" name="cerrarAd">Cerrar Sesion Admin</button>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>


	<?php include('vistas/piePagina.php');?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>


<?php
	
	if(isset($_POST['cerrarAd'])){
		//echo "cerro";
		
		session_unset();
		session_destroy();
		echo "<script> window.open('index.php','_self');</script>";
	}
	
	
	if(isset($_POST['insert'])){
		
		
		$nombre = $_POST['nombreJFROM'];
		$precio = $_POST['precioJFROM'];
		$descriShort = $_POST['descriShortJFROM'];
		$descriLong = $_POST['descriLongJFROM'];
		$categoria = $_POST['categoriaJFROM'];
		$plataforma = $_POST['plataformaJFROM'];
		$imgJ = "/pueva.img";
		
		if ($_FILES["imgJFROM"]["tmp_name"]=="" or $nombre=='' or $precio=='' or $descriShort=='' or $descriLong=='' or $categoria=='Categoria' or $plataforma=='Plataforma'){
			echo "<script> alert('Campos vacios, llene todos los campos!!!');</script>";
			echo "<script> window.open('index.php?admin','_self');</script>";
		}

		
		//Insertar en DB ImgJuego un seniuelo
		include("librerias/conexion.php");
		$last_id='';
		$insertarImg= "INSERT INTO ImgJuego (url) VALUES ('".$imgJ."')";

		if (mysqli_query($conn, $insertarImg)) {
			$last_id = mysqli_insert_id($conn);
		} else {
			echo "Error al insertar imagen: " . $insertarImg . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);		
		$id_Img=$last_id;
		

		
				
        //Cargar imagen
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["imgJFROM"]["name"]);
		$urlImg='img/'.$id_Img.'.'.strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$target_file = "".$urlImg;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Chequea si la imagen es valida
		if(isset($_POST["insert"])) {
			$check = getimagesize($_FILES["imgJFROM"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
				echo "<script> alert('Error en el formato de la imagen, suba otra!!!');</script>";
				echo "<script> window.open('index.php?admin','_self');</script>";
			}
		}
		// Chequea si la imagen existe
		if (file_exists($target_file)) {
			$uploadOk = 0;
			echo "<script> alert('Error imagen existente!!!');</script>";
			echo "<script> window.open('index.php?admin','_self');</script>";
		}
		//carga imagen
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			$uploadOk = 0;
			echo "<script> alert('Error: solo se admite los formatos JPG, JPEG, PNG & GIF para las imagenes.!!!');</script>";
			echo "<script> window.open('index.php?admin','_self');</script>";
		}
		if ($uploadOk == 0) {
			echo "Error al cargar el archivo.";
		} else {
			if (!move_uploaded_file($_FILES["imgJFROM"]["tmp_name"], $target_file)) {
				echo "Error al cargar el archivo.";
			}
		}
		
		
		// Actualizar url de la BD
		include("librerias/conexion.php");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE ImgJuego SET url='".$urlImg."' WHERE idImagen=".$id_Img."";

		if (!mysqli_query($conn, $sql)) {
			echo "<script> alert('Error al registrar la imagen en la BD!!!');</script>";
			echo "<script> window.open('index.php?admin','_self');</script>";
		}

		mysqli_close($conn);
		

		



		
		
		include("librerias/conexion.php");
		$insertarJuego = "INSERT INTO Juego(nombre, precio, descriShort, descriLong, categoria, plataforma) values('".$nombre."','".$precio."','".$descriShort."','".$descriLong."','".$categoria."','".$plataforma."')";
		
		$query =  mysqli_query($conn,$insertarJuego);
		$last_id_Juego = mysqli_insert_id($conn);
		$nr = mysqli_affected_rows($conn);
		mysqli_close($conn);
		


		// Actualizar id_juego de la BD de imgJuego
		include("librerias/conexion.php");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE ImgJuego SET id_Juego='".$last_id_Juego."' WHERE idImagen=".$id_Img."";

		if (!mysqli_query($conn, $sql)) {
			echo "<script> alert('Error al registrar la imagen en la BD!!!');</script>";
			echo "<script> window.open('index.php?admin','_self');</script>";
		}

		mysqli_close($conn);

		if($nr == 1)
		{
			
			echo "<script> alert('Juego registrado correctamente');</script>";
			echo "<script> window.open('index.php?admin','_self');</script>";
		}
		else 
		{
			echo "<script> alert('Error al registrar juego'); </script>";	
			echo "<script> window.open('index.php?admin','_self');</script>";			
		}	
	}

?>