<?php
	require('funciones/db.php');
	session_start();
	if($_SESSION["logueado"] != TRUE || $_SESSION["tipoUsuario"] != 2) {
    header("Location: inicioSesion.php");
  }
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <span class="navbar-brand text-light">Supervisor</span>

  <!--toggle-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navTog">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--toggle-->

  <div class="collapse navbar-collapse" id="navTog">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link" href="s-autorizacionSalidas.php">
          <img src="img/ico/s12.png" class="mr-2">Autorizar salida
        </a>
      </li>

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link" href="s-registroProveedores.php">
          <img src="img/ico/s22.png" class="mr-2">Registrar proveedores
        </a>
      </li>

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link" href="s-editaProveedores.php">
          <img src="img/ico/s32.png" class="mr-2">Editar proveedores
        </a>
      </li>

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link" href="s-registroProdTerm.php">
          <img src="img/ico/s22.png" class="mr-2">Registrar producto terminado
        </a>
      </li>

      <li class="nav-item mt-3 d-md-none border-bottom">
        <a class="nav-link" href="s-editaProdTerm.php">
          <img src="img/ico/s32.png" class="mr-2">Editar producto terminado
        </a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="img/ico/not.png">
          <span class="d-md-none pr-1">Notificaciones</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">

          <div class="dropdown-item">
            <h6>Salida pendiente</h6>
            <p class="text-nowrap">Insumos - Tipo A: X</p>
            <p class="text-muted">01/01/2019 - 00:00</p>
          </div>
          <div class="dropdown-divider"></div>

          <div class="dropdown-item">
            <h6>Salida pendiente</h6>
            <p class="text-nowrap">Insumos - Tipo A: X</p>
            <p class="text-muted">01/01/2019 - 00:00</p>
          </div>

        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="funciones/cerrarSesion.php">Cerrar sesión</a>
      </li>
    </ul>
  </div>

</nav>

<!--sidebar, main-->

<div class="container-fluid">
  <div class="row">
    <nav class="col-0 col-md-3 col-lg-2 d-none d-md-block bg-light border-right">
      <div class="sidebar-left">

        <ul class="nav flex-column">

          <li class="nav-item mt-3">
            <a class="nav-link py-0 active" href="s-autorizacionSalidas.php">
              <img src="img/ico/s1.png" class="mr-2">Autorizar salidas
            </a>
          </li>

          <li class="nav-item mt-3">
            <a class="nav-link py-0" href="s-registroProveedores.php">
              <img src="img/ico/s2.png" class="mr-2">Registrar proveedores
            </a>
          </li>

          <li class="nav-item mt-3">
            <a class="nav-link py-0" href="s-editaProveedores.php">
              <img src="img/ico/s3.png" class="mr-2">Editar proveedores
            </a>
          </li>

          <li class="nav-item mt-3">
            <a class="nav-link py-0" href="s-registroProdTerm.php">
              <img src="img/ico/s2.png" class="mr-2">Registrar producto terminado
            </a>
          </li>

          <li class="nav-item mt-3">
            <a class="nav-link py-0" href="s-editaProdTerm.php">
              <img src="img/ico/s3.png" class="mr-2">Editar producto terminado
            </a>
          </li>

        </ul>

      </div>
    </nav>
