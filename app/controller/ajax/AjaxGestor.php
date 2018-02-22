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
        $crud->select($this->connection, $this->dataContent,'*', 'WHERE nick="' . $_POST["nick"] . '" AND password="' . $_POST["password"] . '" AND estado="activo"');
    }

    public function acceso(){
        $crud = new Usuarios_gestionCRUD();
        $crud->select($this->connection, $this->dataContent, '*','WHERE nick="' . $_POST["nick"] . '" AND password="' . $_POST["password"] . '"');
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

    public function searchClientes(){
        $crud = new Usuarios_clienteCRUD();
        $crud->select($this->connection, $this->dataContent, '*', 'WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offest . ',' . $this->itemsPage);
    }

    public function updateCliente(){
        $crud = new Usuarios_clienteCRUD();
        $crud->update($this->connection, $this->dataContent);
    }

    public function searchGestores(){
        $crud = new Usuarios_gestionCRUD();
        $crud->select($this->connection, $this->dataContent, '*', 'WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offest . ',' . $this->itemsPage);
    }

    public function updateGestor(){
        $crud = new Usuarios_gestionCRUD();
        $crud->update($this->connection, $this->dataContent);
    }

    public function searchArticulos(){
        $crud = new ArticulosCRUD();
        $crud->select($this->connection, $this->dataContent, '*', 'WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offest . ',' . $this->itemsPage);
    }

    public function updateArticulo(){
        $crud = new ArticulosCRUD();
        $crud->update($this->connection, $this->dataContent);
    }

    public function altaArticulo(){
        $crud = new ArticulosCRUD();
        $crud->insert($this->connection, $this->dataContent, trim($_POST["nombre"]), trim($_POST["descripcion"]), $_POST["precio"], $_POST["descuento"], $_POST["iva"]);
    }

    public function altaCliente(){
        $crud = new SolicitudesCRUD();
        $crud->select($this->connection, $this->dataContent, '*','WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');
        $crud = new Usuarios_clienteCRUD();
        $crud->select($this->connection, $this->dataContent, 'nick, cif_dni','WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');

        if(count($this->dataContent->getUsuariosCliente()) === 0 && count($this->dataContent->getSolicitudes()) === 0) {
            $crud->insert($this->connection, $this->dataContent, trim(strtoupper($_POST["cif_dni"])), trim($_POST["nombre_completo"]), trim($_POST["razon_social"]), trim($_POST["domicilio_social"]), trim($_POST["ciudad"]), trim($_POST["email"]), trim($_POST["telefono"]), trim($_POST["nick"]), trim($_POST["password"]));
        }
    }

    public function altaGestor(){
        $crud = new Usuarios_gestionCRUD();
        $crud->select($this->connection, $this->dataContent, 'nick','WHERE nick="' . trim($_POST["nick"]) . '"');
        if(count($this->dataContent->getUsuariosGestion()) === 0) {
            $crud->insert($this->connection, $this->dataContent, trim($_POST["nombre_completo"]), trim($_POST["nick"]), trim($_POST["password"]));
        }
    }


}