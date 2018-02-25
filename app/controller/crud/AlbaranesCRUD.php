<?php

class AlbaranesCRUD{
    public function selectMax($connection, $dataContent){
        $result = $connection->select('MAX(cod_albaran)', 'albaranes');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $maxCod_pedido = $connection->format_select_Assoc($result["result"])[0]['MAX(cod_albaran)'];
            return $maxCod_pedido + 1;
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }
    public function insert($connection, $dataContent, $cod_albaran){
        $result = $connection->insert('albaranes', '(' . $cod_albaran . ',' . $_POST["cod_pedido"] . ',"' . trim($_POST["cod_cliente"]) . '","' . date("Y-m-d") . '","pendiente")');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function select($connection, $dataContent, $col, $more) {
        $result = $connection->select($col, 'albaranes', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setAlbaranes($connection->format_select_Object($result["result"], 'Albaranes'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }
}