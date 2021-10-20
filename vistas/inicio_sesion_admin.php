
  <body>

  <?php include('vistas/encabezado.php'); ?>


    <div class="container-fluid">
</br>
      <div class="row justify-content-center">
        <div class="col-4" >
          <h2 align="center">Inicio de sesion administrador</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-3 superficie bordeDark">
          <div class="altura">
            <form class="row" method="POST" action="index.php?inicioSesionAdmin">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><h5>Id Administrador</h5></label>
                <input type="txt" class="form-control" name="idAdminFORM" value="Admin">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><h5>Password</h5></label>
                <input type="password" class="form-control" name="passwAFORM" value="1234">
              </div>
              <center>
              <button type="submit" class="btn btn-dark" style="width:110px" name="bIniciar">Iniciar</button>
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

	if ((session_status() === PHP_SESSION_ACTIVE)){
		session_unset();
		session_destroy();
	}

	if(isset($_POST['bIniciar'])){
	
		$nombreA = $_POST['idAdminFORM'];
		$passwA = $_POST['passwAFORM'];
		
		if ($nombreA=='Admin' and $passwA =='1234'){
			if (!(session_status() === PHP_SESSION_ACTIVE)){
				session_start();
			}
			$_SESSION['Administrador']="Administrador";
			echo "<script> window.open('index.php?admin','_self');</script>";
			
			
		} else {
			echo "<script> alert('Credenciales Incarrectas!');</script>";
			echo "<script> window.open('index.php?inicioSesionAdmin','_self');</script>";
		}
			
	}
   ?>