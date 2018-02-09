<?php

class Actividad {
    private $cod_actividad;
    private $tipo_usuario;
    private $cod_gestor;
    private $cod_cliente;
    private $accion;
    private $tabla;
    private $campos;
    private $valores;
    private $condiciones;
    private $fecha;

    public function getCodActividad() { return $this->cod_actividad; }
    public function setCodActividad($cod_actividad) { $this->cod_actividad = $cod_actividad; }

    public function getTipoUsuario() { return $this->tipo_usuario; }
    public function setTipoUsuario($tipo_usuario) { $this->tipo_usuario = $tipo_usuario; }

    public function getCodGestor() { return $this->cod_gestor; }
    public function setCodGestor($cod_gestor) { $this->cod_gestor = $cod_gestor; }

    public function getCodCliente() { return $this->cod_cliente; }
    public function setCodCliente($cod_cliente) { $this->cod_cliente = $cod_cliente; }

    public function getAccion() { return $this->accion; }
    public function setAccion($accion) { $this->accion = $accion; }

    public function getTabla() { return $this->tabla; }
    public function setTabla($tabla) { $this->tabla = $tabla; }

    public function getCampos() { return $this->campos; }
    public function setCampos($campos) { $this->campos = $campos; }

    public function getValores() { return $this->valores; }
    public function setValores($valores) { $this->valores = $valores; }

    public function getCondiciones() { return $this->condiciones; }
    public function setCondiciones($condiciones) { $this->condiciones = $condiciones; }

    public function getFecha() { return $this->fecha; }
    public function setFecha($fecha) { $this->fecha = $fecha; }
}