<?php include_once "templates/header.php"?>
    <?php include_once "templates/navbarSupervisor.php"?>
    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Salida de pedidos</h3>
      </div>

      <div class="row my-4">
        <div class="col-12 mx-auto">
          <table class="table table-hover table-responsive-md table-light rounded">
            <thead>
              <tr>
                <th style="width=">ID</th>
                <th>Correo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Color</th>
                <th>Talla</th>
                <th>Importe</th>
                <th>Fecha</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  $consultaCompras = "SELECT a.id,a.idCliente,c.correo,a.idProducto,b.nombre,a.cantidad,a.color,a.talla,a.importe,a.fecha,a.estado FROM compra a INNER JOIN producto b ON a.idProducto=b.id INNER JOIN cliente c ON a.idCliente=c.id ORDER BY a.fecha DESC";
                  if($resultado=$conn->query($consultaCompras)){
                    while ($compra=mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$compra[id].'</td>';
                      echo '<td>'.$compra[correo].'</td>';
                      echo '<td>'.$compra[nombre].'</td>';
                      echo '<td>'.$compra[cantidad].'</td>';
                      echo '<td>'.$compra[color].'</td>';
                      echo '<td>'.$compra[talla].'</td>';
                      echo '<td>'.$compra[importe].'</td>';
                      echo '<td>'.$compra[fecha].'</td>';
                      if ($compra[estado] == 0) {
                        echo '<td>';
                        echo '<form action="funciones/supervisor.php" method="post">';
                        echo '<input type="hidden" name="idc" value="'.$compra[id].'">';
                        echo '<button type="submit" name="accion" value="autorizarSalida" class="btn btn-sm btn-primary">';
                        echo 'Autorizar';
                        echo '</button>';
                        echo '</form>';
                        echo '</td>';
                      }
                      else if ($compra[estado] == 1){
                        echo '<td>';
                        echo '<form action="funciones/supervisor.php" method="post">';
                        echo '<input type="hidden" name="idc" value="'.$compra[id].'">';
                        echo '<button type="submit" name="accion" value="eliminarSalida" class="btn btn-sm btn-danger">';
                        echo 'Eliminar';
                        echo '</button>';
                        echo '</form>';
                        echo '</td>';
                      }
                      echo "</tr>";
                    }
                  }
                  else {
                    echo "Error";
                  }
                  $conn->close();
                ?>

              </tr>
            </tbody>
          </table>

          <!-- test inner join-->


        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>
