<?php

abstract class DependencyCRUD{
    private $accesosCRUD;
    private $actividadCRUD;
    private $albaranesCRUD;
    private $articulosCRUD;
    private $lineas_albaranesCRUD;
    private $lineas_pedidosCRUD;
    private $pedidosCRUD;
    private $solicitudesCRUD;
    private $usuarios_clienteCRUD;
    private $usuarios_gestionCRUD;

    public function getAccesosCRUD() {
        if (!$this->accesosCRUD) {
            $this->accesosCRUD = new AccesosCRUD();
            return $this->accesosCRUD;
        }
        else { return $this->accesosCRUD; }
    }

    public function getActividadCRUD(){
        if (!$this->actividadCRUD) {
            $this->actividadCRUD = new ActividadCRUD();
            return $this->actividadCRUD;
        }
        else { return $this->actividadCRUD; }
    }

    public function getAlbaranesCRUD(){
        if (!$this->albaranesCRUD) {
            $this->albaranesCRUD = new AlbaranesCRUD();
            return $this->albaranesCRUD;
        }
        else { return $this->albaranesCRUD; }
    }

    public function getArticulosCRUD(){
        if (!$this->articulosCRUD) {
            $this->articulosCRUD = new ArticulosCRUD();
            return $this->articulosCRUD;
        }
        else { return $this->articulosCRUD; }
    }

    public function getLineasAlbaranesCRUD(){
        if (!$this->lineas_albaranesCRUD) {
            $this->lineas_albaranesCRUD = new Lineas_albaranesCRUD();
            return $this->lineas_albaranesCRUD;
        }
        else { return $this->lineas_albaranesCRUD; }
    }

    public function getLineasPedidosCRUD(){
        if (!$this->lineas_pedidosCRUD) {
            $this->lineas_pedidosCRUD = new Lineas_pedidosCRUD();
            return $this->lineas_pedidosCRUD;
        }
        else { return $this->lineas_pedidosCRUD; }
    }

    public function getPedidosCRUD(){
        if (!$this->pedidosCRUD) {
            $this->pedidosCRUD = new PedidosCRUD();
            return $this->pedidosCRUD;
        }
        else { return $this->pedidosCRUD; }
    }

    public function getSolicitudesCRUD(){
        if (!$this->solicitudesCRUD) {
            $this->solicitudesCRUD = new SolicitudesCRUD();
            return $this->solicitudesCRUD;
        }
        else { return $this->solicitudesCRUD; }
    }

    public function getUsuariosClienteCRUD() {
        if (!$this->usuarios_clienteCRUD) {
            $this->usuarios_clienteCRUD = new Usuarios_clienteCRUD();
            return $this->usuarios_clienteCRUD;
        }
        else { return $this->usuarios_clienteCRUD; }
    }

    public function getUsuariosGestionCRUD() {
        if (!$this->usuarios_gestionCRUD) {
            $this->usuarios_gestionCRUD = new Usuarios_gestionCRUD();
            return $this->usuarios_gestionCRUD;
        }
        else { return $this->usuarios_gestionCRUD; }
    }



}