<?php

class ActividadCRUD{
    function insert($connection, $dataContent, $maxCod_pedido){
        $result = $connection->insert('actividad(cod_usuario, tipo_usuario, cod_tabla, tabla, accion, fecha)', '(' . trim($_POST['cod_cliente']) . ', "cliente",' . $maxCod_pedido . ', "pedidos", "crear","' . date("Y-m-d H:i:s") . '")');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        } else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    function prepare($connection, $dataContent, $maxCod_pedido , $values){
        $query2 = 'INSERT INTO actividad(cod_usuario, tipo_usuario, cod_tabla, cod_linea, tabla, accion, fecha) VALUE(' . trim($_POST['cod_cliente']) . ',"cliente", ' . $maxCod_pedido . ',:cod_linea, "lineas_pedidos", "crear","' . date("Y-m-d H:i:s") . '")';
        $bindParams2 = ["cod_linea", "cod_linea"];
        $values2 = [];
        $values2[] = [];

        foreach ($values as $key => $subValues) {
            foreach ($subValues as $key2 => $linea) {
                if ($key2 === "cod_linea") {
                    $values2[$key]["cod_linea"] = $linea;
                }
            }
        }

        $result = $connection->prepare($query2, $bindParams2, $values2);

        if ($result["success"]) {
            $dataContent->setSuccess(true);
        } else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
        }
    }

}