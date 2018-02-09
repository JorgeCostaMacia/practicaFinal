<?php

class Solicitudes {
    private $cod_solicitud;
    private $cif_dni;
    private $nombre_completo;
    private $razon_social;
    private $domicilio_social;
    private $ciudad;
    private $email;
    private $telefono;
    private $nick;
    private $password;

    public function getCodSolicitud(){return $this->cod_solicitud;}
    public function setCodSolicitud($cod_solicitud){$this->cod_solicitud = $cod_solicitud;}

    public function getCifDni(){return $this->cif_dni;}
    public function setCifDni($cif_dni){$this->cif_dni = $cif_dni;}

    public function getNombreCompleto(){return $this->nombre_completo;}
    public function setNombreCompleto($nombre_completo){$this->nombre_completo = $nombre_completo;}

    public function getRazonSocial(){return $this->razon_social;}
    public function setRazonSocial($razon_social){$this->razon_social = $razon_social;}

    public function getDomicilioSocial(){return $this->domicilio_social;}
    public function setDomicilioSocial($domicilio_social){$this->domicilio_social = $domicilio_social;}

    public function getCiudad(){return $this->ciudad;}
    public function setCiudad($ciudad){$this->ciudad = $ciudad;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email = $email;}

    public function getTelefono(){return $this->telefono;}
    public function setTelefono($telefono){$this->telefono = $telefono;}

    public function getNick(){return $this->nick;}
    public function setNick($nick){$this->nick = $nick;}

    public function getPassword(){return $this->password;}
    public function setPassword($password){$this->password = $password;}
}