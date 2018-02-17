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
}