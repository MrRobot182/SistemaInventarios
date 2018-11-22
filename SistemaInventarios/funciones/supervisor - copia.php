<?php
  require("db.php");
  require("proveedor.php");

  class Supervisor{

    private $connS;
    public function __construct($c) {
        $this->connS = $c;
    }

    public function autorizarSalida(){

    }

    public function registrarProveedor(){

      $buscarProveedor = "SELECT * FROM proveedor";
      $resultado = $this->connS->query($buscarProveedor);
      $count = mysqli_num_rows($resultado);

      if ($count == 2) {
        header("Location: ../s-registroProveedores.php?error=maximo");
      }
      else {
        if (!empty($_POST["nombre"]) && !empty($_POST["insumo"]) && !empty($_POST["maximo"]) && !empty($_POST["minimo"]) && !empty($_POST["precio"]) && !empty($_POST["tiempoEntrega"])) {
          $nombre = strtoupper($_POST["nombre"]);
          $insumo = $_POST["insumo"];
          $minimo = $_POST["minimo"];
          $maximo = $_POST["maximo"];
          $precio = number_format($_POST["precio"], 2, '.', '');
          $tiempoEntrega = $_POST["tiempoEntrega"];

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

      }
      $this->connS->close();

    }

    public function editarProveedor(){
      if (!empty($_POST["nombre"]) && !empty($_POST["insumo"]) && !empty($_POST["maximo"]) && !empty($_POST["minimo"]) && !empty($_POST["precio"]) && !empty($_POST["tiempoEntrega"])) {
        $id = $_POST["id"];
        $nombre = strtoupper($_POST["nombre"]);
        $insumo = $_POST["insumo"];
        $minimo = $_POST["minimo"];
        $maximo = $_POST["maximo"];
        $precio = number_format($_POST["precio"], 2, '.', '');
        $tiempoEntrega = $_POST["tiempoEntrega"];
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
      $id = $_POST["idel"];
      $eliminar = "DELETE FROM proveedor WHERE id='$id'";
      if ($this->connS->query($eliminar)) {
        header("Location: ../s-editaProveedores.php?msj=eliminado");
      }
      else {
        header("Location: ../s-editaProveedores.php?error=eliminacion");
      }
      $this->connS->close();
    }

    public function editarProdTerm(){

    }

    public function eliminarProdTerm(){

    }
  }

  $sup = new Supervisor($conn);

  if (isset($_POST["accion"]) && $_POST["accion"] == "registrarProveedor") {
    $sup->registrarProveedor();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "editarProveedor") {
    $sup->editarProveedor();
  }
  else if (isset($_POST["accion"]) && $_POST["accion"] == "eliminarProveedor") {
    $sup->eliminarProveedor();
  }
?>
