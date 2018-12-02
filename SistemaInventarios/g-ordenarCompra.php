<?php include_once "templates/header.php";?>
<?php include_once "templates/navbarGerente.php"?>
    <style>
      .sidebar-left{
        position: relative;
      }
    </style>

    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Proveedores disponibles</h3>
      </div>

      <div class="row my-4">
        <div class="col-12 mx-auto">
          <table class="table table-hover table-responsive-md table-light rounded">
            <thead>
              <tr>
                <th style="width=">ID</th>
                <th>Nombre</th>
                <th>Insumo</th>
                <th>Costo</th>
                <th>Mínimo</th>
                <th>Máximo</th>
                <th>Tiempo de entrega</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $consultaProveedores = "SELECT a.id,a.nombre,a.idInsumo,a.costo,a.maximo,a.minimo,a.tiempoEntrega,b.nombre as nombreI FROM proveedor a INNER JOIN insumo b ON a.idInsumo=b.id";
                if($resultado=$conn->query($consultaProveedores)){
                  while ($proveedor=mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                    echo '<td>'.$proveedor[id].'</td>';
                    echo '<td>'.$proveedor[nombre].'</td>';
                    echo '<td>'.$proveedor[nombreI].'</td>';
                    echo '<td>$'.$proveedor[costo].'</td>';
                    echo '<td>'.$proveedor[minimo].'</td>';
                    echo '<td>'.$proveedor[maximo].'</td>';
                    echo '<td>'.$proveedor[tiempoEntrega].' día/s</td>';

                    echo '<td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#comprar'.$proveedor[id].'">';
                    echo 'Comprar';
                    echo '</button></td>';

                    echo '
                    <div class="modal fade" id="comprar'.$proveedor[id].'">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            '.$proveedor[nombre].'
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <form action="funciones/gerente.php" method="post">
                              <label class="mt-2">Cantidad: </label>
                              <input type="hidden" name="idp" value="'.$proveedor[id].'">
                              <input type="hidden" name="idi" value="'.$proveedor[idInsumo].'">
                              <input type="hidden" name="costo" value="'.$proveedor[costo].'">
                              <input type="hidden" name="tiempoEntrega" value="'.$proveedor[tiempoEntrega].'">
                              <input type="number" name="cantidad" step="1" min="'.$proveedor[minimo].'" max="'.$proveedor[maximo].'" class="form-control mb-4" required>
                              </div>

                              <div class="modal-footer">
                                <button type="submit" name="accion" value="ordenarCompra" class="btn btn-primary">Realizar compra</button>
                              </div>

                            </form>

                        </div>
                      </div>
                    </div>';

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
            if(isset($_GET["msj"]) && $_GET["msj"] == "compra") {
                  echo '<div class="alert alert-success">Compra realizada, espera a que llegue la orden para agregarla a almacen</div>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == "accion") {
                  echo '<div class="alert alert-danger">Error al ejecutar acción</div>';
            }
          ?>

    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>
