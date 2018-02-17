<?php

class AccesosCRUD{
    function insert($connection, $dataContent){
        $result = $connection->insert("accesos(cod_gestor, fecha_hora_acceso)", '(' . $dataContent->getUsuariosGestion()[0]->getCodGestor() . ',"' . date("Y-m-d H:i:s") . '")');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        } else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }
    function updateSalida($connection, $dataContent, $fechaAcceso, $cod_gestor){
        $result = $connection->update("accesos", 'fecha_hora_salida="' . date("Y-m-d H:i:s") . '"', 'WHERE fecha_hora_acceso="' . $fechaAcceso . '" AND cod_gestor=' . $cod_gestor);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        } else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    function selectMax($connection, $dataContent, $more){
        $result = $connection->select('MAX(fecha_hora_acceso)', 'accesos', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            return $connection->format_select_Assoc($result["result"])[0]['MAX(fecha_hora_acceso)'];
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }
}