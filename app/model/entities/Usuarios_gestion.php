<?php

class Usuarios_gestion {
    private $cod_gestor;
    private $nombre_completo;
    private $nick;
    private $password;
    private $activo;

    public function getCodGestor(){return $this->cod_gestor;}
    public function setCodGestor($cod_gestor){$this->cod_gestor = $cod_gestor;}

    public function getNombreCompleto(){return $this->nombre_completo;}
    public function setNombreCompleto($nombre_completo){$this->nombre_completo = $nombre_completo;}

    public function getNick(){return $this->nick;}
    public function setNick($nick){$this->nick = $nick;}

    public function getPassword(){return $this->password;}
    public function setPassword($password){$this->password = $password;}

    public function getActivo(){return $this->activo;}
    public function setActivo($activo){$this->activo = $activo;}
}