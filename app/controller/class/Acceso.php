<?php

class Acceso {
    function insertAcceso($connection, $dataContent){
        $connection->insert("accesos(cod_gestor, fecha_hora_acceso)", '(' . $dataContent->getUsuariosGestion()[0]->getCodGestor() . ',' . date("Y-m-d H:i:s") . ')');
    }
}