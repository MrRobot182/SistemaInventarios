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
          JOIN producto ON almacenproductos.idProducto = producto.id
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



?>
