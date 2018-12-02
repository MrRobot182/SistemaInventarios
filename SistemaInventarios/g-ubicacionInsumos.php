<?php
  include_once "templates/header.php";
  include_once "templates/navbarGerente.php";
?>

    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Ubicación de insumos</h3>
      </div>

      <div class="row mt-4">

        <div class="col-12 col-sm-6 col-lg-4 mb-3 mx-auto">

          <div class="card" style="width: 100%;">
            <div class="card-header">
              <h6 class="text-center">Estante 1</h6>
            </div>

            <div class="card-body">
              <form action="funciones/gerente.php" method="post">
                <label>Producto: </label>
                <select name="producto" class="custom-select" required>
                  <?php
                    $consultaAlmacenP = "SELECT a.id,b.nombre,a.talla,a.color FROM almacenproductos a INNER JOIN producto b ON a.idProducto=b.id  WHERE ubicacion=1 ORDER BY fechaAlta ASC";
                    if($resultado=$conn->query($consultaAlmacenP)){
                      while ($productoAlmacen=mysqli_fetch_array($resultado)) {
                  ?>
                  <option value="<?php echo $productoAlmacen['id'] ?>"><?php echo $productoAlmacen['id'].' - '.$productoAlmacen['nombre'].' - '.$productoAlmacen['talla'].' - '.$productoAlmacen['color'] ?></option>
                  <?php
                      }
                    }
                    else {
                      echo "Error";
                    }
                  ?>
                </select>
                <label class="mt-2">Nueva ubicación: </label>
                <select name="ubicacion" class="custom-select" required>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
                <button class="btn btn-primary btn-sm w-100 mt-3" type="submit" name="accion" value="ubicarProducto">Mover</button>
              </form>
            </div>



            <div class="card-footer bg-light">
              <form action="funciones/gerente.php" method="post">
                <label>Insumo: </label>
                <select name="insumo" class="custom-select" required>
                  <?php
                    $consultaAlmacenI = "SELECT a.id,b.nombre,a.idInsumo,a.ubicacion FROM almaceninsumos a INNER JOIN insumo b ON a.idInsumo=b.id  WHERE ubicacion=1 ORDER BY fechaAlta ASC";
                    if($resultado=$conn->query($consultaAlmacenI)){
                      while ($insumoAlmacen=mysqli_fetch_array($resultado)) {
                  ?>
                  <option value="<?php echo $insumoAlmacen['id'] ?>"><?php echo $insumoAlmacen['id'].' - '.$insumoAlmacen['nombre']?></option>
                  <?php
                      }
                    }
                    else {
                      echo "Error";
                    }
                  ?>
                </select>
                <label class="mt-2">Nueva ubicación: </label>
                <select name="ubicacion" class="custom-select" required>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
                <button class="btn btn-primary btn-sm w-100 mt-3" type="submit" name="accion" value="ubicarInsumo">Mover</button>
              </form>
            </div>

          </div>
        </div>

<!---------------------------------------------------------------------------------------------------------------------------------------------->

        <div class="col-12 col-sm-6 col-lg-4 mb-1 mx-auto">

          <div class="card" style="width: 100%;">
            <div class="card-header">
              <h6 class="text-center">Estante 2</h6>
            </div>

            <div class="card-body">
              <form action="funciones/gerente.php" method="post">
                <label>Producto: </label>
                <select name="producto" class="custom-select" required>
                  <?php
                    $consultaAlmacenP = "SELECT a.id,b.nombre,a.talla,a.color FROM almacenproductos a INNER JOIN producto b ON a.idProducto=b.id  WHERE ubicacion=2 ORDER BY fechaAlta ASC";
                    if($resultado=$conn->query($consultaAlmacenP)){
                      while ($productoAlmacen=mysqli_fetch_array($resultado)) {
                  ?>
                  <option value="<?php echo $productoAlmacen['id'] ?>"><?php echo $productoAlmacen['id'].' - '.$productoAlmacen['nombre'].' - '.$productoAlmacen['talla'].' - '.$productoAlmacen['color'] ?></option>
                  <?php
                      }
                    }
                    else {
                      echo "Error";
                    }
                  ?>
                </select>
                <label class="mt-2">Nueva ubicación: </label>
                <select name="ubicacion" class="custom-select" required>
                  <option value="1">1</option>
                  <option value="3">3</option>
                </select>
                <button class="btn btn-primary btn-sm w-100 mt-3" type="submit" name="accion" value="ubicarProducto">Mover</button>
              </form>
            </div>



            <div class="card-footer bg-light">
              <form action="funciones/gerente.php" method="post">
                <label>Insumo: </label>
                <select name="insumo" class="custom-select" required>
                  <?php
                    $consultaAlmacenI = "SELECT a.id,b.nombre,a.idInsumo,a.ubicacion FROM almaceninsumos a INNER JOIN insumo b ON a.idInsumo=b.id  WHERE ubicacion=2 ORDER BY fechaAlta ASC";
                    if($resultado=$conn->query($consultaAlmacenI)){
                      while ($insumoAlmacen=mysqli_fetch_array($resultado)) {
                  ?>
                  <option value="<?php echo $insumoAlmacen['id'] ?>"><?php echo $insumoAlmacen['id'].' - '.$insumoAlmacen['nombre']?></option>
                  <?php
                      }
                    }
                    else {
                      echo "Error";
                    }
                  ?>
                </select>
                <label class="mt-2">Nueva ubicación: </label>
                <select name="ubicacion" class="custom-select" required>
                  <option value="1">1</option>
                  <option value="3">3</option>
                </select>
                <button class="btn btn-primary btn-sm w-100 mt-3" type="submit" name="accion" value="ubicarInsumo">Mover</button>
              </form>
            </div>

          </div>
        </div>

<!---------------------------------------------------------------------------------------------------------------------------------------------->

        <div class="col-12 col-sm-6 col-lg-4 mb-1 mx-auto">

          <div class="card" style="width: 100%;">
            <div class="card-header">
              <h6 class="text-center">Estante 3</h6>
            </div>

            <div class="card-body">
              <form action="funciones/gerente.php" method="post">
                <label>Producto: </label>
                <select name="producto" class="custom-select" required>
                  <?php
                    $consultaAlmacenP = "SELECT a.id,b.nombre,a.talla,a.color FROM almacenproductos a INNER JOIN producto b ON a.idProducto=b.id  WHERE ubicacion=3 ORDER BY fechaAlta ASC";
                    if($resultado=$conn->query($consultaAlmacenP)){
                      while ($productoAlmacen=mysqli_fetch_array($resultado)) {
                  ?>
                  <option value="<?php echo $productoAlmacen['id'] ?>"><?php echo $productoAlmacen['id'].' - '.$productoAlmacen['nombre'].' - '.$productoAlmacen['talla'].' - '.$productoAlmacen['color'] ?></option>
                  <?php
                      }
                    }
                    else {
                      echo "Error";
                    }
                  ?>
                </select>
                <label class="mt-2">Nueva ubicación: </label>
                <select name="ubicacion" class="custom-select" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                <button class="btn btn-primary btn-sm w-100 mt-3" type="submit" name="accion" value="ubicarProducto">Mover</button>
              </form>
            </div>



            <div class="card-footer bg-light">
              <form action="funciones/gerente.php" method="post">
                <label>Insumo: </label>
                <select name="insumo" class="custom-select" required>
                  <?php
                    $consultaAlmacenI = "SELECT a.id,b.nombre,a.idInsumo,a.ubicacion FROM almaceninsumos a INNER JOIN insumo b ON a.idInsumo=b.id  WHERE ubicacion=3 ORDER BY fechaAlta ASC";
                    if($resultado=$conn->query($consultaAlmacenI)){
                      while ($insumoAlmacen=mysqli_fetch_array($resultado)) {
                  ?>
                  <option value="<?php echo $insumoAlmacen['id'] ?>"><?php echo $insumoAlmacen['id'].' - '.$insumoAlmacen['nombre']?></option>
                  <?php
                      }
                    }
                    else {
                      echo "Error";
                    }
                    $conn->close();
                  ?>
                </select>
                <label class="mt-2">Nueva ubicación: </label>
                <select name="ubicacion" class="custom-select" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                <button class="btn btn-primary btn-sm w-100 mt-3" type="submit" name="accion" value="ubicarInsumo">Mover</button>
              </form>
            </div>

          </div>
        </div>


      </div>

<!---------------------------------------------------------------------------------------------------------------------------------------------->

      <div class="row">
        <div class="col-12 mb-3 mx-auto">
          <?php
            if(isset($_GET["msj"]) && $_GET["msj"] == "ubicacionP") {
                  echo '<div class="alert alert-success">Producto reubicado</div>';
            }
            if(isset($_GET["msj"]) && $_GET["msj"] == "ubicacionI") {
                  echo '<div class="alert alert-success">Insumo reubicado</div>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == "accion") {
                  echo '<div class="alert alert-danger">Error al ejecutar accion</div>';
            }
          ?>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>
