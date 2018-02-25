<?php

class Lineas_facturasCRUD{
    public function insert($connection, $dataContent, $maxCod_factura){
        $crud = new Lineas_albaranesCRUD();

        $query = 'INSERT INTO lineas_facturas VALUE(:cod_linea, ' . $maxCod_factura . ',' . $_POST["cod_albaran"] .', :cod_articulo, :precio, :cantidad, :descuento, :iva, :total, "pendiente")';
        $bindParams = ["cod_linea", "cod_articulo", "precio", "cantidad", "descuento", "iva", "total"];
        $indexLinea = 0;

        $values = [];
        $values[] = [];
        foreach($_POST as $key=>$post){
            if(strpos($key, "cantidad-") !== false) {
                $cod_linea = explode("-", $key)[1];
                $crud->select($connection, $dataContent, '*', 'WHERE cod_albaran=' . $_POST["cod_albaran"] . " AND cod_linea=" . $cod_linea);

                if($dataContent->getSuccess()){
                    $values[$indexLinea]["cod_linea"] =  $cod_linea;
                    $values[$indexLinea]["cod_articulo"] = $dataContent->getLineasAlbaranes()[0]->getCodArticulo();
                    $values[$indexLinea]["precio"] = $dataContent->getLineasAlbaranes()[0]->getPrecio();
                    $values[$indexLinea]["cantidad"] = $dataContent->getLineasAlbaranes()[0]->getCantidad();
                    $values[$indexLinea]["descuento"] = $dataContent->getLineasAlbaranes()[0]->getDescuento();
                    $values[$indexLinea]["iva"] = $dataContent->getLineasAlbaranes()[0]->getIva();
                    $values[$indexLinea]["total"] =  $dataContent->getLineasAlbaranes()[0]->getTotal();
                    $indexLinea++;
                }

                $dataContent->setLineasAlbaranes(array());
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