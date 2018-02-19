<?php

class Usuarios_clienteCRUD{
    function select($connection, $dataContent, $col, $more) {
        $result = $connection->select($col, 'usuarios_cliente', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setUsuariosCliente($connection->format_select_Object($result["result"], 'Usuarios_cliente'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    function update($connection, $dataContent){
        $estado = "";
        if(isset($_POST["estado"])){ $estado = ' ,estado="' . $_POST["estado"]. '"';}

        $result = $connection->update('usuarios_cliente', 'razon_social="' . trim($_POST['razon_social']) . '", domicilio_social="' . trim($_POST['domicilio_social']) . '", ciudad="' . trim($_POST['ciudad']) . '", email="' . trim($_POST['email']) . '", telefono="' . trim($_POST['telefono']) . '", password="' . trim($_POST['password']) . '"' . $estado, 'WHERE cod_cliente="' . $_POST['cod_cliente'] . '"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    function insert($connection, $dataContent, $cif_dni, $nombre_completo, $razon_social, $domicilio_social, $ciudad, $email, $telefono, $nick, $password){
        $result = $connection->insert('usuarios_cliente(cif_dni, nombre_completo, razon_social, domicilio_social, ciudad, email, telefono, nick, password, estado)', '("' . $cif_dni . '","' .  $nombre_completo . '","' . $razon_social . '","' .   $domicilio_social . '","' .   $ciudad . '","' .   $email . '","' .   $telefono . '","' .   $nick . '","' .   $password  . '", "activo")');
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