<?php

class Registro {
    function selectCliente($connection, $contendData) {
        $result = $connection->select('nick, cif_dni', 'usuarios_cliente', 'WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');
        if ($result["success"]) {
            $contendData->setSuccess(true);
            $contendData->setUsuariosCliente($connection->format_select_Object($result["result"], 'Usuarios_cliente'));
        }
        else {
            $contendData->setSuccess(false);
            $contendData->addErrores(new DBerror("Se produjo un error durante el registro"));
            $contendData->addErrores($result["error"]);
        }
    }
    function selectSolicitud($connection, $contendData){
        $result = $connection->select('*', 'solicitudes', 'WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');
        if ($result["success"]) {
            $contendData->setSuccess(true);
            $contendData->setSolicitudes($connection->format_select_Object($result["result"], 'Solicitudes'));
        }
        else {
            $contendData->setSuccess(false);
            $contendData->addErrores(new DBerror("Se produjo un error durante el registro"));
            $contendData->addErrores($result["error"]);
        }
    }
    function insertSolicitud($connection, $contendData){
        $result = $connection->insert('solicitudes(cif_dni, nombre_completo, razon_social, domicilio_social, ciudad, email, telefono, nick, password)', '("' . strtoupper(trim($_POST["cif_dni"])) . '","' . trim($_POST["nombre_completo"]) . '","'  . trim($_POST["razon_social"]) . '","' . trim($_POST["domicilio_social"]) . '","' . trim($_POST["ciudad"]) . '","' . trim($_POST["email"]) . '","' . trim($_POST["telefono"]) . '","' . trim($_POST["nick"]) . '","' . trim($_POST["password"]) . '")');
        if ($result["success"]) {
            $contendData->setSuccess(true);
        }
        else {
            $contendData->setSuccess(false);
            $contendData->addErrores(new DBerror("Se produjo un error durante el registro"));
            $contendData->addErrores($result["error"]);
        }
    }
}