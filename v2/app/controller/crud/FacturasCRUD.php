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


    public function insert($connection, $dataContent, $max_cod_factura, $usuarios){
        $codFactura = $max_cod_factura;
        $query = 'INSERT INTO facturas VALUES (:cod_factura,:cod_cliente,"' . date("Y-m-d") . '",0 ,"pendiente")';
        $bindParams = ["cod_factura", "cod_cliente"];
        $index = 0;
        $values = [];
        $values[] = [];
        foreach($usuarios as $key=>$cod){
            $values[$index]["cod_cliente"] = $cod;
            $values[$index]["cod_factura"] = $codFactura;
            $index++;
            $codFactura++;
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
            $dataContent->addErrores($result["error"]);
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