<?php include_once "templates/header.php";?>
<?php include_once "templates/navbarGerente.php"?>

    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Registro de insumos (ordenes de compra)</h3>
      </div>

      <div class="row my-4">
        <div class="col-12 mx-auto">
          <table class="table table-hover table-responsive-md table-light rounded text-center">
            <thead>
              <tr>
                <th style="width=">ID</th>
                <th>Proveedor</th>
                <th>Insumo</th>
                <th>Cantidad</th>
                <th>Importe</th>
                <th>Fecha de compra</th>
                <th>Fecha de entrega</th>
                <th>Ubicación / Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php

                $consultaCompras = "SELECT a.id,a.idInsumo,b.nombre as nombreI,c.nombre as nombreP,a.cantidad,a.importe,a.fechaCompra,a.fechaEntrega,a.estado FROM comprainsumos a INNER JOIN insumo b ON a.idInsumo=b.id INNER JOIN proveedor c ON a.idProveedor=c.id ORDER BY fechaCompra DESC";
                if($resultado=$conn->query($consultaCompras)){
                  while ($compra=mysqli_fetch_array($resultado)) {

                    $fechaActual=date("Y-m-d H:i:s");

                    echo "<tr>";
                    echo '<td>'.$compra['id'].'</td>';
                    echo '<td>'.$compra['nombreP'].'</td>';
                    echo '<td>'.$compra['nombreI'].'</td>';
                    echo '<td>'.$compra['cantidad'].'</td>';
                    echo '<td>$'.$compra['importe'].'</td>';
                    echo '<td>'.$compra['fechaCompra'].'</td>';
                    echo '<td>'.$compra['fechaEntrega'].'</td>';

                    if ($fechaActual>$compra['fechaEntrega']) {
                      if ($compra['estado']==0) {
                        echo "<td>";
                        echo '
                        <form class="form-inline" action="funciones/gerente.php" method="post">
                          <input type="hidden" name="idi" value="'.$compra['idInsumo'].'">
                          <input type="hidden" name="idc" value="'.$compra['id'].'">
                          <input type="hidden" name="cantidad" value="'.$compra['cantidad'].'">
                          <select name="ubicacion" class="custom-select mr-2" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                          <button class="btn btn-primary btn-sm" type="submit" name="accion" value="registrarInsumos">Registrar</button>
                        </form>
                        ';
                        echo "</td>";
                      }
                      else {
                        echo "<td>Almacenado</td>";
                      }
                    }
                    else {
                      echo "<td>Pendiente</td>";
                    }
                    //echo '<td>'.$compra[estado].'</td>';
                    echo "</tr>";
                  }
                }
                else {
                  echo "Error";
                }
              ?>
              </tr>
            </tbody>
          </table>

          <?php
            if(isset($_GET["msj"]) && $_GET["msj"] == "registrado") {
                  echo '<div class="alert alert-success">Insumos registrados en almacen</div>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == "accion") {
                  echo '<div class="alert alert-danger">Error al ejecutar acción</div>';
            }
          ?>

    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>
