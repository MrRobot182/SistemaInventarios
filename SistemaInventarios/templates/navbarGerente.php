<?php
	session_start();
	if($_SESSION["logueado"] != TRUE || $_SESSION["tipoUsuario"] != 1) {
    header("Location: inicioSesion.php");
  }
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <span class="navbar-brand text-light">Gerente</span>

  <!--toggle-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navTog">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--toggle-->

  <div class="collapse navbar-collapse" id="navTog">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link" href="g-ordenarCompra.php">
          <img src="img/ico/g12.png" class="mr-2">Ordenar compra
        </a>
      </li>

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link" href="g-consultarAlmacen.php">
          <img src="img/ico/g22.png" class="mr-2">Consultar almacén
        </a>
      </li>

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link" href="g-ubicacionInsumos.php">
          <img src="img/ico/g32.png" class="mr-2">Ubicación de insumos
        </a>
      </li>

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link" href="g-registroInsumos.php">
          <img src="img/ico/g42.png" class="mr-2">Registrar insumos
        </a>
      </li>

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link" href="g-bajaInsumos.php">
          <img src="img/ico/g52.png" class="mr-2">Baja de insumos
        </a>
      </li>

      <li class="nav-item mt-3 d-md-none">
        <a class="nav-link border-bottom" href="g-ventas.php">
          <img src="img/ico/g62.png" class="mr-2">Ventas
        </a>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="img/ico/not.png">
          <span class="d-md-none pl-1">Notificaciones</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">

          <div class="dropdown-item">
            <h6>Salida autorizada</h6>
            <p class="text-nowrap">Almacén - Producto A: X</p>
            <p class="text-muted">01/01/2019 - 00:00</p>
          </div>
          <div class="dropdown-divider"></div>

          <div class="dropdown-item">
            <h6>Salida autorizada</h6>
            <p class="text-nowrap">Almacén - Producto A: X</p>
            <p class="text-muted">01/01/2019 - 00:00</p>
          </div>

        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="img/ico/reo.png" class="px-md-4">
          <span class="d-md-none pl-1">Reorden</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">

          <div class="dropdown-item">
            <h6>Punto de reorden</h6>
            <?php
              global $conn;
              $query = mysqli_query($conn, "SELECT count(*) as total from almaceninsumos");
                if ($f=mysqli_fetch_array($query)) {
                  if ($f['total'] < 10) {
                    echo "<p class='text-nowrap' style='color:red;'><strong>¡Insumos menores a 10!</strong></p>";
                  } else {
                    echo "<p class='text-nowrap'><strong>Sin notificaciones</strong></p>";
                  }
                }
            ?>
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
            <a class="nav-link py-0 active" href="g-ordenarCompra.php">
              <img src="img/ico/g1.png" class="mr-2">Ordenar compra
            </a>
          </li>

          <li class="nav-item mt-3">
            <a class="nav-link py-0" href="g-consultarAlmacen.php">
              <img src="img/ico/g2.png" class="mr-2">Consultar almacén
            </a>
          </li>

          <li class="nav-item mt-3">
            <a class="nav-link py-0" href="g-ubicacionInsumos.php">
              <img src="img/ico/g3.png" class="mr-2">Ubicación de insumos
            </a>
          </li>

          <li class="nav-item mt-3">
            <a class="nav-link py-0" href="g-registroInsumos.php">
              <img src="img/ico/g4.png" class="mr-2">Registrar insumos
            </a>
          </li>

          <li class="nav-item mt-3">
            <a class="nav-link py-0" href="g-bajaInsumos.php">
              <img src="img/ico/g5.png" class="mr-2">Baja de insumos
            </a>
          </li>

          <li class="nav-item mt-3">
            <a class="nav-link py-0" href="g-ventas.php">
              <img src="img/ico/g6.png" class="mr-2">Ventas
            </a>
          </li>

        </ul>

      </div>
    </nav>
