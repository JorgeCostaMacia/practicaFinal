<?php

class Lineas_pedidosCRUD{
    public function select($connection, $dataContent, $col, $more){
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

    public function insert($connection, $dataContent, $maxCod_pedido){
        $crud = new ArticulosCRUD();

        $query = 'INSERT INTO lineas_pedidos VALUE(:cod_linea, ' . $maxCod_pedido . ', :cod_articulo, :precio, :cantidad, :iva, :total, "pendiente")';
        $bindParams = ["cod_linea", "cod_articulo", "precio", "cantidad","iva", "total"];
        $indexLinea = 0;

        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "cod_articulo") !== false) {
                $values[$indexLinea]["cod_linea"] = $indexLinea;
                $codArticulo = explode("-", $key)[1];

                $crud->select($connection, $dataContent, 'precio, iva', 'WHERE cod_articulo=' . $codArticulo);

                if($dataContent->getSuccess()){
                    $values[$indexLinea]["cod_articulo"] = $codArticulo;
                    $values[$indexLinea]["precio"] = $dataContent->getArticulos()[0]->getPrecio();
                    $values[$indexLinea]["cantidad"] = $post;
                    $values[$indexLinea]["iva"] = $dataContent->getArticulos()[0]->getIva();
                    $values[$indexLinea]["total"] = $dataContent->getArticulos()[0]->getPrecio() * $post + ($dataContent->getArticulos()[0]->getIva() * $dataContent->getArticulos()[0]->getPrecio() * $post);
                    $indexLinea++;
                }
                $dataContent->setArticulos(array());
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

    public function updateCantidad($connection, $dataContent){
        $query = 'UPDATE lineas_pedidos SET cantidad=:cantidad, total=:total WHERE cod_pedido=' . $_POST["cod_pedido"] .  ' AND cod_linea=:cod_linea';
        $bindParams = ["cantidad", "total", "cod_linea"];
        $index = 0;
        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "cod_linea") !== false) {
                if ($post > 0) {
                    $this->select($connection, $dataContent, '*', 'WHERE cod_linea=' . explode("-", $key)[1]);
                    $values[$index]["cantidad"] = $post;
                    $values[$index]["total"] = $post * $dataContent->getLineasPedidos()[0]->getPrecio() + ($post * $dataContent->getLineasPedidos()[0]->getPrecio() * $dataContent->getLineasPedidos()[0]->getIva());
                    $values[$index]["cod_linea"] = explode("-", $key)[1];
                    $index++;
                }
            }
        }

        if(count($values[0]) > 0){
            $result = $connection->prepare($query, $bindParams, $values);
            if ($result["success"]) {
                $dataContent->setSuccess(true);
            }
            else {
                $dataContent->setSuccess(false);
                $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            }
        }
        else {
            $dataContent->setSuccess(true);
        }

        return $values;
    }

    public function updateEstadoPrepare($connection, $dataContent, $estado, $values){
        $query = 'UPDATE lineas_pedidos SET estado="' . $estado . '" WHERE cod_pedido=' . $_POST["cod_pedido"] .  ' AND cod_linea=:cod_linea';
        $bindParams = ["cod_linea"];

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

    public function updateEstado($connection, $dataContent, $estado){
        $query = 'UPDATE lineas_pedidos SET estado="' . $estado . '" WHERE cod_pedido=' . $_POST["cod_pedido"] .  ' AND cod_linea=:cod_linea';
        $bindParams = ["cod_linea"];
        $index = 0;
        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "cod_linea") !== false) {
                $values[$index]["cod_linea"] = explode("-", $key)[1];
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