<?php


class Session {
    private $usuario;
    private $dataContent;

    public function __construct() {
        session_start();

        if(isset($_SESSION["usuario"])){ $this->usuario = &$_SESSION["usuario"]; }
        else {
            $_SESSION["usuario"] = null;
            $this->usuario = &$_SESSION["usuario"];
        }
        if(isset($_SESSION["dataContent"])){
            $this->dataContent = &$_SESSION["dataContent"];
        }
        else {
            $_SESSION["dataContent"] = new dataContent();
            $this->dataContent = &$_SESSION["dataContent"];
        }
    }

    public function getUsuario() {return $this->usuario;}
    public function setUsuario($usuario){$this->usuario = $usuario;}

    public function getDataContent(){return $this->dataContent;}
    public function setDataContent($dataContent){$this->dataContent = $dataContent;}

    public function initializer(){

    }

    public function destroy(){
        unset($_GET);
        unset($_POST);
        $_SESSION = [];
        session_destroy();
    }
}