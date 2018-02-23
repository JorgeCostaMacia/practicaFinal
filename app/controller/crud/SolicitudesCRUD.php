<?php

class SolicitudesCRUD{
    public function select($connection, $dataContent, $col, $more) {
        $result = $connection->select($col, 'solicitudes', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setSolicitudes($connection->format_select_Object($result["result"], 'Solicitudes'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function insert($connection, $dataContent){
        $result = $connection->insert('solicitudes(cif_dni, nombre_completo, razon_social, domicilio_social, ciudad, email, telefono, nick, password)', '("' . strtoupper(trim($_POST["cif_dni"])) . '","' . trim($_POST["nombre_completo"]) . '","'  . trim($_POST["razon_social"]) . '","' . trim($_POST["domicilio_social"]) . '","' . trim($_POST["ciudad"]) . '","' . trim($_POST["email"]) . '","' . trim($_POST["telefono"]) . '","' . trim($_POST["nick"]) . '","' . trim($_POST["password"]) . '")');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function delete($connection, $dataContent, $where){
        $result = $connection->delete('solicitudes', $where);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }
}