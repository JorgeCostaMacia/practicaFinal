<?php

class AjaxLimitado extends DependencyCRUD {
    private $connection;
    private $dataContent;
    private $itemsPage;
    private $offset;

    public function __construct($connection, $dataContent){
        $this->connection = $connection;
        $this->dataContent = $dataContent;
        $this->itemsPage = 10;

        if(isset($_POST["numPage"])){
            $this->offset = ($_POST["numPage"] - 1) * $this->itemsPage;
        }

        if($this->connection->connection instanceof DBError){
            $this->dataContent->setSuccess(false);
            $this->dataContent->addErrores($this->connection->connection);
            echo $this->dataContent->toJson();
            die();
        }
    }

    function registro(){
        $this->getUsuariosClienteCRUD()->select($this->connection, $this->dataContent, 'nick, cif_dni','WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');
        $this->getSolicitudesCRUD()->select($this->connection, $this->dataContent, '*','WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');

        if(count($this->dataContent->getUsuariosCliente()) === 0 && count($this->dataContent->getSolicitudes()) === 0){
            $this->getSolicitudesCRUD()->insert($this->connection, $this->dataContent);
        }
    }
}
