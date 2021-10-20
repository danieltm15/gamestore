
  <body>
    
  <?php include('vistas/encabezado.php'); ?>


    <div class="container-fluid">
</br>
      <div class="row justify-content-center">
        <div class="col-5" >
          <h2 align="center">Registro</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-5 superficie bordeDark">
          <div style="margin: 8px;">
            <form class="row" method="POST" action="index.php?Registro">
              <div class="mb-3">
                <div class="row">
                  <div class="col">
                    <label for="exampleInputEmail1" class="form-label"><h5>Nombre</h5></label>
                    <input type="text" class="form-control" name="nombreReg" aria-describedby="emailHelp">
                  </div>
                  <div class="col">
                    <label for="exampleInputEmail1" class="form-label"><h5>Apellidos</h5></label>
                    <input type="text" class="form-control" name="apellidosReg" aria-describedby="emailHelp">
                  </div>
              </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><h5>Email address</h5></label>
                <input type="text" class="form-control" name="emailReg" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><h5>Password</h5></label>
                <input type="password" class="form-control" name="passwReg">
              </div>

              <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label"><h5>Selecione su moneda</h5></label>
                <select class="form-select mb-3" aria-label="Default select example" name="monedaReg">
                  <option value="Dolar">Dolar</option>
                  <option value="Peso Colombiano">Peso Colombiano</option>
                  <option value="Euro">Euro</option>
                </select>
              </div>
              <center>
              <button type="submit" class="btn btn-dark" style="width:110px" name="registrar">Registrar</button>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>



    <footer>
      <div class="contenedor-pie">
        <div class="columna">
          <p style="margin:1px">Creadores:</p>
          <p style="margin:1px">Juan R.</p>
          <p style="margin:1px">Daniel T.</p>
        </div>
        <div class="columna">
          <rigth>
          <p align="right">Esta pagina web blablabla</p>
          </rigth>
        </div>
      </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>

<?php
	
	if(isset($_POST['registrar'])){
		
		include("librerias/conexion.php");
		$nombre = $_POST['nombreReg'];
		$apellidos = $_POST['apellidosReg'];
		$email = $_POST['emailReg'];
		$passw = $_POST['passwReg'];
		$moneda = $_POST['monedaReg'];
		
		if ($moneda=='Selecione su moneda'){
			$moneda='Dolar';
		}
		
		if ($nombre=='' or $apellidos=='' or $email=='' or $passw==''){
			echo "<script> alert('Campos vacios!!!');</script>";
			echo "<script> window.open('index.php?Registro','_self');</script>";
		}
		
		$insertar = "INSERT INTO Usuario(nombre, apellido, email, passw, moneda) values('".$nombre."','".$apellidos."','".$email."','".$passw."','".$moneda."')";
		
		$query =  mysqli_query($conn,$insertar);
		$nr = mysqli_affected_rows($conn);
		
		
		if($nr == 1)
		{
			mysqli_close($conn);
			echo "<script> alert('Mensaje enviado correctamente');</script>";
			echo "<script> window.open('index.php?inicioSesion','_self');</script>";
		}
		else 
		{
			mysqli_close($conn);
			echo "<script> alert('Error al enviar mensaje'); </script>";		
		}	
	}

?>