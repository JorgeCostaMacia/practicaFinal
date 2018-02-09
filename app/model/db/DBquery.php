<?php


// :name, :value  ? ?   = $_paramKey
// bindParam(":name" = $valor)
// 

abstract class DBquery {

    public function createDB($name){
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('CREATE DATABASE ' . $name . ";");
            $result['result']->execute();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Crear base de datos', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function dropDB($dropDatabase){
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('DROP DATABASE '. $dropDatabase . ";");
            $result['result']->execute();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Borrar base de datos', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function createTable($name, $values = ""){
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('CREATE TABLE ' . $name . ' ' . $values . ";");
            $result['result']->execute();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Crear tabla', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function dropTable($dropTable){
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('DROP TABLE '. $dropTable . ";");
            $result['result']->execute();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Borrar tabla', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function truncateTable($truncateTable){
        $result = [];
        $result['success'] = true;

        try {
            $result["result"] = $this->connection->prepare('TRUNCATE TABLE '. $truncateTable . ";");
            $result['result']->execute();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Truncar tabla', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function setFK($_setFOREIGN_KEY_CHECKS = "1"){
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('SET FOREIGN_KEY_CHECKS= '. $_setFOREIGN_KEY_CHECKS . ";");
            $result['result']->execute();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Cambiar FK', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function setAutocommit($autocommit = "true"){
        $result = [];
        $result['success'] = true;

        try {
            $this->connection->autocommit($autocommit);
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Cambiar autocommit', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function setSAFE_UPDATES($SQL_SAFE_UPDATES = "1"){
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('SET SQL_SAFE_UPDATES= '. $SQL_SAFE_UPDATES . ";");
            $result['result']->execute();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Cambiar FK', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function select($select, $from, $more = ""){
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('SELECT '. $select . ' FROM ' . $from . " " . $more . ";");
            $result['result']->execute();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Select', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function format_select_Object($result, $className){
        $result->setFetchMode(PDO::FETCH_CLASS, $className);
        return $result->fetchAll();
    }

    public function format_select_Assoc($result){
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($insertInto, $values) {
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('INSERT INTO ' . $insertInto . ' VALUES ' . $values . ';');
            $result['result']->execute();
            $result['result'] = $result['result']->rowCount();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Insert', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function insertSelect($insertInto, $select, $from, $more = "") {
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('INSERT INTO ' . $insertInto . ' SELECT ' . $select . ' FROM ' . $from . ' ' .$more . ';');
            $result['result']->execute();
            $result['result'] = $result['result']->rowCount();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Insert', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function update($update, $set, $more = ""){
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('UPDATE ' . $update . ' SET ' . $set . " " . $more . ';');
            $result['result']->execute();
            $result['result'] = $result['result']->rowCount();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Update', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function delete($deleteFrom, $where){
        $result = [];
        $result['success'] = true;

        try {
            $result['result'] = $this->connection->prepare('DELETE FROM ' . $deleteFrom . ' WHERE ' . $where . ';');
            $result['result']->execute();
            $result['result'] = $result['result']->rowCount();
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: Delete', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function prepare($query, $bindParams, $values){
    	//:name, :value    ? ?   = $_paramKey
        $result = [];
        $result["result"] = [];
        $result['success'] = true;
        $prepare = "";

        try {
            $prepare = $this->connection->prepare($query);

            foreach ($bindParams as $paramVarNameValueRemplace) {
                $prepare->bindParam(':' . $paramVarNameValueRemplace, $$paramVarNameValueRemplace);
            }
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: preparar', $_exception->getCode(), $_exception->getMessage());
        }

		try {
            foreach($values as $roundExecutes){
            	foreach($roundExecutes as $key=>$value){
            		$$key = $value;
            	}
            	$prepare->execute();
            	$result['result'][] = $prepare->rowCount();
        	}
        }
        catch (PDOException $_exception) {
            $result['success'] = false;
            $result["error"] = new DBerror('No se ha podido realizar la accion: ejecutar preparada', $_exception->getCode(), $_exception->getMessage());
        }

        return $result;
    }

    public function transaction($querys){
        $result = [];
        $result['success'] = true;

        $this->connection->beginTransaction();

        foreach($querys as $key=> $query){
            $result[$key] = [];
            $result[$key]["query"] = $query;

            try {
                $result[$key]['result'] = $this->connection->prepare($query);
                $result[$key]['result']->execute();
                $result[$key]['rowCount'] = $result[$key]['result']->rowCount();
                $result[$key]['succes'] = true;
            }
            catch (PDOException $_exception) {
                $result['success'] = false;
                $result[$key]['success'] = false;
                $result[$key]["error"] = new DBerror('No se ha podido realizar la accion: Transaccion', $_exception->getCode(), $_exception->getMessage());
            }
        }

        if(!$result['success']){ $this->connection->rollback(); }
        else { $this->connection->commit(); }

        return $result;
    }
}