<?php

class Lineas_pedidos {
    private $cod_linea;
    private $cod_pedido;
    private $cod_articulo;
    private $precio;
    private $cantidad;
    private $total;
    private $estado;

    public function getCodLinea() {return $this->cod_linea;}
    public function setCodLinea($cod_linea){$this->cod_linea = $cod_linea;}

    public function getCodPedido(){return $this->cod_pedido;}
    public function setCodPedido($cod_pedido){$this->cod_pedido = $cod_pedido;}

    public function getCodArticulo(){return $this->cod_articulo;}
    public function setCodArticulo($cod_articulo){$this->cod_articulo = $cod_articulo;}

    public function getPrecio(){return $this->precio;}
    public function setPrecio($precio){$this->precio = $precio;}

    public function getCantidad(){return $this->cantidad;}
    public function setCantidad($cantidad){$this->cantidad = $cantidad;}

    public function getTotal(){return $this->total;}
    public function setTotal($total){$this->total = $total;}

    public function getEstado(){return $this->estado;}
    public function setEstado($estado){$this->estado = $estado;}
}