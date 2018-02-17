<?php

class ArticulosCRUD{
    function select($connection, $dataContent, $col, $more) {
        $result = $connection->select($col, 'articulos', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setArticulos($connection->format_select_Object($result["result"], 'Articulos'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }
}