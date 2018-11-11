<?php include_once "templates/header.php"?>
    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <span class="navbar-brand text-light">abc@abc.com</span>
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
                  <a class="nav-link" href="#">Cerrar sesión</a>
                </li>
              </ul>
            </div>

          </nav>
        </div>
      </div>

      <div class="row" style="margin-top: 70px">

        <div class="col-12 col-sm-6 col-lg-4 mb-3 py-2 px-4">
          <div class="card" style="width: 100%;">
            <img class="card-img-top" src="img/bg.jpeg">
            <div class="card-body">
              <h5 class="card-title">Producto A (ID0000)</h5>
              <p class="card-text">Descripción de este producto</p>
              <p class="card-text">$0.00</p>
              <a href="compra.php" class="btn btn-primary float-right">Comprar</a>
            </div>
          </div>
        </div>

      </div>

    </div>
<?php include_once "templates/scripts.php"?>
