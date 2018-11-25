<?php
  include_once "templates/header.php";
  include_once "templates/navbarGerente.php";
  require "funciones/db.php";
  require "funciones/metodos.php";

  if (isset($_GET['estado'])) {
    $estado = $_GET['estado'];
    if ($estado == "insertSuccess") {
      echo "<script>alert('Registrado correctamente.');</script>";
    }
    if ($estado == "varNoDefinidas") {
      echo "<script>alert('Faltan datos.');</script>";
    }
    if ($estado == "minMaxError") {
      echo "<script>alert('Cantidad minima o maximca incorrecta.');</script>";
    }
  }

?>
    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">


      <div class="row mt-4">

        <div class="col-12 col-md-6">
          <h3>Registro de insumos</h3>
          <hr>
          <div class="rounded bg-light mx-auto p-2 mb-5">
            <form class="" action="funciones/regInsumos.php" method="post">
              <label class="mt-1">Tipo de insumo: </label>
              <select class="custom-select" name="tipoInsumo" required>
                <option value=""> Seleccionar </option>
                <?php  consultaAlmacenInsumos(); ?>
              </select>
              <label class="mt-2">Ubicación: </label>
              <select class="custom-select" name="ubicacionInsumo" required>
                <option value="1">Estante 1</option>
                <option value="2">Estante 2</option>
                <option value="3">Estante 3</option>
              </select>
              <label class="mt-2">Cantidad: </label><input type="number" class="form-control" name="cantidadInsumo" required>
              <input type="submit" name="reg" value="Registrar" class="btn btn-primary w-100 mt-4 mb-2">
            </form>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <h3>Registro de producto terminado</h3>
          <hr>
          <div class="rounded bg-light mx-auto p-2 mb-5">
            <form class="" action="#" method="post">
              <label class="mt-1">Tipo de producto: </label>
              <select class="custom-select" required>
                <option value="">Seleccionar</option>
                <?php  consultaAlmacenProdTerminado(); ?>
              </select>
              <label class="mt-2">Ubicación: </label>
              <select class="custom-select">
                <option value="1">Estante 1</option>
                <option value="2">Estante 2</option>
                <option value="3">Estante 3</option>
              </select>


              <label class="mt-2">Talla: </label>
              <select class="custom-select">
                <option value="C">Chica</option>
                <option value="M">Mediana</option>
                <option value="G">Grande</option>
              </select>


              <label class="mt-2">Color: </label>
              <select class="custom-select">
                <option value="ROJO">Rojo</option>
                <option value="AZUL">Azul</option>
                <option value="AMARILLO">Amarillo</option>
                <option value="VERDE">Verde</option>
              </select>

              <label class="mt-2">Cantidad: </label><input type="number" class="form-control">
              <input type="submit" name="" value="Registrar" class="btn btn-primary w-100 mt-4 mb-2">
              </form>
          </div>
        </div>

      </div>






    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>
