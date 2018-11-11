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

      <div class="row mx-1 mx-sm-5 justify-content-center mt-5">
        <div class="col-11">
          <table class="table table-hover table-responsive-md table-light rounded">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Importe</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>0000</th>
                <td>01/01/2019</td>
                <td>Producto A</td>
                <td>1</td>
                <td>$0.00</td>
                <td>Pendiente</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>



    </div>
<?php include_once "templates/scripts.php"?>
