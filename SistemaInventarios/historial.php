<?php
  include_once "templates/header.php";
  include_once "templates/navbarCliente.php";
?>



      <div class="row mx-1 mx-sm-5 border-bottom" style="margin-top: 80px">
        <h3>Compras realizadas</h3>
      </div>

      <div class="row mx-1 mx-sm-5 justify-content-center mt-5">
        <div class="col-11">
          <table class="table table-hover table-responsive-md table-light rounded text-center">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Color</th>
                <th scope="col">Talla</th>
                <th scope="col">Importe</th>
                <th scope="col">Dirección</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $correo=$_SESSION['usuario'];
                $consultaId = "SELECT id FROM cliente WHERE correo='$correo'";
                $resultado = $conn->query($consultaId);
                $cliente = $resultado->fetch_assoc();
                $consultaCompras = "SELECT a.id,c.correo,a.idProducto,b.nombre,a.cantidad,a.color,a.talla,a.importe,a.fecha,a.estado,a.direccion FROM compra a INNER JOIN producto b ON a.idProducto=b.id INNER JOIN cliente c ON a.idCliente=c.id WHERE a.idCliente=".$cliente['id']." ORDER BY a.fecha ASC";
                if($resultado=$conn->query($consultaCompras)){
                  while ($compra=mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                    echo '<td>'.$compra['id'].'</td>';
                    echo '<td>'.$compra['nombre'].'</td>';
                    echo '<td>'.$compra['cantidad'].'</td>';
                    echo '<td>'.$compra['color'].'</td>';
                    echo '<td>'.$compra['talla'].'</td>';
                    echo '<td>$'.$compra['importe'].'</td>';
                    echo '<td>'.$compra['direccion'].'</td>';
                    echo '<td>'.$compra['fecha'].'</td>';
                    if ($compra['estado'] == 0) {
                      //echo '<td class="text-danger">Pendiente</td>';

                      echo '<td><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#cancelar'.$compra['id'].'">';
                      echo 'Cancelar';
                      echo '</button></td>';

                      echo '
                      <div class="modal fade" id="cancelar'.$compra['id'].'">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>¿Estas seguro de cancelar esta compra? (ID: '.$compra['id'].')</p>

                            </div>
                            <div class="modal-footer">
                              <form action="funciones/cliente.php" method="post">
                                <input type="hidden" name="cancelar" value="'.$compra['id'].'">
                                <button type="submit" name="accion" value="cancelarCompra" class="btn btn-danger">Si, cancelar esta compra</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>';

                    }
                    else {
                      echo '<td class="text-muted">Entregado</td>';
                    }
                    echo "</tr>";
                  }
                }
                else {
                  echo "Error";
                }
                $conn->close();
              ?>
            </tbody>
          </table>
          <?php
            if(isset($_GET["msj"]) && $_GET["msj"] == "comprado") {
              echo '<div class="alert alert-success">Compras añadidas</div>';
            }
            if(isset($_GET["msj"]) && $_GET["msj"] == "eliminado") {
              echo '<div class="alert alert-success">Eliminado</div>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == "accion") {
              echo '<div class="alert alert-danger">No se pudo completar la acción</div>';
            }
          ?>
        </div>
      </div>



    </div>
<?php include_once "templates/scripts.php"?>
