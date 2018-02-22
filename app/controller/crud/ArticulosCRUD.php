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

    function insert($connection, $dataContent, $nombre, $descripcion, $precio, $descuento, $iva) {
        $result = $connection->insert('articulos(nombre, descripcion, precio, descuento, iva, estado)', '("' . $nombre . '","' . $descripcion . '",' . $precio . ',' . $descuento . ',' . $iva . ',"activo")');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }


    function update($connection, $dataContent){
        $result = $connection->update('articulos', 'nombre="' . trim($_POST['nombre']) . '", descripcion="' . trim($_POST['descripcion']) . '", precio="' . trim($_POST['precio']) . '", descuento="' . trim($_POST['descuento']) . '", iva="' . trim($_POST['iva']) . '", estado="' . trim($_POST['estado']) . '"', 'WHERE cod_articulo="' . $_POST['cod_articulo'] . '"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }
}