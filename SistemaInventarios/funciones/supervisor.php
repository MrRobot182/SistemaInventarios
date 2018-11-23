<?php
  require("db.php");
  require("proveedor.php");
  require("productoTerminado.php");

  class Supervisor{

    private $connS;
    private $pvr;
    private $prt;

    public function __construct($c,$p,$t) {
        $this->connS = $c;
        $this->pvr = $p;
        $this->prt = $t;
    }

    public function autorizarSalida(){
      echo $_POST["idc"]." autorizada";
    }

    public function eliminarSalida(){
      echo $_POST["idc"]." eliminada";
    }

    public function registrarProveedor(){

      $buscarProveedor = "SELECT * FROM proveedor";
      $resultado = $this->connS->query($buscarProveedor);
      $count = mysqli_num_rows($resultado);

      if ($count == 2) {
        header("Location: ../s-registroProveedores.php?error=maximo");
      }
      else {
        if (isset($_POST["nombre"]) && isset($_POST["insumo"]) && isset($_POST["maximo"]) && isset($_POST["minimo"]) && isset($_POST["precio"]) && isset($_POST["tiempoEntrega"])) {
          $this->pvr->setNombre(strtoupper($_POST["nombre"]));
          $this->pvr->setInsumo($_POST["insumo"]);
          $this->pvr->setMinimo($_POST["minimo"]);
          $this->pvr->setMaximo($_POST["maximo"]);
          $this->pvr->setPrecio(number_format($_POST["precio"], 2, '.', ''));
          $this->pvr->setTiempoEntrega($_POST["tiempoEntrega"]);

          $nombre = $this->pvr->getNombre();
          $insumo = $this->pvr->getInsumo();
          $maximo = $this->pvr->getMaximo();
          $minimo = $this->pvr->getMinimo();
          $precio = $this->pvr->getPrecio();
          $tiempoEntrega = $this->pvr->getTiempoEntrega();

          $registrar = "INSERT INTO proveedor (nombre,idInsumo,costo,maximo,minimo,tiempoEntrega) VALUES ('$nombre','$insumo','$precio','$maximo','$minimo','$tiempoEntrega')";

          if ($minimo>$maximo) {
            header("Location: ../s-registroProveedores.php?msj=minmax");
          }
          else {
            if($this->connS->query($registrar)){
              header("Location: ../s-registroProveedores.php?msj=registrado");
            }
            else{
              header("Location: ../s-registroProveedores.php?error=registro");
            }
          }

        }
        else {
          header("Location: ../s-registroProveedores.php?error=registro");
        }

      }
      $this->connS->close();

    }

    public function editarProveedor(){
      if (isset($_POST["nombre"]) && isset($_POST["insumo"]) && isset($_POST["maximo"]) && isset($_POST["minimo"]) && isset($_POST["precio"]) && isset($_POST["tiempoEntrega"])) {
        $this->pvr->setId($_POST["id"]);
        $this->pvr->setNombre(strtoupper($_POST["nombre"]));
        $this->pvr->setInsumo($_POST["insumo"]);
        $this->pvr->setMinimo($_POST["minimo"]);
        $this->pvr->setMaximo($_POST["maximo"]);
        $this->pvr->setPrecio(number_format($_POST["precio"], 2, '.', ''));
        $this->pvr->setTiempoEntrega($_POST["tiempoEntrega"]);

        $id = $this->pvr->getId();
        $nombre = $this->pvr->getNombre();
        $insumo = $this->pvr->getInsumo();
        $maximo = $this->pvr->getMaximo();
        $minimo = $this->pvr->getMinimo();
        $precio = $this->pvr->getPrecio();
        $tiempoEntrega = $this->pvr->getTiempoEntrega();

        $actualizar = "UPDATE proveedor SET nombre='$nombre',idInsumo='$insumo',costo='$precio',maximo='$maximo',minimo='$minimo',tiempoEntrega='$tiempoEntrega' WHERE id='$id'";

        if ($minimo>$maximo) {
          header("Location: ../s-editaProveedores.php?msj=minmax");
        }
        else {
          if($this->connS->query($actualizar)){
            header("Location: ../s-editaProveedores.php?msj=actualizado");
          }
          else{
            header("Location: ../s-editaProveedores.php?error=registro");
          }
        }

      }

      $this->connS->close();
    }

    public function eliminarProveedor(){
      $this->pvr->setId($_POST["idel"]);
      $id = $this->pvr->getId();

      $eliminar = "DELETE FROM proveedor WHERE id='$id'";
      if ($this->connS->query($eliminar)) {
        header("Location: ../s-editaProveedores.php?msj=eliminado");
      }
      else {
        header("Location: ../s-editaProveedores.php?error=eliminacion");
      }
      $this->connS->close();
    }

    public function registrarProdTerm(){
      if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["imagen"])) {
        $this->prt->setNombre(strtoupper($_POST["nombre"]));
        $this->prt->setDescripcion($_POST["descripcion"]);
        $this->prt->setPrecio(number_format($_POST["precio"], 2, '.', ''));
        $this->prt->setImagen('img/productos/'.$_POST["imagen"]);

        $nombre = $this->prt->getNombre();
        $descripcion = $this->prt->getDescripcion();
        $precio = $this->prt->getPrecio();
        $imagen = $this->prt->getImagen();

        $registrar = "INSERT INTO producto (nombre,descripcion,precio,img) VALUES ('$nombre','$descripcion','$precio','$imagen')";

        if($this->connS->query($registrar)){
          header("Location: ../s-registroProdTerm.php?msj=registrado");
        }
        else{
          header("Location: ../s-registroProdTerm.php?error=registro");
        }

        $this->connS->close();
      }
    }

    public function editarProdTerm(){
      if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["imagen"])) {
        $this->prt->setId($_POST["id"]);
        $this->prt->setNombre(strtoupper($_POST["nombre"]));
        $this->prt->setDescripcion($_POST["descripcion"]);
        $this->prt->setPrecio(number_format($_POST["precio"], 2, '.', ''));
        $this->prt->setImagen('img/productos/'.$_POST["imagen"]);

        $id = $this->prt->getId();
        $nombre = $this->prt->getNombre();
        $descripcion = $this->prt->getDescripcion();
        $precio = $this->prt->getPrecio();
        $imagen = $this->prt->getImagen();

        $actualizar = "UPDATE producto SET nombre='$nombre',descripcion='$descripcion',precio='$precio',img='$imagen' WHERE id='$id'";

        if($this->connS->query($actualizar)){
          header("Location: ../s-editaProdTerm.php?msj=actualizado");
        }
        else{
          header("Location: ../s-editaProdTerm.php?error=registro");
        }
      }
      else {
        header("Location: ../s-editaProdTerm.php?error=registro");
      }

    }

    public function eliminarProdTerm(){
      $this->prt->setId($_POST["idel"]);
      $id = $this->prt->getId();

      $buscarProducto = "SELECT * FROM almacenproductos WHERE idProducto='$id'";
      $resultado = $this->connS->query($buscarProducto);
      $count = mysqli_num_rows($resultado);

      if ($count > 0) {
        header("Location: ../s-editaProdTerm.php?msj=existencias");
      }
      else{
        $eliminar = "DELETE FROM producto WHERE id='$id'";
        if ($this->connS->query($eliminar)) {
          header("Location: ../s-editaProdTerm.php?msj=eliminado");
        }
        else {
          header("Location: ../s-editaProdTerm.php?error=eliminacion");
        }
      }


      $this->connS->close();
    }
  }

  $sup = new Supervisor($conn,$pvrObj,$ptObj);

  if (isset($_POST["accion"]) && $_POST["accion"] == "registrarProveedor") {
    $sup->registrarProveedor();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "editarProveedor") {
    $sup->editarProveedor();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "eliminarProveedor") {
    $sup->eliminarProveedor();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "registrarProdTerm") {
    $sup->registrarProdTerm();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "editarProdTerm") {
    $sup->editarProdTerm();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "eliminarProdTerm") {
    $sup->eliminarProdTerm();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "autorizarSalida") {
    $sup->autorizarSalida();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "eliminarSalida") {
    $sup->eliminarSalida();
  }
  else{
    header("Location: ../s-autorizacionSalidas.php");
  }
?>
