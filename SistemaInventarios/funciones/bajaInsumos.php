<?php
    require_once "db.php"; //Toma el archivo de conexión a la BDD

    // Verifico si están deifnidos los datos mediante POST
    // y verifica si no están vacíos
    if (isset($_POST['insumo']) &&
        isset($_POST['ubicacion']) &&
        isset($_POST['cantidad']) &&
        $_POST['insumo'] != "" &&
        $_POST['ubicacion'] != "" &&
        $_POST['cantidad'] != ""
      ) {
        //almaceno en variables
          $insumo = $_POST['insumo'];
          $ubicacion = $_POST['ubicacion'];
          $cantidad = $_POST['cantidad'];

          echo "<br />" . $insumo;
          echo "<br />" . $ubicacion;
          echo "<br />" . $cantidad;

          date_default_timezone_set('America/Mexico_City');
          $fecha = date('Y-m-d H:i:s');

          // ¡PENDIENTE !
          $query = "
          INSERT INTO `salidainsumos`(
              `id`,
              `idInsumo`,
              `cantidad`,
              `ubicacion`
          )
          VALUES(NULL, '$insumo', '$cantidad', '$ubicacion');
          ";


          if (mysqli_query($conn, $query)) {
              echo "Creado correctamente";
              echo $insumo . "<br />";
              echo $ubicacion . "<br />";
              echo $cantidad . "<br />";
              header("Location: ../g-registroInsumos.php?estado=insertSuccess");

          } else {
              echo "<br />Error: " . $query . "<br>" . mysqli_error($conn);
              echo $insumo . "<br />";
              echo $ubicacion . "<br />";
              echo $cantidad . "<br />";
              header("Location: ../g-registroInsumos.php?estado=insertError");
          }

        } else {

                      echo "<br />" . $insumo;
                      echo "<br />" . $ubicacion;
                      echo "<br />" . $cantidad;
        header("Location: ../g-registroInsumos.php?estado=varNoDefinidas");
    }







?>
