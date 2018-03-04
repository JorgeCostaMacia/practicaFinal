<?php
/*
 * LOGOUT
 * DESTRUYE SESSION Y SI ES GESTOR AGREGA SALIDA ACCESO
 */
if($dependency->getPage()->getPage() == "logout"){
    if($dependency->getSession()->getUsuario() instanceof Usuarios_gestion){
        $connection = $dependency->getDBgestor();
        $dataContent = $dependency->getSession()->getDataContent();
        $crud = new AccesosCRUD();
        $maxAcceso = $crud->selectMax($connection, $dataContent, 'WHERE cod_gestor=' . $dependency->getSession()->getUsuario()->getCodGestor());
        $crud->updateSalida($connection, $dataContent, $maxAcceso, $dependency->getSession()->getUsuario()->getCodGestor());
    }
    $dependency->getSession()->destroy();
    $dependency->getPage()->redirectLogin();
}

/*
 * LOGIN - NO EXISTE SESSION NI LOGIN
 * CARGA FORM LOGIN Y DESTRUYE SESSION Y GET/POST
 */
if($dependency->getSession()->getUsuario() == null && !isset($_POST["nick"]) && !isset($_POST["password"]) ) {
    $dependency->getSession()->destroy();
    $dependency->getPage()->redirectCheckLogin();
    $dependency->getIncludes()->phpLogin();
    $dependency->getIncludes()->jsLogin();
}

/*
 * LOGIN - EXISTE LOGIN
 * INICIALIZA SESSION
 */
else if(isset($_POST["nick"]) && isset($_POST["password"])) {
    $dependency->getSession()->setUsuario($dependency->getSessionIni()->ini($dependency));
}
else if($dependency->getSession()->getUsuario() == null){
    $dependency->getPage()->redirectLogin();
}

/*
 * PAGES - EXISTE SESSION
 * CARGA NAV Y CONTROLADOR SEGUN USUARIO
 */
if($dependency->getSession()->getUsuario() != null){
    if($dependency->getPage()->getPage() != 'login'){
        if($dependency->getSession()->getUsuario() instanceof Usuarios_cliente){
            $dependency->getIncludesCliente()->phpNav($dependency);
            $dependency->getIncludesCliente()->phpController($dependency);
        }
        else {
            $dependency->getIncludesGestor()->phpNav($dependency);
            $dependency->getIncludesGestor()->phpController($dependency);
        }
    }
    else { $dependency->getPage()->redirectHome();}
}

if($dependency->getPage()->getPage() === 'login' || $dependency->getPage()->getPage() === 'home'){
    $dependency->getIncludes()->phpFooter();
}