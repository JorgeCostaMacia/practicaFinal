<?php

class Usuarios_gestionCRUD{
    function select($connection, $dataContent, $col, $more) {
        $result = $connection->select($col, 'usuarios_gestion', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setUsuariosGestion($connection->format_select_Object($result["result"], 'Usuarios_gestion'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }
}