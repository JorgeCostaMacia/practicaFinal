<?php

class Ajax{
    private $dataContent;

    public function __construct(){
        $this->dataContent = new DataContent();
    }

    public function getDataContent(){return $this->dataContent;}
    public function setDataContent($dataContent){$this->dataContent = $dataContent;}

    public function checkConnection($connection){
        if($connection->connection instanceof DBError){
            $this->getDataContent()->setSuccess(false);
            $this->getDataContent()->addErrores($connection->connection);
            echo $this->getDataContent()->toJson();
            die();
        }
    }

    public function login($usuario, $connection){
        $login = new Login();

        if($usuario === "cliente"){ $login->selectCliente($connection, $this->getDataContent()); }
        else if($usuario === "gestor"){ $login->selectGestion($connection, $this->getDataContent()); }
    }

    public function acceso($connection){
        $login = new Login();
        $acceso = new Acceso();

        $login->selectGestion($connection, $this->getDataContent());
        $acceso->insertAcceso($connection, $this->getDataContent());
    }

    public function registro($connection){
        $registro = new RegistroCliente();

        $registro->selectCliente($connection, $this->getDataContent());
        $registro->selectSolicitud($connection, $this->getDataContent());

        if(count($this->getDataContent()->getUsuariosCliente()) === 0 && count($this->getDataContent()->getSolicitudes()) === 0){
            $registro->insertSolicitud($connection, $this->getDataContent());
        }
    }
    public function updateUsuario($connection){
        $update = new UpdateCliente();

        $update->updateCliente($connection, $this->getDataContent());
    }
    public function searchArticulosCliente($connection){
        $realizarPedidosCliente = new RealizarPedidosCliente();
        $realizarPedidosCliente->selectArticulos($connection, $this->getDataContent());
    }
    public function procesarArticulosCliente($connection){
        $realizarPedidosCliente = new RealizarPedidosCliente();
        $realizarPedidosCliente->insertArticulos($connection, $this->getDataContent());
    }

    public function searchPedidosCliente($connection){
        $searchPedidosCliente = new SearchPedidosCliente();
        $searchPedidosCliente->selectPedidos($connection, $this->getDataContent());
    }
}