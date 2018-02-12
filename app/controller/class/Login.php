<?php

class Login {
    function selectCliente($connection, $dataContent) {
        $result = $connection->select('*', 'usuarios_cliente', 'WHERE nick="' . trim($_POST["nick"]) . '" AND password="' . trim($_POST["password"]) . ' "AND estado="activo"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setUsuariosCliente($connection->format_select_Object($result["result"], 'Usuarios_cliente'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el logeo"));
            $dataContent->addErrores($result["error"]);
        }
    }
    function selectGestion($connection, $dataContent) {
        $result = $connection->select('*', 'usuarios_gestion', 'WHERE nick="' . trim($_POST["nick"]) . '" AND password="' . trim($_POST["password"]) . '" AND estado="activo"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setUsuariosGestion($connection->format_select_Object($result["result"], 'Usuarios_gestion'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el logeo"));
            $dataContent->addErrores($result["error"]);
        }
    }
}