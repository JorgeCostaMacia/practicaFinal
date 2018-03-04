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
        $result = $connection->insert('albaranes', '(' . $cod_albaran . ',"' . trim($_POST["cod_cliente"]) . '","' . date("Y-m-d") . '","pendiente")');
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

    public function update($connection, $dataContent, $set){
        $result = $connection->update('albaranes', $set, 'WHERE cod_albaran="' . $_POST['cod_albaran'] . '"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function updateEstado($connection, $dataContent, $estado){
        $query = 'UPDATE albaranes SET estado="' . $estado . '" WHERE cod_albaran=:cod_albaran';
        $bindParams = ["cod_albaran"];
        $index = 0;
        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "albaran-") !== false) {
                $values[$index]["cod_albaran"] = explode("-", $key)[1];
                $index++;
            }
        }
        $result = $connection->prepare($query, $bindParams, $values);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }

        return $values;
    }

    public function delete($connection, $dataContent, $where){
        $result = $connection->delete('albaranes', $where);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }
    public function updateEstadoFactura($connection, $dataContent, $estado, $values){
        $query = 'UPDATE albaranes SET estado="' . $estado . '" WHERE cod_albaran=:cod_albaran';
        $bindParams = ["cod_albaran"];
        $values2 = [];
        $values2[] = [];
        foreach($values as $key=>$val){
            $values2[$key]["cod_albaran"] = $val["cod_tabla"];
        }
        $result = $connection->prepare($query, $bindParams, $values2);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }

        return $values2;
    }

}