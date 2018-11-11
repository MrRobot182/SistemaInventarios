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

      <div class="row mx-1 mx-sm-5 border-bottom" style="margin-top: 80px">
        <h3>Datos de compra</h3>
      </div>

      <div class="row mx-1 mx-sm-5">
        <div class="col-12 col-md-6">
          <div class="mx-auto" style="width:70%">
            <form class="" action="#" method="post">
              <label for="direccion" class="mt-4">Nombre: </label><input type="text" id="direccion" class="form-control">
              <label for="telefono">Correo: </label><input type="text" id="telefono" class="form-control">
              <label for="pass">Cantidad: </label><input type="number" id="cantidad" class="form-control">
              <label for="captcha">Codigo de verificacion: </label><input type="text" id="captcha" class="form-control">
              <div class="float-right mt-3">
                <span class="small">Captcha: </span><img src="img/captcha-ex.png" class="captcha-img">
              </div>
              <input type="submit" name="" value="Comprar" class="btn btn-primary w-100 mt-2 mb-2">
            </form>
          </div>

        </div>

        <div class="col-12 col-md-6 order-first order-md-2 mt-3">
          <div class="text-center">
            <h5>Producto A</h5>
            <img src="img/bg.jpeg" class="rounded mx-auto img-fluid mt-1">
          </div>
        </div>
      </div>



    </div>

<?php include_once "templates/scripts.php"?>
