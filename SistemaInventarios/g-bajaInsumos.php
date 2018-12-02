<?php
  include_once "templates/header.php";
  include_once "templates/navbarGerente.php";
?>

    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left">

      <div class="row">
        <div class="col-12 col-md-6">
          <h3>Solicitud de baja de producto</h3>
          <hr>
          <div class="rounded bg-light mx-auto p-2 mb-3">
            <form action="funciones/gerente.php" method="post">
              <label class="mt-1">Producto: </label>
              <select name="producto" class="custom-select" required>
                <?php
                  $consultaAlmacenP = "SELECT a.id,b.nombre,a.talla,a.color,a.ubicacion FROM almacenproductos a INNER JOIN producto b ON a.idProducto=b.id ORDER BY fechaAlta ASC";
                  if($resultado=$conn->query($consultaAlmacenP)){
                    while ($productoAlmacen=mysqli_fetch_array($resultado)) {
                ?>
                <option value="<?php echo $productoAlmacen['id'] ?>"><?php echo $productoAlmacen['id'].' - '.$productoAlmacen['nombre'].' - '.$productoAlmacen['talla'].' - '.$productoAlmacen['color'].' - Estante '.$productoAlmacen['ubicacion'] ?></option>
                <?php
                    }
                  }
                  else {
                    echo "Error";
                  }
                ?>
              </select>
              <button class="btn btn-primary w-100 my-3" type="submit" name="accion" value="bajaProducto">Solicitar</button>
            </form>
          </div>

        </div>


        <div class="col-12 col-md-6">
          <h3>Solicitud de baja de producto</h3>
          <hr>
          <div class="rounded bg-light mx-auto p-2 mb-3">
            <form action="funciones/gerente.php" method="post">
              <label class="mt-1">Insumo: </label>
              <select name="insumo" class="custom-select" required>
                <?php
                  $consultaAlmacenI = "SELECT a.id,b.nombre,a.idInsumo,a.ubicacion FROM almaceninsumos a INNER JOIN insumo b ON a.idInsumo=b.id ORDER BY fechaAlta ASC";
                  if($resultado=$conn->query($consultaAlmacenI)){
                    while ($insumoAlmacen=mysqli_fetch_array($resultado)) {
                ?>
                <option value="<?php echo $insumoAlmacen['id'] ?>"><?php echo $insumoAlmacen['id'].' - '.$insumoAlmacen['nombre'].' - Estante '.$insumoAlmacen['ubicacion']?></option>
                <?php
                    }
                  }
                  else {
                    echo "Error";
                  }
                ?>
              </select>
              <button class="btn btn-primary w-100 my-3" type="submit" name="accion" value="bajaInsumo">Solicitar</button>
            </form>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col">
          <?php
            if(isset($_GET["msj"]) && $_GET["msj"] == "solicitud") {
              echo '<div class="alert alert-success">Solicitud hecha, espera la autorización del supervisor</div>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == "accion") {
              echo '<div class="alert alert-danger">Error al ejecutar accion</div>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == "solicitud") {
              echo '<div class="alert alert-danger">Ya solicitaste esta baja</div>';
            }
          ?>
        </div>
      </div>


    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>
