<?php

$page = $_GET["page"];

if($page == "logout"){
    $session->destroy();
    include_once "assets/login.php";
    $includesJS->getScriptsLogin();
}

if($session->getUsuario() == null && !isset($_POST["nick"]) && !isset($_POST["pass"]) ) {
    $session->destroy();
    include_once "assets/login.php";
    $includesJS->getScriptsLogin();
}
else if(isset($_POST["nick"]) && isset($_POST["pass"])) {
    $sessionIni = $services->getSessionIni();
    $session->setUsuario($sessionIni->ini());
}



/*
// SI EXISTE GESTOR EN SESION
// INCLUCE NAV
// SEGUN PAGE INCLUYE UNA PAGINA
if(isset($_SESSION['gestor'])) {
    include_once "views/layout/nav.php";
    if(isset($_GET["page"])) {
        $page = $_GET["page"];

        if($page == "preciosum"){ include_once "views/assets/preciosum.php"; }
        else if($page == "vendedor"){ include_once "views/assets/vendedor.php"; }
        else if($page == "pieza"){ include_once "views/assets/pieza.php"; }
    }
}

// INCLUYE SCRIPTS JS
include_once "includes/scriptsJS.php";
*/