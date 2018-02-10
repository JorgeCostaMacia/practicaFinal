<?php

if($services->getPage()->getPage() == "logout"){
    $services->getSession()->destroy();
    $services->getIncludes()->phpLogin();
    $services->getIncludes()->jsLogin();
    $services->getPage()->redirectLogin();
}

if($services->getSession()->getUsuario() == null && !isset($_POST["nick"]) && !isset($_POST["password"]) ) {
    $services->getSession()->destroy();
    $services->getIncludes()->phpLogin();
    $services->getIncludes()->jsLogin();
}
else if(isset($_POST["nick"]) && isset($_POST["password"])) {
    $services->getSession()->setUsuario($services->getSessionIni()->ini());
}

if($services->getSession()->getUsuario() != null){
    if($services->getPage()->getPage() != 'login'){
        if($services->getSession()->getUsuario() instanceof Usuarios_cliente){$services->getIncludes()->phpNavCliente();}
        else { $services->getIncludes()->phpNavGestor(); }
        $services->getIncludes()->jsHome();
    }
    else if($services->getPage()->getPage() === 'login'){ $services->getPage()->redirectHome();}
}

/*
if(isset($_SESSION['gestor'])) {
    include_once "views/layout/navCliente.php";
    if(isset($_GET["page"])) {
        $page = $_GET["page"];

        if($page == "preciosum"){ include_once "views/assets/preciosum.php"; }
        else if($page == "vendedor"){ include_once "views/assets/vendedor.php"; }
        else if($page == "pieza"){ include_once "views/assets/pieza.php"; }
    }
}
*/