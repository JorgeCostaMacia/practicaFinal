<?php

class Lineas_facturas {
    private $cod_linea;
    private $cod_factura;
    private $cod_articulo;
    private $precio;
    private $cantidad;
    private $descuento;
    private $iva;
    private $total;
    private $estado;

    public function getCodLinea() {return $this->cod_linea;}
    public function setCodLinea($cod_linea){$this->cod_linea = $cod_linea;}

    public function getCodFactura(){return $this->cod_factura;}
    public function setCodFactura($cod_factura){$this->cod_factura = $cod_factura;}

    public function getCodArticulo(){return $this->cod_articulo;}
    public function setCodArticulo($cod_articulo){$this->cod_articulo = $cod_articulo;}

    public function getPrecio(){return $this->precio;}
    public function setPrecio($precio){$this->precio = $precio;}

    public function getCantidad(){return $this->cantidad;}
    public function setCantidad($cantidad){$this->cantidad = $cantidad;}

    public function getDescuento(){return $this->descuento;}
    public function setDescuento($descuento){$this->descuento = $descuento;}

    public function getIva(){return $this->iva;}
    public function setIva($iva){$this->iva = $iva;}

    public function getTotal(){return $this->total;}
    public function setTotal($total){$this->total = $total;}

    public function getEstado(){return $this->estado;}
    public function setEstado($estado){$this->estado = $estado;}
}