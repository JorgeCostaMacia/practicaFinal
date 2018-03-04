<?php

class Lineas_albaranesCRUD{
    public function select($connection, $dataContent, $col, $more) {
        $result = $connection->select($col, 'lineas_albaranes', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setLineasAlbaranes($connection->format_select_Object($result["result"], 'Lineas_albaranes'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function insert($connection, $dataContent, $maxCod_albaran){
        $crud = new ArticulosCRUD();

        $query = 'INSERT INTO lineas_albaranes VALUE(:cod_linea, ' . $maxCod_albaran . ',' . $_POST["cod_pedido"]. ', :cod_articulo, :precio, :cantidad, :descuento, :iva, :total, "pendiente")';
        $bindParams = ["cod_linea", "cod_articulo", "precio", "cantidad", "descuento", "iva", "total"];
        $indexLinea = 0;

        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "cod_linea") !== false) {
                $cod_linea = explode("-", $key)[1];
                $crud->select($connection, $dataContent, 'precio, iva, descuento', 'WHERE cod_articulo=' . $_POST["cod_articulo-" . $cod_linea]);

                if($dataContent->getSuccess()){
                    $values[$indexLinea]["cod_linea"] =  $cod_linea;
                    $values[$indexLinea]["cod_articulo"] = $_POST["cod_articulo-" . $cod_linea];
                    $values[$indexLinea]["precio"] = $dataContent->getArticulos()[0]->getPrecio();
                    $values[$indexLinea]["cantidad"] = $_POST["cantidad-" . $cod_linea];
                    $values[$indexLinea]["descuento"] = $dataContent->getArticulos()[0]->getDescuento();
                    $values[$indexLinea]["iva"] = $dataContent->getArticulos()[0]->getIva();
                    $values[$indexLinea]["total"] = $dataContent->getArticulos()[0]->getPrecio() * $_POST["cantidad-" . $cod_linea];
                    $values[$indexLinea]["total"] -= ($values[$indexLinea]["total"] * $values[$indexLinea]["descuento"] / 100);
                    $values[$indexLinea]["total"] += ($values[$indexLinea]["total"] * $dataContent->getArticulos()[0]->getIva() / 100);
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
            $dataContent->addErrores($result["error"]);
        }

        return $values;
    }

    public function update($connection, $dataContent){
        $query = 'UPDATE lineas_albaranes SET precio=:precio, descuento=:descuento, iva=:iva, total=:total WHERE cod_albaran=' . $_POST["cod_albaran"] .  ' AND cod_linea=:cod_linea';
        $bindParams = ["precio", "descuento", "iva", "total", "cod_linea"];
        $index = 0;
        $values = [];
        $values[] = [];
        $cantidad = 0;
        foreach($_POST as $key=>$post){
            if(strpos($key, "cantidad-") !== false) {
                if(!isset($_POST["borrar-" . explode("-", $key)[1]])){
                    $cantidad = $post;
                    $values[$index]["cod_linea"] = explode("-", $key)[1];
                }
            }
            else if(strpos($key, "precio-") !== false) {
                if(!isset($_POST["borrar-" . explode("-", $key)[1]])) {
                    $values[$index]["precio"] = $post;
                    $values[$index]["cod_linea"] = explode("-", $key)[1];
                }
            }
            else if(strpos($key, "descuento-") !== false) {
                if(!isset($_POST["borrar-" . explode("-", $key)[1]])) {
                    $values[$index]["descuento"] = $post;
                    $values[$index]["cod_linea"] = explode("-", $key)[1];
                }
            }
            else if(strpos($key, "iva-") !== false) {
                if(!isset($_POST["borrar-" . explode("-", $key)[1]])) {
                    $values[$index]["iva"] = $post;
                    $values[$index]["cod_linea"] = explode("-", $key)[1];
                    $values[$index]["total"] = $cantidad * $values[$index]["precio"];
                    $values[$index]["total"] -= ($values[$index]["total"] * $values[$index]["descuento"] / 100);
                    $values[$index]["total"] += ($values[$index]["total"] * $values[$index]["iva"] / 100);
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
    public function delete($connection, $dataContent){
        $query = 'DELETE FROM lineas_albaranes WHERE cod_albaran=' . $_POST["cod_albaran"] .  ' AND cod_linea=:cod_linea';
        $bindParams = ["cod_linea"];
        $index = 0;
        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "borrar-") !== false) {
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
    public function updateEstado($connection, $dataContent, $estado){
        $query = 'UPDATE lineas_albaranes SET estado="' . $estado . '" WHERE cod_albaran=:cod_albaran';
        $bindParams = ["cod_albaran"];
        $index = 0;
        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "albaran-") !== false) {
                    $values[$index]["cod_albaran"] = explode("-", $key)[1];
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

    public function updateEstadoFacturas($connection, $dataContent, $estado, $values){
        $query = 'UPDATE lineas_albaranes SET estado="' . $estado . '" WHERE cod_albaran=:cod_albaran AND cod_linea=:cod_linea';
        $bindParams = ["cod_albaran", "cod_linea"];

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