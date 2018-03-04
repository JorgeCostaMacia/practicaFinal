<?php

class Usuarios_gestionCRUD{
    public function select($connection, $dataContent, $col, $more) {
        $result = $connection->select($col, 'usuarios_gestion', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setUsuariosGestion($connection->format_select_Object($result["result"], 'Usuarios_gestion'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function update($connection, $dataContent){
        $result = $connection->update('usuarios_gestion', 'password="' . trim($_POST['password']) . '", estado="' . $_POST["estado"]. '"', 'WHERE cod_gestor="' . $_POST['cod_gestor'] . '"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

    public function insert($connection, $dataContent, $nombre_completo, $nick, $password){
        $result = $connection->insert('usuarios_gestion(nombre_completo, nick, password, estado)', '("' .  $nombre_completo . '","' .   $nick . '","' .   $password  . '", "activo")');
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