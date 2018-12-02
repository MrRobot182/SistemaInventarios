<?php
  session_start();
  require("db.php");
  require("productoTerminado.php");
  date_default_timezone_set("America/Mexico_City");

  class Cliente{

    private $connC;
    private $prt;

    public function __construct($c,$p) {
        $this->connC = $c;
        $this->prt = $p;
    }

    public function agregarCarrito(){
      if (!isset($_POST['idp']) && !isset($_POST['nombrep']) && !isset($_POST['precio']) && !isset($_POST['talla']) && !isset($_POST['color']) && !isset($_POST['cantidad'])) {
        header("Location: ../productos.php");
      }
      else {
        $idProducto = $_POST['idp'];
        $nombre = $_POST['nombrep'];
        $precio = $_POST['precio'];
        $talla = $_POST['talla'];
        $color = $_POST['color'];
        $cantidad = $_POST['cantidad'];
        $importe = $precio*$cantidad;
        //$this->prt->setPrecio(number_format($_POST["precio"], 2, '.', ''));

        echo $idProducto." ".$precio." ".$talla." ".$color." ".$cantidad." ".$importe;



        if (in_array($idProducto, $_SESSION['idProducto'])) {
          header("Location: ../carrito.php?msj=ya_agregado");
        }
        else {
          $_SESSION['producto'][] = $nombre;
          $_SESSION['idProducto'][] = $idProducto;
          $_SESSION['cantidad'][] = $cantidad;
          $_SESSION['color'][] = $color;
          $_SESSION['talla'][] = $talla;
          $_SESSION['importe'][] = number_format($importe, 2, '.', '');
          var_dump($_SESSION);

          header("Location: ../carrito.php");
        }
      }
    }

    public function eliminarCarrito(){
      if (!isset($_POST['indice'])) {
        header("Location: ../productos.php");
      }
      else {
        $indice = $_POST['indice'];
        unset($_SESSION['producto'][$indice]);
        unset($_SESSION['idProducto'][$indice]);
        unset($_SESSION['cantidad'][$indice]);
        unset($_SESSION['color'][$indice]);
        unset($_SESSION['talla'][$indice]);
        unset($_SESSION['importe'][$indice]);
        header("Location: ../carrito.php");
      }
    }

    public function confirmarCompra(){
      if (!isset($_POST['comprar']) && !isset($_POST['direccion']) && !isset($_POST['captcha'])) {
        header("Location: ../productos.php");
      }
      else {

        if ($_SESSION["captcha"] == $_POST["captcha"]) {

          $consultaId = "SELECT id FROM cliente WHERE correo='$_SESSION[usuario]'";
          $resultado = $this->connC->query($consultaId);
          $cliente = $resultado->fetch_assoc();
          $idCliente = $cliente[id];
          $fecha = date("Y-m-d H:i:s");
          $direccion = $_POST['direccion'];

          foreach ($_SESSION['producto'] as $key => $value) {
            $idProducto=$_SESSION['idProducto'][$key];
            $cantidad=$_SESSION['cantidad'][$key];
            $color=$_SESSION['color'][$key];
            $talla=$_SESSION['talla'][$key];
            $importe=$_SESSION['importe'][$key];

            $realizarCompra="INSERT INTO compra (idCliente,idProducto,cantidad,color,talla,importe,fecha,direccion,estado)
            VALUES ('$idCliente','$idProducto','$cantidad','$color','$talla','$importe','$fecha','$direccion',0)";
            $this->connC->query($realizarCompra);
          }

          unset($_SESSION['producto']);
          unset($_SESSION['idProducto']);
          unset($_SESSION['cantidad']);
          unset($_SESSION['color']);
          unset($_SESSION['talla']);
          unset($_SESSION['importe']);

          header("Location: ../historial.php?msj=comprado");
        }
        else {
          header("Location: ../carrito.php?msj=captcha");
        }

      }
    }

    public function cancelarCompra(){
      if (!isset($_POST['cancelar'])) {
        header("Location: ../productos.php");
      }
      else {
        $cancelar = $_POST['cancelar'];
        $consultaId = "SELECT id FROM cliente WHERE correo='$_SESSION[usuario]'";
        $resultado = $this->connC->query($consultaId);
        $cliente = $resultado->fetch_assoc();
        $idCliente = $cliente[id];

        $eliminar = "DELETE FROM compra WHERE id='$cancelar' AND idCliente='$idCliente'";
        $this->connC->query($eliminar);
        $eliminados=$this->connC->affected_rows;

        if ($eliminados==1) {
          header("Location: ../historial.php?msj=eliminado");
        }
        else if ($eliminados==0) {
          header("Location: ../historial.php?error=accion");
        }

        $this->connC->close();
      }
    }

  }

  $cli = new Cliente($conn,$ptObj);

  if (isset($_POST["accion"]) && $_POST["accion"] == "agregarCarrito") {
    $cli->agregarCarrito();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "eliminarCarrito") {
    $cli->eliminarCarrito();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "confirmarCompra") {
    $cli->confirmarCompra();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "cancelarCompra") {
    $cli->cancelarCompra();
  }
  else{
    header("Location: ../productos.php");
  }
?>
