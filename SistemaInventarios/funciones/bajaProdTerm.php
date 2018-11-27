<?php
    require_once "db.php"; //Toma el archivo de conexión a la BDD

    // Verifico si están deifnidos los datos mediante POST
    // y verifica si no están vacíos
    if (isset($_POST['id']) &&
        $_POST['id'] != ""
      ) {
        //almaceno en variables
          $id = $_POST['id'];
          $idBaja = [];
          $i=0;
          global $conn;
          $queryC = mysqli_query($conn, "SELECT * FROM salidaproductos");

          while ($c=mysqli_fetch_array($queryC)) {
            $idBaja[$i] = $c['idBaja'];
            $i++;
          }

          $ejecutarQuery = 0;
          for ($i=0; $i < count($idBaja); $i++) {
            if ($id==$idBaja[$i]) {
              $ejecutarQuery = 1;
            }
          }

          if ($ejecutarQuery==0) {
            $queryC = mysqli_query($conn, "INSERT INTO `salidaproductos` (`id`, `idBaja`) VALUES (NULL, '$id');");
            if ($queryC) {
              echo "insertado";
              header("Location: ../g-bajaInsumos.php?msj=dbok");
            } else {
              header("Location: ../g-bajaInsumos.php?msj=dberror");
            }
          } else {
            header("Location: ../g-bajaInsumos.php?msj=pendant");
          }


          // ¡PENDIENTE !
          $query = "
          INSERT INTO `salidaproductos`(`id`, `idBaja`)
          VALUES(NULL, '". $id ."');
          ";




        } else {

                      echo "<br />" . $id;
        //header("Location: ../g-registroInsumos.php?estado=varNoDefinidas");
    }


?>
