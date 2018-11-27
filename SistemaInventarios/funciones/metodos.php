<?php


    function validaMaxMin($max, $min, $cantidad){
      if ($cantidad <= $max && $cantidad >= $min) {
        return 1;
      } else {
        return 0;
      }
    }


    function consultaAlmacen1 () {
        global $conn;
        $query = mysqli_query($conn, "
        SELECT
            almacenproductos.id,
            almacenproductos.idProducto,
            almacenproductos.ubicacion,
            almacenproductos.fechaAlta,
            almacenproductos.talla,
            almacenproductos.color,
            producto.nombre,
            producto.descripcion
        FROM
            almacenproductos
        JOIN producto ON almacenproductos.idProducto = producto.id
        WHERE almacenproductos.ubicacion = 1
        ");


        $productos = [];  // creo vector vacio
        $conteo = 0; // variable para contar

        while ($f=mysqli_fetch_array($query)) {
          $productos[$conteo] = $f['nombre']; //Meto a un vector todos los valores
          $conteo++;
        }

        if (empty($productos)) {
          echo "<tr>
            <td>
              No hay productos registrados.
            </td>
          </tr>";
        } else {
          //consulto cantidad de x producto y la agrupo
          $valores = $productos;
          $contagem = array_count_values($valores);
          foreach($contagem AS $numero => $vezes) {
            if($vezes > 0) {
              echo "<tr>
                <td>". $numero . " </td>
                <td>" . $vezes . " </td>
              </tr>";

            }
          }
      }
    }

    function consultaAlmacen2 () {
        global $conn;
        $query = mysqli_query($conn, "
        SELECT
            almacenproductos.id,
            almacenproductos.idProducto,
            almacenproductos.ubicacion,
            almacenproductos.fechaAlta,
            almacenproductos.talla,
            almacenproductos.color,
            producto.nombre,
            producto.descripcion
        FROM
            almacenproductos
        JOIN producto ON almacenproductos.idProducto = producto.id
        WHERE almacenproductos.ubicacion = 2
        ");


        $productos = [];  // creo vector vacio
        $conteo = 0; // variable para contar

        while ($f=mysqli_fetch_array($query)) {
          $productos[$conteo] = $f['nombre']; //Meto a un vector todos los valores
          $conteo++;
        }
        if (empty($productos)) {
          echo "
          <tr>
            <td>
              No hay productos registrados.
            </td>
          </tr>
          ";
        } else {
          //consulto cantidad de x producto y la agrupo
          $valores = $productos;
          $contagem = array_count_values($valores);
          foreach($contagem AS $numero => $vezes) {
            if($vezes > 0) {
              echo "<tr>
                <td>" . $numero . " </td>
                <td>" . $vezes  . " </td>
              </tr>";

            }
          }
      }
    }


    function consultaAlmacen3 () {
        global $conn;
        $query = mysqli_query($conn, "
        SELECT
            almacenproductos.id,
            almacenproductos.idProducto,
            almacenproductos.ubicacion,
            almacenproductos.fechaAlta,
            almacenproductos.talla,
            almacenproductos.color,
            producto.nombre,
            producto.descripcion
        FROM
            almacenproductos
        JOIN producto ON almacenproductos.idProducto = producto.id
        WHERE almacenproductos.ubicacion = 3
        ");


        $productos = [];  // creo vector vacio
        $conteo = 0; // variable para contar

        while ($f=mysqli_fetch_array($query)) {
          $productos[$conteo] = $f['nombre']; //Meto a un vector todos los valores
          $conteo++;
        }
        if (empty($productos)) {
          echo "<tr>
            <td>
              No hay productos registrados.
            </td>
          </tr>";
        } else {
          //consulto cantidad de x producto y la agrupo
          $valores = $productos;
          $contagem = array_count_values($valores);
          foreach($contagem AS $numero => $vezes) {
            if($vezes > 0) {
              echo "<tr>
                <td>". $numero . " </td>
                <td>" . $vezes . " </td>
              </tr>";

            }
          }
      }
    }
    // esta no se ocupará
    function consultaAlmacenProdTerminado() {
        global $conn;
        $query = mysqli_query($conn, "
          SELECT
              almacenproductos.id,
              almacenproductos.idProducto,
              almacenproductos.ubicacion,
              almacenproductos.fechaAlta,
              producto.id,
              producto.nombre
          FROM
              almacenproductos
          JOIN producto ON almacenproductos.id = producto.id
        ");


        $productos = [];  // creo vector vacio
        $idProductos = [];
        $conteo = 0; // variable para contar

        while ($f=mysqli_fetch_array($query)) {
          $productos[$conteo] = $f['nombre']; //Meto a un vector todos los valores
          $idProductos[$conteo] = $f['id'];
          $conteo++;
        }

        //print_r ($idProductos);

        //for ($i=0; $i < $conteo; $i++) {
        //  echo "<br />Producto: " . $productos[$i] . " - id: " . $idProductos[$i];
        //}

        if (empty($productos)) {
          echo "<h2>No hay productos registrados.</h2>";
        } else {
          //consulto cantidad de x producto y la agrupo
          $contagem = array_count_values($productos);
          $conteo=1;

          foreach($contagem AS $nombre => $vezes) {
            if($vezes > 0) {

              $clave = array_search($nombre, $productos, true);
              //echo "<br />" . $nombre . " - " . $clave;
              echo "<option value='" . $idProductos[$clave] . "'>" . $nombre . "</option>";
              //echo "<br />Resultado -> " . $nombre . " - >" . $idProductos[$clave];
              //echo "<br />idProducto: " . $idProductos;4

            }
            $conteo+=1;
          }
       }
    }


    function consultaAlmacenInsumos () {
        global $conn;
        $query = mysqli_query($conn, "
          SELECT
          	almaceninsumos.id,
            almaceninsumos.idInsumo,
            almaceninsumos.ubicacion,
            almaceninsumos.fechaAlta,
            insumo.id,
            insumo.nombre
          FROM
              almaceninsumos
          JOIN insumo ON almaceninsumos.idInsumo = insumo.id
        ");


        $productos = [];  // creo vector vacio
        $idProductos = [];
        $conteo = 0; // variable para contar

        while ($f=mysqli_fetch_array($query)) {
          $productos[$conteo] = $f['nombre']; //Meto a un vector todos los valores
          $idProductos[$conteo] = $f['id'];
          $conteo++;
        }

        //print_r ($idProductos);

        //for ($i=0; $i < $conteo; $i++) {
        //  echo "<br />Producto: " . $productos[$i] . " - id: " . $idProductos[$i];
        //}

        if (empty($productos)) {
          echo "<h2>No hay productos registrados.</h2>";
        } else {
          //consulto cantidad de x producto y la agrupo
          $contagem = array_count_values($productos);
          $conteo=1;

          foreach($contagem AS $nombre => $vezes) {
            if($vezes > 0) {

              $clave = array_search($nombre, $productos, true);
              //echo "<br />" . $nombre . " - " . $clave;
              echo "<option value='" . $idProductos[$clave] . "'>" . $nombre . "</option>";
              //echo "<br />Resultado -> " . $nombre . " - >" . $idProductos[$clave];
              //echo "<br />idProducto: " . $idProductos;4

            }
            $conteo+=1;
          }
       }
    }

    function consultaProveedor(){
      global $conn;
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

      $proveedor = [];
      $i = 0;

      while ($g = mysqli_fetch_assoc($query)) {
        echo '<form class="" action="funciones/regInsumos.php" method="post">';

        echo  "
              <div class='form-group'>
                <label>Proveedor: </label>
              ";
        echo "<input type='text' class='form-control' name='tipoInsumo' required value='";
        echo $g['nombreIns'];
        echo "'";
        echo "</div>";

        echo  "
              <div class='form-group'>
                <label>Proveedor: </label>
              ";
        echo "<input type='text' class='form-control' name='tipoInsumo' required value='";
        echo $g['nombreIns'];
        echo "'";
        echo "</div>";

        echo  "
              <div class='form-group'>
                <label>Proveedor: </label>
              ";
        echo "<input type='text' class='form-control' name='tipoInsumo' required value='";
        echo $g['nombreIns'];
        echo "'";
        echo "</div>";

        echo  "
              <div class='form-group'>
                <label>Proveedor: </label>
              ";
        echo "<input type='text' class='form-control' name='tipoInsumo' required value='";
        echo $g['nombreIns'];
        echo "'";
        echo "</div>";

        echo  "
              <div class='form-group'>
                <label>Proveedor: </label>
              ";
        echo "<input type='text' class='form-control' name='tipoInsumo' required value='";
        echo $g['nombreIns'];
        echo "'";
        echo "</div>";

        echo  "
              <div class='form-group'>
                <label>Proveedor: </label>
              ";
        echo "<input type='text' class='form-control' name='tipoInsumo' required value='";
        echo $g['nombreIns'];
        echo "'";
        echo "</div>";

        echo  "
              <div class='form-group'>
                <label>Proveedor: </label>
              ";
        echo "<input type='text' class='form-control' name='tipoInsumo' required value='";
        echo $g['nombreIns'];
        echo "'";
        echo "</div>";

        echo "</form>";
      }

    }



    function consultaBajaProdTerm () {
        global $conn;
        $query = mysqli_query($conn, "
          SELECT
              almacenproductos.id,
              almacenproductos.idProducto,
              almacenproductos.ubicacion,
              almacenproductos.fechaAlta,
              almacenproductos.talla,
              almacenproductos.color,
              producto.nombre
          FROM
              almacenproductos
          JOIN producto ON almacenproductos.idProducto = producto.id
        ");



        while ($f=mysqli_fetch_array($query)) {
          echo "<option value='" . $f['id'] . "'>" . $f['id'] . " - " . $f['nombre'] . " - " . $f['ubicacion'] . " - " . $f['fechaAlta'] . " - " . $f['talla'] . " - " . $f['color'] . "</option>";
        }

        //print_r ($idProductos);

        //for ($i=0; $i < $conteo; $i++) {
        //  echo "<br />Producto: " . $productos[$i] . " - id: " . $idProductos[$i];
        //}

        if (empty($productos)) {
          echo "<h2>No hay Producto Terminado Registrado.</h2>";
        } else {
          echo "<option>" . $f['nombre'] . " - " . $f[''] . "</option>";
       }
    }

    function consultaProducto () {
      global $conn;
      $query = mysqli_query($conn, "SELECT * from producto");
      while ($f=mysqli_fetch_array($query)) {
        echo $f['nombre'] . " " . $f['descripcion'] . " " . $f['precio'];
        echo "<img src='" . $f['img'] . "' />";
      }
    }

    function consultaHistorial () {
      global $conn;
      //FALTA AGREGAR WHERE IDCliente = variable sesion del cliente
      $sql = mysqli_query($conn, "
        SELECT
            compra.id,
            compra.idCliente,
            compra.idProducto,
            compra.cantidad,
            compra.importe,
            compra.estado,
            compra.fecha,
            producto.nombre,
            producto.id AS idMostrar
        FROM
            compra
        JOIN producto ON compra.idProducto = producto.id
      ");

      while ($f=mysqli_fetch_array($sql)) {
        echo "<tr>";
          echo "<td>" . $f['id'] . "</td>";
          echo "<td>" . $f['fecha'] . "</td>";
          echo "<td>" . $f['nombre'] . "</td>";
          echo "<td>" . $f['cantidad'] . "</td>";
          echo "<td>" . $f['importe'] . "</td>";
          if ($f['estado']=="0") {
            echo "<td>Pendiente</td>";
          } else {
            echo "<td>En proceso</td>";
          }
        echo "</tr>";
      }
    }



?>
