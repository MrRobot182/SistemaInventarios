<?php
	session_start();
	if (isset($_SESSION["logueado"])) {
		if($_SESSION["logueado"] == TRUE) {
			if ($_SESSION["tipoUsuario"] == 1) {
				header("Location: g-ordenarCompra.php");
			}
			else if ($_SESSION["tipoUsuario"] == 2) {
				header("Location: s-autorizacionSalidas.php");
			}
			else if ($_SESSION["tipoUsuario"] == 3) {
				header("Location: productos.php");
			}
		}
		else {
			header("Location: inicioSesion.php");
		}
  }
?>
