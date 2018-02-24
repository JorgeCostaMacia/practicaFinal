<?php

class Lineas_albaranesCRUD{
    public function insert($connection, $dataContent, $maxCod_albaran){
        $crud = new ArticulosCRUD();

        $query = 'INSERT INTO lineas_albaranes VALUE(:cod_linea, ' . $maxCod_albaran . ', :cod_articulo, :precio, :cantidad, :descuento, :iva, :total, "pendiente")';
        $bindParams = ["cod_linea", "cod_articulo", "precio", "cantidad", "descuento", "iva", "total"];
        $indexLinea = 0;

        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "cod_linea") !== false) {
                list($name, $cod_linea) = explode("-", $key);
                $values[$indexLinea]["cod_linea"] = $indexLinea;
                $crud->select($connection, $dataContent, 'precio, iva, descuento', 'WHERE cod_articulo=' . $_POST["cod_articulo-" . $cod_linea]);

                if($dataContent->getSuccess()){
                    $values[$indexLinea]["cod_articulo"] = $_POST["cod_articulo-" . $cod_linea];
                    $values[$indexLinea]["precio"] = $dataContent->getArticulos()[0]->getPrecio();
                    $values[$indexLinea]["cantidad"] = $_POST["cantidad-" . $cod_linea];
                    $values[$indexLinea]["descuento"] = $dataContent->getArticulos()[0]->getDescuento();
                    $values[$indexLinea]["iva"] = $dataContent->getArticulos()[0]->getIva();
                    $values[$indexLinea]["total"] = $dataContent->getArticulos()[0]->getPrecio() * $_POST["cantidad-" . $cod_linea] + ($dataContent->getArticulos()[0]->getIva() * $dataContent->getArticulos()[0]->getPrecio() * $_POST["cantidad-" . $cod_linea]);
                    $values[$indexLinea]["total"] -= $values[$indexLinea]["total"] * $values[$indexLinea]["descuento"];
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
}