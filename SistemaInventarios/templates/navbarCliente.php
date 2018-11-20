<?php
	session_start();
	if($_SESSION["logueado"] != TRUE || $_SESSION["tipoUsuario"] != 3) {
    header("Location: inicioSesion.php");
  }
?>
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <span class="navbar-brand text-light"><?php echo $_SESSION["usuario"]; ?></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navTog">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navTog">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="productos.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="historial.php">Historial de compras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="funciones/cerrarSesion.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>

      </nav>
    </div>
  </div>
