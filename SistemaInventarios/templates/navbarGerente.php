<?php
	require('funciones/db.php');
	date_default_timezone_set("America/Mexico_City");
	session_start();
	if($_SESSION["logueado"] != TRUE || $_SESSION["tipoUsuario"] != 1) {
    header("Location: inicioSesion.php");
  }
?>

<style>
	.scroll{
		height: auto;
		max-height: 250px;
		overflow-x: hidden;
	}
	.sidebar-left{
		position: sticky;
		overflow-x: hidden;
    overflow-y: auto;
	}
</style>

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



			<li class="nav-item dropdown pr-4">
        <a class="nav-link" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
					<img src="img/ico/not.png">
					<span class=" text-light ml-1">Ordenes de compra</span>

					<?php
						$pendientes=0;
						$consultaCompras = "SELECT * FROM comprainsumos";
						if($resultado1=$conn->query($consultaCompras)){
							while ($compra=$resultado1->fetch_assoc()) {
								$fechaActual=date("Y-m-d H:i:s");
								if ($fechaActual>$compra[fechaEntrega]) {
									if ($compra[estado]==0) {
										$pendientes++;
									}

								}

							}
						}

						if ($pendientes>0) {
					?>
					<span class="badge badge-pill badge-danger"><?php echo $pendientes ?></span>
					<?php
						}
					?>
        </a>

				<div class="dropdown-menu dropdown-menu-right">
				<?php
				if ($pendientes>0) {
					$consultaCompras = "SELECT * FROM comprainsumos";
					if($resultado1=$conn->query($consultaCompras)){
						while ($compra=$resultado1->fetch_assoc()) {
							$fechaActual=date("Y-m-d H:i:s");
							if ($fechaActual>$compra[fechaEntrega]) {
								if ($compra[estado]==0) {


				?>
					<div class="dropdown-item">
						<a href="g-registroInsumos.php">
							<h6>Orden (ID:<?php echo $compra[id]; ?>) ha llegado</h6>
							<p class="text-muted">Fecha y hora de llegada: <?php echo $compra[fechaEntrega] ?></p>

						</a>
					</div>
					<div class="dropdown-divider"></div>
				<?php
								}

							}

						}
					}
				}
				else {
				?>
					<div class="dropdown-item">
						<h6>No hay ordenes pendientes</h6>
					</div>
				<?php
				}
				?>
				</div>




      </li>



			<li class="nav-item dropdown pr-4">
        <a class="nav-link" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
					<img src="img/ico/reo.png">
					<span class=" text-light ml-1">Punto de reorden</span>
					<?php
						$consultaInsumos = "SELECT * FROM almaceninsumos";
						$resultado = $conn->query($consultaInsumos);
						$cantidadInsumos = mysqli_num_rows($resultado);

						if ($cantidadInsumos<=10) {
							echo '<span class="badge badge-pill badge-danger">';
							echo "1";
							echo '</span>';
						}
					?>

        </a>
        <div class="dropdown-menu dropdown-menu-right">
					<?php
						if ($cantidadInsumos<=10){
					?>
          <div class="dropdown-item">
            <h6>Punto de reorden</h6>
            <p>El almacen cuenta con 10 o menos insumos (<?php echo $cantidadInsumos ?>)</p>
						<a href="s-ordenProduccion.php" class="mb-4">> Generar una nueva orden de producción</a>
						<!--<p class="text-muted">> Generar una nueva orden de producción</p>-->
          </div>
					<?php
						}
						else{
					?>
          <div class="dropdown-item">
            <h6>¡Todo normal!</h6>
            <p class="text-muted">El almacen cuenta con <?php echo $cantidadInsumos ?> insumos</p>
          </div>
					<?php } ?>
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
