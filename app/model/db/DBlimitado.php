<?php

class DBlimitado extends DBquery {
    public $connection;

    function __construct(){
        try {
            $this->connection =  new PDO(_DBTYPE . ':host=' . _HOST . ';dbname=' . _DB. ';charset=' . _CHARSET, _USSER_GESTOR, _PASS_GESTOR);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $_exception) {
            return new DBerror('Se ha producido un error en la conexion', $_exception->getCode(), $_exception->getMessage());
        }
    }

    public function disconnect(){ $this->connection = null; }

}