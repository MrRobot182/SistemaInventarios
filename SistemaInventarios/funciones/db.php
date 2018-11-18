<?php
    $conn = new mysqli('localhost', 'root','n0m3l0','inventarios'); //cambiale la contraseña, la mia es la de n0m3l0

    if($conn->connect_error) {
      echo $error = $conn->connect_error;
    }
?>
