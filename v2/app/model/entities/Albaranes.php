<?php

class Albaranes {
    private $cod_albaran;
    private $cod_cliente;
    private $nombre_cliente;
    private $fecha;
    private $estado;
    private $lineas;

    public function getCodAlbaran() { return $this->cod_albaran; }
    public function setCodAlbaran($cod_albaran) { $this->cod_albaran = $cod_albaran; }

    public function getCodCliente() { return $this->cod_cliente; }
    public function setCodCliente($cod_cliente) { $this->cod_cliente = $cod_cliente; }

    public function getNombreCliente(){return $this->nombre_cliente;}
    public function setNombreCliente($nombre_cliente){$this->nombre_cliente = $nombre_cliente;}

    public function getFecha() { return $this->fecha; }
    public function setFecha($fecha) { $this->fecha = $fecha; }

    public function getEstado(){return $this->estado;}
    public function setEstado($estado){$this->estado = $estado;}

    public function getLineas(){return $this->lineas;}
    public function setLineas($_lineas){$this->lineas = $_lineas;}
}