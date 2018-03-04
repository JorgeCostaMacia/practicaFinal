<?php

class FacturasCRUD{
    public function selectMax($connection, $dataContent){
        $result = $connection->select('MAX(cod_factura)', 'facturas');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $maxCod_pedido = $connection->format_select_Assoc($result["result"])[0]['MAX(cod_factura)'];
            return $maxCod_pedido + 1;
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function insert($connection, $dataContent, $cod_factura){
        $result = $connection->insert('facturas', '(' . $cod_factura . ',' . $_POST["cod_albaran"] . ',"' . trim($_POST["cod_cliente"]) . '","' . date("Y-m-d") . '",0 ,"pendiente")');
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
        $result = $connection->select($col, 'facturas', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setFacturas($connection->format_select_Object($result["result"], 'Facturas'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function delete($connection, $dataContent){
        $result = $connection->delete('facturas', 'cod_factura=' . $_POST["cod_factura"]);

        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
        }
    }

    public function update($connection, $dataContent, $set){
        $result = $connection->update('facturas', $set, 'WHERE cod_factura=' . $_POST["cod_factura"]);
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