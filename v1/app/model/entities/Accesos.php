<?php

class Accesos {
    private $cod_acceso;
    private $cod_gestor;
    private $nombre_gestor;
    private $fecha_hora_acceso;
    private $fecha_hora_salida;

    public function getCodAcceso() { return $this->cod_acceso; }
    public function setCodAcceso($cod_acceso) { $this->cod_acceso = $cod_acceso; }

    public function getCodGestor() { return $this->cod_gestor; }
    public function setCodGestor($cod_gestor) { $this->cod_gestor = $cod_gestor; }

    public function getNombreGestor(){return $this->nombre_gestor;}
    public function setNombreGestor($nombre_gestor){$this->nombre_gestor = $nombre_gestor;}

    public function getFechaHoraAcceso() { return $this->fecha_hora_acceso; }
    public function setFechaHoraAcceso($fecha_hora_acceso) { $this->fecha_hora_acceso = $fecha_hora_acceso; }

    public function getFechaHoraSalida() { return $this->fecha_hora_salida; }
    public function setFechaHoraSalida($fecha_hora_salida) { $this->fecha_hora_salida = $fecha_hora_salida; }
}