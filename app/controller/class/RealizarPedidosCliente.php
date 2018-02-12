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

    function insertArticulos($connection, $dataContent){
        $connection->startTransaction();

        $result = $connection->select('MAX(cod_pedido)', 'pedidos');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $maxCod_pedido = $connection->format_select_Assoc($result["result"])[0]['MAX(cod_pedido)'];
            $maxCod_pedido++;
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el proceso de pedidos"));
            $dataContent->addErrores($result["error"]);
        }

        $result = $connection->insert('pedidos', '(' . $maxCod_pedido . ',"' . trim($_POST["cod_cliente"]) . '","' . date("Y-m-d") . '","pendiente")');
        if ($result["success"]) {
            $dataContent->setSuccess(true);

            $query = 'INSERT INTO lineas_pedidos VALUE(:cod_linea, ' . $maxCod_pedido . ', :cod_articulo, :precio, :cantidad, :total, "pendiente")';
            $bindParams = ["cod_linea", "cod_articulo", "precio", "cantidad", "total"];
            $indexLinea = 0;

            $values = [];
            $values[] = [];
            foreach($_POST as $key=>$post){
                if($key !== "action" && $key !== "usuario" && $key !== "cod_cliente"){
                    $values[$indexLinea]["cod_linea"] = $indexLinea;
                    list($name, $codArticulo) = explode("-", $key);

                    $result = $connection->select('precio', 'articulos', 'WHERE cod_articulo=' . $codArticulo);
                    if ($result["success"]) {
                        $dataContent->setSuccess(true);
                        $precio = $connection->format_select_Assoc($result["result"])[0]['precio'];
                    }
                    else {
                        $dataContent->setSuccess(false);
                        $dataContent->addErrores(new DBerror("Se produjo un error durante el proceso de pedidos"));
                        $dataContent->addErrores($result["error"]);
                    }

                    $values[$indexLinea]["cod_articulo"] = $codArticulo;
                    $values[$indexLinea]["precio"] = $precio;
                    $values[$indexLinea]["cantidad"] = $post;
                    $values[$indexLinea]["total"] = $precio * $post;
                    $indexLinea++;
                }
            }

            $result = $connection->prepare($query, $bindParams, $values);

        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el proceso de pedidos"));
            $dataContent->addErrores($result["error"]);
        }

        if ($result["success"]) {
            $dataContent->setSuccess(true);

            $result = $connection->insert('actividad(cod_usuario, tipo_usuario, cod_tabla, tabla, accion, fecha)', '(' . trim($_POST['cod_cliente']) . ', "cliente",' . $maxCod_pedido . ', "pedidos", "crear","' . date("Y-m-d H:i:s") . '")');
            if ($result["success"]) {
                $dataContent->setSuccess(true);
            } else {
                $dataContent->setSuccess(false);
                $dataContent->addErrores(new DBerror("Se produjo un error durante el proceso de pedidos"));
                $dataContent->addErrores($result["error"]);
            }

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
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el proceso de pedidos"));
            $dataContent->addErrores($result["error"]);
        }

        $connection->endTransaction($result);

        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el proceso de pedidos"));
            $dataContent->addErrores($result["error"]);
        }
    }
}