<?php

class Articulos {
    private $cod_articulo;
    private $nombre;
    private $descripcion;
    private $precio;
    private $descuento;
    private $iva;
    private $activo;

    public function getCodArticulo() { return $this->cod_articulo; }
    public function setCodArticulo($cod_articulo) { $this->cod_articulo = $cod_articulo; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getDescripcion() { return $this->descripcion; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }

    public function getPrecio() { return $this->precio; }
    public function setPrecio($precio) { $this->precio = $precio; }

    public function getDescuento() { return $this->descuento; }
    public function setDescuento($descuento) { $this->descuento = $descuento; }

    public function getIva() { return $this->iva; }
    public function setIva($iva) { $this->iva = $iva; }

    public function getActivo() { return $this->activo; }
    public function setActivo($activo) { $this->activo = $activo; }
}