<?php

include_once "../config/loader.php";

$ajax = new Ajax();
$dependency = new Dependency();

$action = $_POST["action"];
$usuario = $_POST["usuario"];

if($usuario == "cliente"){ $connection = $dependency->getDBcliente(); }
else if($usuario == "gestor"){ $connection = $dependency->getDBgestor(); }
else if($usuario == "limitado"){ $connection = $dependency->getDBlimitado(); }

$ajax->checkConnection($connection);
if($action === "login"){ $ajax->login($usuario, $connection);}
else if($action === "acceso"){ $ajax->acceso($connection);}
else if($action === "registro"){$ajax->registro($connection);}
else if($action === "update"){ $ajax->updateUsuario($connection);}
else if($action === "searchArticulosCliente"){$ajax->searchArticulosCliente($connection);}
else if($action === "procesarArticulosCliente"){$ajax->procesarArticulosCliente($connection);}
else if($action === "searchPedidosCliente"){$ajax->searchPedidosCliente($connection); }

header('Content-Type',  'application/json; charset=utf-8');
header('Content-Encoding',  'gzip');
echo $ajax->getDataContent()->toJson();