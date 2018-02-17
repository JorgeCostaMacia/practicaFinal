<?php

class AjaxLimitado {
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

    function registro(){
        $crud = new Usuarios_clienteCRUD();
        $crud->select($this->connection, $this->dataContent, 'nick, cif_dni','WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');
        $crud = new SolicitudesCRUD();
        $crud->select($this->connection, $this->dataContent, '*','WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');

        if(count($this->dataContent->getUsuariosCliente()) === 0 && count($this->dataContent->getSolicitudes()) === 0){
            $crud->insert($this->connection, $this->dataContent);
        }
    }
}
