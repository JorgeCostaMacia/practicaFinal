<?php

include_once "../config/loader.php";

$dataContent = new DataContent();
$services = new Services();

$action = $_POST["action"];
$usuario = $_POST["usuario"];

if($usuario == "cliente"){ $connection = $services->getDBcliente(); }
else if($usuario == "gestor"){ $connection = $services->getDBgestor(); }
else if($usuario == "limitado"){ $connection = $services->getDBlimitado(); }

if($connection->connection instanceof DBError){
    $dataContent->setSuccess(false);
    $dataContent->addErrores($connection->connection);
    echo $dataContent->toJson();
    die();
}

if($action === "login"){
    $login = new Login();

    if($usuario === "cliente"){ $login->selectCliente($connection, $dataContent); }
    else if($usuario === "gestor"){ $login->selectGestion($connection, $dataContent); }
}
else if($action === "acceso"){
    $login = new Login();
    $acceso = new Acceso();

    $login->selectGestion($connection, $dataContent);
    $acceso->insertAcceso($connection, $dataContent);
}
else if($action === "registro"){
    $registro = new RegistroCliente();

    $registro->selectCliente($connection, $dataContent);
    $registro->selectSolicitud($connection, $dataContent);

    if(count($dataContent->getUsuariosCliente()) === 0 && count($dataContent->getSolicitudes()) === 0){
        $registro->insertSolicitud($connection, $dataContent);
    }
}
else if($action === "update"){
    $update = new UpdateCliente();

    $update->updateCliente($connection, $dataContent);
}
else if($action === "searchArticulosCliente"){
    $realizarPedidosCliente = new RealizarPedidosCliente();
    $realizarPedidosCliente->selectArticulos($connection, $dataContent);
}
else if($action === "procesarArticulosCliente"){
    $realizarPedidosCliente = new RealizarPedidosCliente();
   // $realizarPedidosCliente->insertArticulos($connection, $dataContent);

}

header('Content-Type',  'application/json; charset=utf-8');
header('Content-Encoding',  'gzip');
echo $dataContent->toJson();