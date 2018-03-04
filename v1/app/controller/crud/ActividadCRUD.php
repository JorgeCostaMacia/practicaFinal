<?php

class ActividadCRUD{
    public function insert($connection, $dataContent, $cod_pedido, $tabla, $accion, $cod_usuario, $usuario){
        $result = $connection->insert('actividad(cod_usuario, tipo_usuario, cod_tabla, tabla, accion, fecha)', '(' . $cod_usuario . ', "' . $usuario .'",' . $cod_pedido . ', "' . $tabla. '", "' . $accion . '","' . date("Y-m-d H:i:s") . '")');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        } else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function prepareLineas($connection, $dataContent, $cod, $values, $tabla, $accion, $cod_usuario, $usuario){
        $query2 = 'INSERT INTO actividad(cod_usuario, tipo_usuario, cod_tabla, cod_linea, tabla, accion, fecha) VALUE(' . $cod_usuario . ',"' . $usuario .'", ' . $cod . ',:cod_linea, "' . $tabla . '", "' . $accion . '","' . date("Y-m-d H:i:s") . '")';
        $bindParams2 = ["cod_linea"];
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

    public function select($connection, $dataContent, $col, $more){
        $result = $connection->select($col, 'actividad', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setActividad($connection->format_select_Object($result["result"], 'Actividad'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

}