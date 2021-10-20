
  <body>

    <?php include('vistas/encabezado.php'); ?>


    <div class="container-fluid">
    </br>
      <div class="row justify-content-center">
        <div class="col-4" >
          <h2 align="center">Inicio de sesion</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-3 bordeDark superficie">
          <div style="margin: 8px">
            <form class="row" method="POST" action="index.php">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><h5>Correo electronico</h5></label>
                <input type="txt" class="form-control" name="emailForm">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><h5>Contraseña</h5></label>
                <input type="password" class="form-control" name="passwForm">
              </div>
              <center>
              <button type="submit" class="btn btn-dark" style="width:110px" name="IniciarSesion">Iniciar</button>
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