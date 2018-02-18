<?php

class AjaxGestor{
    private $connection;
    private $dataContent;
    private $itemsPage;
    private $offset;

    public function __construct($connection, $dataContent){
        $this->connection = $connection;
        $this->dataContent = $dataContent;
        $this->itemsPage = 10;

        if(isset($_POST["numPage"])){
            $this->offest = ($_POST["numPage"] - 1) * $this->itemsPage;
        }

        if($this->connection->connection instanceof DBError){
            $this->dataContent->setSuccess(false);
            $this->dataContent->addErrores($this->connection->connection);
            echo $this->dataContent->toJson();
            die();
        }
    }

    public function login(){
        $crud = new Usuarios_gestionCRUD();
        $crud->select($this->connection, $this->dataContent,'*', 'WHERE nick="' . trim($_POST["nick"]) . '" AND password="' . trim($_POST["password"]) . '" AND estado="activo"');
    }

    public function acceso(){
        $crud = new Usuarios_gestionCRUD();
        $crud->select($this->connection, $this->dataContent, '*','WHERE nick="' . trim($_POST["nick"]) . '" AND password="' . trim($_POST["password"]) . '"');
        $crud = new AccesosCRUD();
        $crud->insert($this->connection, $this->dataContent);
    }

    public function updateUser(){
        $crud = new Usuarios_gestionCRUD();
        $crud->update($this->connection, $this->dataContent);
    }

    public function searchSolicitudes(){
        $crud = new SolicitudesCRUD();
        $crud->select($this->connection, $this->dataContent, '*', 'WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"');
    }

    public function aceptarSolicitud(){
        $this->connection->startTransaction();

        $crud = new SolicitudesCRUD();
        $crud->select($this->connection, $this->dataContent, '*', 'WHERE cod_solicitud=' . $_POST["cod_solicitud"]);
        $crud->delete($this->connection, $this->dataContent, 'cod_solicitud=' . $_POST["cod_solicitud"]);
        $crud = new Usuarios_clienteCRUD();
        $crud->insert($this->connection, $this->dataContent, $this->dataContent->getSolicitudes()[0]->getCifDni(), $this->dataContent->getSolicitudes()[0]->getNombreCompleto(), $this->dataContent->getSolicitudes()[0]->getRazonSocial(), $this->dataContent->getSolicitudes()[0]->getDomicilioSocial(), $this->dataContent->getSolicitudes()[0]->getCiudad(),$this->dataContent->getSolicitudes()[0]->getEmail(),$this->dataContent->getSolicitudes()[0]->getTelefono(),$this->dataContent->getSolicitudes()[0]->getNick(),$this->dataContent->getSolicitudes()[0]->getPassword());

        $this->connection->endTransaction($this->dataContent->getSuccess());
    }
    public function cancelarSolicitud(){
        $crud = new SolicitudesCRUD();
        $crud->delete($this->connection, $this->dataContent, 'cod_solicitud=' . $_POST["cod_solicitud"]);
    }
}