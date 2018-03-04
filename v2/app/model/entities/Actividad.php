<?php

class Actividad {
    private $cod_actividad;
    private $cod_usuario;
    private $tipo_usuario;
    private $cod_tabla;
    private $cod_linea;
    private $tabla;
    private $accion;
    private $fecha;

    public function getCodActividad(){return $this->cod_actividad;}
    public function setCodActividad($cod_actividad){$this->cod_actividad = $cod_actividad;}

    public function getCodUsuario(){return $this->cod_usuario;}
    public function setCodUsuario($cod_usuario){$this->cod_usuario = $cod_usuario;}

    public function getTipoUsuario(){return $this->tipo_usuario;}
    public function setTipoUsuario($tipo_usuario){$this->tipo_usuario = $tipo_usuario;}

    public function getCodTabla(){return $this->cod_tabla;}
    public function setCodTabla($cod_tabla){$this->cod_tabla = $cod_tabla;}

    public function getCodLinea(){return $this->cod_linea;}
    public function setCodLinea($cod_linea){$this->cod_linea = $cod_linea;}

    public function getTabla(){return $this->tabla;}
    public function setTabla($tabla){$this->tabla = $tabla;}

    public function getAccion(){return $this->accion;}
    public function setAccion($accion){$this->accion = $accion;}

    public function getFecha(){return $this->fecha;}
    public function setFecha($fecha){$this->fecha = $fecha;}
}