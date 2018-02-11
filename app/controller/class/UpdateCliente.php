<?php

class UpdateCliente {
    public function __construct(){}

    function updateCliente($connection, $contendData){
        $result = $connection->update('usuarios_cliente', 'razon_social="' . trim($_POST['razon_social']) . '", domicilio_social="' . trim($_POST['domicilio_social']) . '", ciudad="' . trim($_POST['ciudad']) . '", email="' . trim($_POST['email']) . '", telefono="' . trim($_POST['telefono']) . '", password="' . trim($_POST['password']) . '"', 'WHERE cod_cliente="' . $_POST['cod_cliente'] . '"');
        if ($result["success"]) {
            $contendData->setSuccess(true);
        }
        else {
            $contendData->setSuccess(false);
            $contendData->addErrores(new DBerror("Se produjo un error durante la modificacion"));
            $contendData->addErrores($result["error"]);
        }
    }
}