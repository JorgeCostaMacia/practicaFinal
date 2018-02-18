<?php

include_once "../config/loader.php";

$dependency = new Dependency();
$dataContent = new DataContent();

$action = $_POST["action"];
$usuario = $_POST["usuario"];

if($usuario == "cliente"){ $ajax = new AjaxCliente($dependency->getDBcliente(), $dataContent);}
else if($usuario == "gestor"){$ajax = new AjaxGestor($dependency->getDBgestor(), $dataContent);}
else if($usuario == "limitado"){$ajax = new AjaxLimitado($dependency->getDBlimitado(), $dataContent);}

if($action === "login"){ $ajax->login();}
else if($action === "acceso"){ $ajax->acceso();}
else if($action === "registro"){$ajax->registro();}
else if($action === "update"){ $ajax->updateUser();}
else if($action === "searchArticulos"){$ajax->searchArticulos();}
else if($action === "procesarArticulos"){$ajax->procesarArticulos();}
else if($action === "searchPedidos"){$ajax->searchPedidos(); }
else if($action === "searchLineasPedidos"){$ajax->searchLineasPedidos(); }
else if($action === "updateLineasPedidos"){$ajax->updateLineasPedidos(); }
else if($action === "searchSolicitudes"){$ajax->searchSolicitudes();}
else if($action === "aceptarSolicitud"){$ajax->aceptarSolicitud();}
else if($action === "cancelarSolicitud"){$ajax->cancelarSolicitud();}


header('Content-Type',  'application/json; charset=utf-8');
header('Content-Encoding',  'gzip');
echo $dataContent->toJson();