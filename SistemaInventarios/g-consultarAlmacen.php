<?php

  require_once "funciones/db.php";
  include_once "templates/header.php";
  include_once "templates/navbarGerente.php";

?>
    <div class="col-12 col-md-9 col-lg-10 px-4 px-sm-5 pt-4 sidebar-left ">

      <div class="row border-bottom">
        <h3>Almacén de productos</h3>
      </div>
      <table class="table table-hover table-responsive-md table-light rounded table-sm my-4">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ubicación</th>
            <th>Talla</th>
            <th>Color</th>
            <th>Fecha de alta</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $consultaAlmacenP = "SELECT a.id,b.nombre,a.ubicacion,a.fechaAlta,a.talla,a.color FROM almacenproductos a INNER JOIN producto b ON a.idProducto=b.id  ORDER BY fechaAlta ASC";
            if($resultado=$conn->query($consultaAlmacenP)){
              while ($productoAlmacen=mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo '<td>'.$productoAlmacen['id'].'</td>';
                echo '<td>'.$productoAlmacen['nombre'].'</td>';
                echo '<td>'.$productoAlmacen['ubicacion'].'</td>';
                echo '<td>'.$productoAlmacen['talla'].'</td>';
                echo '<td>'.$productoAlmacen['color'].'</td>';
                echo '<td>'.$productoAlmacen['fechaAlta'].'</td>';
                echo "</tr>";
              }
            }
            else {
              echo "Error";
            }
          ?>
        </tbody>
      </table>



      <div class="row border-bottom mt-4">
        <h3>Almacén de insumos</h3>
      </div>
      <table class="table table-hover table-responsive-md table-light rounded table-sm my-4">
        <thead>
          <tr>
            <th>ID</th>
            <th>Insumo</th>
            <th>Ubicación</th>
            <th>Fecha de alta</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $consultaAlmacenI = "SELECT a.id,b.nombre,a.ubicacion,a.fechaAlta FROM almaceninsumos a INNER JOIN insumo b ON a.idInsumo=b.id  ORDER BY fechaAlta ASC";
            if($resultado=$conn->query($consultaAlmacenI)){
              while ($insumoAlmacen=mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo '<td>'.$insumoAlmacen['id'].'</td>';
                echo '<td>'.$insumoAlmacen['nombre'].'</td>';
                echo '<td>'.$insumoAlmacen['ubicacion'].'</td>';
                echo '<td>'.$insumoAlmacen['fechaAlta'].'</td>';
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



    </div>
  </div>
</div>

<?php include_once "templates/scripts.php"?>
