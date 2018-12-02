<?php
  require("db.php");
  require("proveedor.php");
  date_default_timezone_set("America/Mexico_City");

  class Gerente{

    private $connS;
    private $pvr;

    public function __construct($c,$p) {
        $this->connG = $c;
        $this->pvr = $p;
    }

    public function ordenarCompra(){
      if (isset($_POST['idi']) && isset($_POST['idp']) && isset($_POST['cantidad']) && isset($_POST['costo']) && isset($_POST['tiempoEntrega'])) {
        $this->pvr->setId($_POST['idp']);
        $this->pvr->setInsumo($_POST['idi']);
        $this->pvr->setPrecio($_POST['costo']);
        $this->pvr->setTiempoEntrega($_POST['tiempoEntrega']);

        $idProveedor=$this->pvr->getId();
        $idInsumo=$this->pvr->getInsumo();
        $costo=$this->pvr->getPrecio();
        $tiempoEntrega=$this->pvr->getTiempoEntrega();

        $cantidad=$_POST['cantidad'];
        $importe=$cantidad*$costo;

        $fecha=date("Y-m-d H:i:s");
        $fechaEntrega=strtotime('+'.$tiempoEntrega.' minutes',strtotime($fecha));
        $fechaEntrega=date("Y-m-d H:i:s",$fechaEntrega);

        $ordenarCompra="INSERT INTO comprainsumos (idInsumo,idProveedor,cantidad,importe,fechaCompra,fechaEntrega,estado) VALUES ('$idInsumo','$idProveedor','$cantidad','$importe','$fecha','$fechaEntrega',0)";
        if($this->connG->query($ordenarCompra)){
          header("Location: ../g-ordenarCompra.php?msj=compra");
        }
        else {
          header("Location: ../g-ordenarCompra.php?error=accion");
        }
        $this->connG->close();

      }
      else {
        header("Location: ../g-ordenarCompra.php");
      }
    }

    public function ubicarProducto(){
      if (isset($_POST['producto']) && isset($_POST['ubicacion'])) {
        $producto=$_POST['producto'];
        $ubicacion=$_POST['ubicacion'];
        $moverProducto="UPDATE almacenproductos SET ubicacion='$ubicacion' WHERE id='$producto'";
        if ($this->connG->query($moverProducto)) {
          header("Location: ../g-ubicacionInsumos.php?msj=ubicacionP");
        }
        else {
          header("Location: ../g-ubicacionInsumos.php?error=accion");
        }
        $this->connG->close();
      }
      else {
        header("Location: ../g-ubicacionInsumos.php");
      }
    }

    public function ubicarInsumo(){
      if (isset($_POST['insumo']) && isset($_POST['ubicacion'])) {
        $insumo=$_POST['insumo'];
        $ubicacion=$_POST['ubicacion'];
        $moverInsumo="UPDATE almaceninsumos SET ubicacion='$ubicacion' WHERE id='$insumo'";
        if ($this->connG->query($moverInsumo)) {
          header("Location: ../g-ubicacionInsumos.php?msj=ubicacionI");
        }
        else {
          header("Location: ../g-ubicacionInsumos.php?error=accion");
        }
        $this->connG->close();
      }
      else {
        header("Location: ../g-ubicacionInsumos.php");
      }
    }

    public function registrarInsumos(){
      if (isset($_POST['idi']) && isset($_POST['idc']) && isset($_POST['cantidad']) && isset($_POST['ubicacion'])) {
        $idInsumo=$_POST['idi'];
        $idCompra=$_POST['idc'];
        $cantidad=$_POST['cantidad'];
        $ubicacion=$_POST['ubicacion'];

        $comprado="UPDATE comprainsumos SET estado=1 WHERE id='$idCompra'";

        if ($this->connG->query($comprado)) {
          for ($i=0; $i<$cantidad; $i++) {
            $fecha=date("Y-m-d H:i:s");
            $registrar="INSERT INTO almaceninsumos (idInsumo,ubicacion,fechaAlta) VALUES ('$idInsumo','$ubicacion','$fecha')";
            $this->connG->query($registrar);
          }
          $this->connG->close();
          header("Location: ../g-registroInsumos.php?msj=registrado");
        }
        else{
          header("Location: ../g-registroInsumos.php?error=accion");
        }
      }
      else {
        header("Location: ../g-registroInsumos.php");
      }
    }

    public function bajaProducto(){
      if(isset($_POST['producto'])){
        $producto=$_POST['producto'];

        $comprobarSalida="SELECT * FROM salidasgerente WHERE idObjeto='$producto'";
        $resultado = $this->connG->query($comprobarSalida);
        $count = mysqli_num_rows($resultado);

        if($count>0){
          header("Location: ../g-bajaInsumos.php?error=solicitud");
        }
        else {
          $solicitud="INSERT INTO salidasgerente (tipo,idObjeto) VALUES (1,'$producto')";
          if ($this->connG->query($solicitud)) {
            header("Location: ../g-bajaInsumos.php?msj=solicitud");
          }
          else {
            header("Location: ../g-bajaInsumos.php?error=accion");
          }
        }

      }
      else {
        header("Location: ../g-bajaInsumos.php");
      }
    }

    public function bajaInsumo(){
      if(isset($_POST['insumo'])){
        $insumo=$_POST['insumo'];

        $comprobarSalida="SELECT * FROM salidasgerente WHERE idObjeto='$insumo'";
        $resultado = $this->connG->query($comprobarSalida);
        $count = mysqli_num_rows($resultado);

        if($count>0){
          header("Location: ../g-bajaInsumos.php?error=solicitud");
        }
        else {
          $solicitud="INSERT INTO salidasgerente (tipo,idObjeto) VALUES (0,'$insumo')";
          if ($this->connG->query($solicitud)) {
            header("Location: ../g-bajaInsumos.php?msj=solicitud");
          }
          else {
            header("Location: ../g-bajaInsumos.php?error=accion");
          }
        }

      }
      else {
        header("Location: ../g-bajaInsumos.php");
      }
    }

  }

  $ger = new Gerente($conn,$pvrObj);

  if (isset($_POST["accion"]) && $_POST["accion"] == "ordenarCompra") {
    $ger->ordenarCompra();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "ubicarProducto") {
    $ger->ubicarProducto();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "ubicarInsumo") {
    $ger->ubicarInsumo();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "registrarInsumos") {
    $ger->registrarInsumos();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "bajaProducto") {
    $ger->bajaProducto();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "bajaInsumo") {
    $ger->bajaInsumo();
  }
  else{
    header("Location: ../g-ordenarCompra.php");
  }
?>
