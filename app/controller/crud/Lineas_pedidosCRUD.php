<?php

class Lineas_pedidosCRUD{
    function select($connection, $dataContent, $col, $more){
        $result = $connection->select($col, 'lineas_pedidos', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setLineasPedidos($connection->format_select_Object($result["result"], 'Lineas_pedidos'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    function insert($connection, $dataContent, $maxCod_pedido){
        $crud = new ArticulosCRUD();

        $query = 'INSERT INTO lineas_pedidos VALUE(:cod_linea, ' . $maxCod_pedido . ', :cod_articulo, :precio, :cantidad, :total, "pendiente")';
        $bindParams = ["cod_linea", "cod_articulo", "precio", "cantidad", "total"];
        $indexLinea = 0;

        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if($key !== "action" && $key !== "usuario" && $key !== "cod_cliente"){
                $values[$indexLinea]["cod_linea"] = $indexLinea;
                list($name, $codArticulo) = explode("-", $key);

                $crud->select($connection, $dataContent, 'precio', 'WHERE cod_articulo=' . $codArticulo);

                if($dataContent->getSuccess()){
                    $values[$indexLinea]["cod_articulo"] = $codArticulo;
                    $values[$indexLinea]["precio"] = $dataContent->getArticulos()[0]->getPrecio();
                    $values[$indexLinea]["cantidad"] = $post;
                    $values[$indexLinea]["total"] = $dataContent->getArticulos()[0]->getPrecio() * $post;
                    $indexLinea++;
                }
            }
        }

        $result = $connection->prepare($query, $bindParams, $values);

        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
        }

        return $values;
    }

    function update($connection, $dataContent){
        $query = 'UPDATE lineas_pedidos SET cantidad=:cantidad WHERE cod_pedido=' . $_POST["cod_pedido"] .  ' AND cod_linea=:cod_linea';
        $bindParams = ["cantidad", "cod_linea"];
        $index = 0;
        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "cod_linea") !== false) {
                if ($post > 0) {
                    $values[$index]["cantidad"] = $post;
                    $values[$index]["cod_linea"] = explode("-", $key)[1];
                    $index++;
                }
            }
        }

        $result = $connection->prepare($query, $bindParams, $values);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
        }

        return $values;
    }

    function delete($connection, $dataContent){
        $query = 'DELETE FROM lineas_pedidos WHERE cod_pedido=' . $_POST["cod_pedido"] .  ' AND cod_linea=:cod_linea';
        $bindParams = ["cod_linea"];
        $index = 0;
        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "cod_linea") !== false) {
                if ($post == 0) {
                    $values[$index]["cod_linea"] = explode("-", $key)[1];
                    $index++;
                }
            }
        }

        $result = $connection->prepare($query, $bindParams, $values);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
        }

        return $values;
    }
}