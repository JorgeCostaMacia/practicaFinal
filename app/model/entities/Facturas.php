<?php

class Facturas {
    private $cod_factura;
    private $cod_cliente;
    private $fecha;
    private $descuento;
    private $concepto;
    private $countLineas;

    public function getCodFactura() { return $this->cod_factura; }
    public function setCodFactura($cod_factura) { $this->cod_factura = $cod_factura; }

    public function getCodCliente() { return $this->cod_cliente; }
    public function setCodCliente($cod_cliente) { $this->cod_cliente = $cod_cliente; }

    public function getFecha() { return $this->fecha; }
    public function setFecha($fecha) { $this->fecha = $fecha; }

    public function getDescuento() { return $this->descuento; }
    public function setDescuento($descuento) { $this->descuento = $descuento; }

    public function getConcepto() { return $this->concepto; }
    public function setConcepto($concepto) { $this->concepto = $concepto; }

    public function getCountLineas(){return $this->countLineas;}
    public function setCountLineas($_countLineas){$this->countLineas = $_countLineas;}
}