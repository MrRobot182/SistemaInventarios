<?php include_once "templates/header.php"?>
    <?php include_once "templates/navbarSupervisor.php"?>
    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Editar producto terminado</h3>
      </div>

      <div class="row my-4">
        <div class="col-12 mx-auto">
          <table class="table table-hover table-responsive-md table-light rounded table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th style="width:40%;">Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $consultaProductos = "SELECT * FROM producto";
                if($resultado=$conn->query($consultaProductos)){
                  while ($producto=mysqli_fetch_array($resultado)) {
                    echo '<tr>';
                    echo '<td>'.$producto[id].'</td>';
                    echo '<td>'.$producto[nombre].'</td>';
                    echo '<td>'.$producto[descripcion].'</td>';
                    echo '<td>'.$producto[precio].'</td>';
                    //echo '<td>'.$producto[imagen].'</td>';
                    echo '<td><button type="button" class="btn btn-warning">Ver</button></td>';

                    echo '<td class="text-center" style="width: 5%">';
                    echo '<form action="s-editaProdTermSel.php" method="post">';
                    echo '<button type="submit" name="id" value="'.$producto[id].'" class="btn btn-primary">';
                    echo 'Editar';
                    echo '</button>';
                    echo '</form>';
                    echo '</td>';

                    echo '<td style="width: 5%">';
                    echo '<form action="funciones/supervisor.php"'.$proveedor[id].'"" method="post">';
                    echo '<input type="hidden" name="idel" value="'.$proveedor[id].'">';
                    echo '<button type="submit" name="accion" value="eliminarProveedor" class="btn btn-danger">';
                    echo 'Eliminar';
                    echo '</button>';
                    echo '</form>';

                    echo '</td>';

                  }
                }
                $conn->close();

                echo '</tr>';
              ?>


            </tbody>
          </table>
          <?php
            if(isset($_GET["msj"]) && $_GET["msj"] == "actualizado") {
                  echo '<div class="alert alert-success">Proveedor actualizado</div>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == "registro") {
                  echo '<div class="alert alert-danger">Error en registro</div>';
            }
            if(isset($_GET["msj"]) && $_GET["msj"] == "minmax") {
                  echo '<div class="alert alert-danger">Mínimo mayor que máximo</div>';
            }
            if(isset($_GET["msj"]) && $_GET["msj"] == "eliminado") {
                  echo '<div class="alert alert-success">Registro eliminado</div>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == "eliminacion") {
                  echo '<div class="alert alert-danger">No se pudo eliminar el registro</div>';
            }
          ?>
        </div>
      </div>




    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>
