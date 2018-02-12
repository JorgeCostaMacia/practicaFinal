<?php

class RealizarPedidosCliente {
    function selectArticulos($connection, $dataContent){
        $result = $connection->select('*', 'articulos', 'WHERE estado="activo" AND ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setArticulos($connection->format_select_Object($result["result"], 'Articulos'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el registro"));
            $dataContent->addErrores($result["error"]);
        }
    }
}