<?php

class Login {
    function selectCliente($connection, $contendData) {
        $result = $connection->select('*', 'usuarios_cliente', 'WHERE nick="' . trim($_POST["nick"]) . '" AND password="' . trim($_POST["password"]) . ' "AND estado="activo"');
        if ($result["success"]) {
            $contendData->setSuccess(true);
            $contendData->setUsuariosCliente($connection->format_select_Object($result["result"], 'Usuarios_cliente'));
        }
        else {
            $contendData->setSuccess(false);
            $contendData->addErrores(new DBerror("Se produjo un error durante el logeo"));
            $contendData->addErrores($result["error"]);
        }
    }
    function selectGestion($connection, $contendData) {
        $result = $connection->select('*', 'usuarios_gestion', 'WHERE nick="' . trim($_POST["nick"]) . '" AND password="' . trim($_POST["password"]) . '" AND estado="activo"');
        if ($result["success"]) {
            $contendData->setSuccess(true);
            $contendData->setUsuariosGestion($connection->format_select_Object($result["result"], 'Usuarios_gestion'));
        }
        else {
            $contendData->setSuccess(false);
            $contendData->addErrores(new DBerror("Se produjo un error durante el logeo"));
            $contendData->addErrores($result["error"]);
        }
    }
}