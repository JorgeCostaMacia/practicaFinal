<?php

class RegistroCliente {
    function selectCliente($connection, $dataContent) {
        $result = $connection->select('nick, cif_dni', 'usuarios_cliente', 'WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setUsuariosCliente($connection->format_select_Object($result["result"], 'Usuarios_cliente'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el registro"));
            $dataContent->addErrores($result["error"]);
        }
    }
    function selectSolicitud($connection, $dataContent){
        $result = $connection->select('*', 'solicitudes', 'WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setSolicitudes($connection->format_select_Object($result["result"], 'Solicitudes'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el registro"));
            $dataContent->addErrores($result["error"]);
        }
    }
    function insertSolicitud($connection, $dataContent){
        $result = $connection->insert('solicitudes(cif_dni, nombre_completo, razon_social, domicilio_social, ciudad, email, telefono, nick, password)', '("' . strtoupper(trim($_POST["cif_dni"])) . '","' . trim($_POST["nombre_completo"]) . '","'  . trim($_POST["razon_social"]) . '","' . trim($_POST["domicilio_social"]) . '","' . trim($_POST["ciudad"]) . '","' . trim($_POST["email"]) . '","' . trim($_POST["telefono"]) . '","' . trim($_POST["nick"]) . '","' . trim($_POST["password"]) . '")');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el registro"));
            $dataContent->addErrores($result["error"]);
        }
    }
}