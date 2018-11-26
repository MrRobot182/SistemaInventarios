<?php

  include_once "templates/header.php";
  include_once "templates/navbarGerente.php";
  require "funciones/db.php";
  require "funciones/metodos.php";

?>

    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">
      <div class="col-12 col-md-6">
        <h3>Ordenar compra</h3>
        <hr>

        <?php
          $query = mysqli_query ($conn, "
            SELECT
              proveedor.id as idP,
              proveedor.nombre,
              proveedor.idInsumo,
              proveedor.costo,
              proveedor.maximo,
              proveedor.minimo,
              proveedor.tiempoEntrega,
              insumo.id,
              insumo.nombre AS nombreIns
          FROM
              `proveedor`
          JOIN insumo ON proveedor.idInsumo = insumo.id
          ");
          while ($f=mysqli_fetch_array($query))
          {
          ?>
            <form action="funciones/ordenarCompra.php" method="post">

              <div class="rounded bg-light mx-auto p-2 mb-4">
                <div class='form-group'>
                  <label>Proveedor: </label>
                </div>
                <input type="text" class="form-control" readonly required value="<?php echo $f['nombre'];?>" />
                <input type="hidden" name="idProveedor" value="<?php echo $f['idP'];?>">

                <div class='form-group'>
                  <label>Insumo: </label>
                </div>
                <input type="text" class="form-control" readonly required value="<?php echo $f['nombreIns'];?>" />
                <input type="hidden" name="idInsumo" value="<?php echo $f['idInsumo'];?>">

                <div class='form-group'>
                  <label>Precio: </label>
                </div>
                <input type="text" class="form-control" name='importe'  readonly required value="<?php echo $f['costo'];?>" />

                <div class='form-group'>
                  <label>Tiempo entrega: </label>
                </div>
                <input type="text" class="form-control" name='tiempoEntrega' readonly value="<?php echo $f['tiempoEntrega'];?>" />

                <div class='form-group'>
                  <label>Minimo que vende: </label>
                </div>
                <input type="text" class="form-control" readonly name='minimoVenta' required value="<?php echo $f['minimo'];?>" />

                <div class='form-group'>
                  <label>Maximo que vende: </label>
                </div>
                <input type="text" class="form-control" readonly name='maximoVenta' value="<?php echo $f['maximo'];?>" />

                <div class='form-group'>
                  <label>Cantidad: </label>
                </div>
                <input type="number" class="form-control" name="cantidad">
                <input type="submit" name="" value="Registrar" class="btn btn-primary w-100 mt-4 mb-2">

              </div>
            </form>
          <?php } ?>

      </div>

<hr />
      <!-- -->
      <div class="row border-bottom">
        <h3>Ordenar compra</h3>
      </div>

      <div class="row mt-4">

      <?php
        $query = mysqli_query ($conn, "
          SELECT
              proveedor.id,
              proveedor.nombre,
              proveedor.idInsumo,
              proveedor.costo,
              proveedor.maximo,
              proveedor.minimo,
              proveedor.tiempoEntrega,
              insumo.id,
              insumo.nombre as nombreIns
          FROM
              `proveedor`
          JOIN insumo
          ON proveedor.idInsumo = insumo.id
        ");
        while ($f=mysqli_fetch_array($query))
        {

        ?>
        <form action="funciones/ordenarCompra.php" method="post">
          <div class="form-row">
        <div class="col-12 col-lg-12 mb-4 mx-auto">
          <div class="card" style="width: 100%;">
            <div class="card-header">
              <span class="input-group-addon">
                <?php
                  echo $f['nombre'] . "<input class='form-control' readonly name='idProveedor' value='" . $f['id'] . "'.</input>";
                ?>
              </span>
              <span class="input-group-addon">Insumo que vende:
                <?php echo "<input class='form-control' name='idInsumo' readonly value='" . $f['idInsumo'] . "'.</input>"; ?>
              </span>
              <span class="input-group-addon">Precio por unidad:
                <?php echo "<input class='form-control' name='importe'  readonly value='" . $f['costo'] . "'.</input>"; ?>
              </span>
              <span class="input-group-addon">Tiempo de entrega:
                <?php
                  echo "<input class='form-control' name='tiempoEntrega' readonly value='" . $f['tiempoEntrega'] . "'.</input>";
                ?>
              </span>
              <span class="input-group-addon">Mínimo que vende:
                <?php
                  echo "<input class='form-control' readonly name='minimoVenta' value='" . $f['minimo'] . "'.</input>";
                ?>
              </span>
              <span class="input-group-addon">Máximo que vende:
                <?php
                  echo "<input class='form-control' readonly name='maximoVenta' value='" . $f['maximo'] . "'.</input>";
                ?>
              </span>


          </div>
          <div class="card-footer">


                <div class="col">
                  <input type="number" class="form-control" placeholder="Cantidad" name="cantidad">
                </div>
                <div class="col">
                  <input type="submit" class="btn btn-primary float-right" value="Comprar">
                </div>
              </div>
            </form>
          </div>
        </div>
        </div>
        <?php
        } // cierro while
        ?>

        <!--  BLOQUEE Proveedor -->
        <!-- <div class="col-12 col-lg-6 mb-4 mx-auto">
          <div class="card" style="width: 100%;">
            <div class="card-header">
              <h6 class="text-center">Proveedor A</h6>
            </div>
            <div class="card-body">
              <table class="table table-borderless table-light table-sm">
                <tbody>
                  <tr>
                    <td>Insumo que vende: </td>
                    <td>Tipo A</td>
                  </tr>
                  <tr>
                    <td>Precio por unidad: </td>
                    <td>$0.00</td>
                  </tr>
                  <tr>
                    <td>Tiempo de entrega: </td>
                    <td>X días/semanas</td>
                  </tr>
                  <tr>
                    <td>Mínimo que vende: </td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>Máximo que vende: </td>
                    <td>X</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <form action="#">
                <div class="form-row">
                  <div class="col">
                    <input type="number" class="form-control" placeholder="Cantidad">
                  </div>
                  <div class="col">
                    <input type="submit" class="btn btn-primary float-right" value="Comprar">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        -->
        <!-- FIN BLOQUEE PROVEEDOR -->





      </div>

    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>
