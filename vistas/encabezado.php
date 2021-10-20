<header>
      <div class="row align-items-center" style="padding:0px">
        <div class="col">
          <h1><a class="Titulo" href="index.php">forgotten planet</a></h1>
        </div>
        <?php 
        if (!(isset($_GET['inicioSesion']) or isset($_GET['Registro']) or isset($_GET['admin']) or isset($_GET['inicioSesionAdmin']))) {
          include 'vistas/encabezado2.php';
        } ?>
      </div>
</header>