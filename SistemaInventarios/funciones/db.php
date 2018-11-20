<?php
  $host     = "localhost";
  $port     = 8080;
  $socket   = "";
  $user     = "root";
  $password = "root";
  $dbname   = "inventario";

  echo "<br><br><hr>";
  $conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
         or die ('No se pudo conectar a la base de datos' . mysqli_connect_error());

  if($conn->connect_error) {
    echo $error = $conn->connect_error;
  }
  else {
    echo "conectado";
  }

?>
