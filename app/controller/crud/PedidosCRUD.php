<?php

class PedidosCRUD{
    function selectMax($connection, $dataContent){
        $result = $connection->select('MAX(cod_pedido)', 'pedidos');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $maxCod_pedido = $connection->format_select_Assoc($result["result"])[0]['MAX(cod_pedido)'];
            return $maxCod_pedido + 1;
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    function select($connection, $dataContent, $col, $more) {
        $result = $connection->select($col, 'pedidos', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setPedidos($connection->format_select_Object($result["result"], 'Pedidos'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    function insert($connection, $dataContent, $cod_pedido){
        $result = $connection->insert('pedidos', '(' . $cod_pedido . ',"' . trim($_POST["cod_cliente"]) . '","' . date("Y-m-d") . '","pendiente")');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    function delete($connection, $dataContent, $where){
        $result = $connection->delete('pedidos', $where);
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