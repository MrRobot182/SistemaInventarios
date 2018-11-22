<?php

  class ProductoTerminado{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $img;

    public function setId($idp) {
      $this->id = $idp;
    }
    public function getId() {
      return $this->id;
    }
    ////////////////////////////////////////////////////////////////////////////

    public function setNombre($nom) {
      $this->nombre = $nom;
    }
    public function getNombre() {
      return $this->nombre;
    }
    ////////////////////////////////////////////////////////////////////////////

    public function setDescripcion($des) {
      $this->descripcion = $des;
    }
    public function getDescripcion() {
      return $this->descripcion;
    }
    ////////////////////////////////////////////////////////////////////////////

    public function setPrecio($pre) {
      $this->precio = $pre;
    }
    public function getPrecio() {
      return $this->precio;
    }
    ////////////////////////////////////////////////////////////////////////////

    public function setImagen($ima) {
      $this->img = $ima;
    }
    public function getImagen() {
      return $this->img;
    }
    ////////////////////////////////////////////////////////////////////////////

  }

  $ptObj = new ProductoTerminado;

?>
