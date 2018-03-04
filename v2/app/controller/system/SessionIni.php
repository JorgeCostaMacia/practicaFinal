<?php

class SessionIni {
    public function ini($dependency){
        if($_POST["usuario"] === "cliente"){ $connection = $dependency->getDBcliente(); }
        else { $connection = $dependency->getDBgestor(); }

        if($connection->connection instanceof DBError){
            msjDanger('CONEXION', $connection->connection->getErrMessage());
            die();
        }

        if($_POST["usuario"] === "cliente"){
            $result = $connection->select('*', 'usuarios_cliente', 'WHERE nick="' . trim($_POST["nick"]) . '"');
            if ($result["success"]) { return $connection->format_select_Object($result["result"], 'Usuarios_cliente')[0]; }
            else {
                msjDanger('CONEXION', "Se produjo un error durante la conexion");
                die();
            }
        }
        else {
            $result = $connection->select('*', 'usuarios_gestion', 'WHERE nick="' . trim($_POST["nick"]) . '"');
            if ($result["success"]) { return $connection->format_select_Object($result["result"], 'Usuarios_gestion')[0]; }
            else {
                msjDanger('CONEXION', "Se produjo un error durante la conexion");
                die();
            }
        }
    }
}