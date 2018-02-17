<?php
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

if($dependency->getSession()->getUsuario() == null && !isset($_POST["nick"]) && !isset($_POST["password"]) ) {
    $dependency->getSession()->destroy();
    $dependency->getPage()->redirectCheckLogin();
    $dependency->getIncludes()->phpLogin();
    $dependency->getIncludes()->jsLogin();
}
else if(isset($_POST["nick"]) && isset($_POST["password"])) {
    $dependency->getSession()->setUsuario($dependency->getSessionIni()->ini($dependency));
}
else if($dependency->getSession()->getUsuario() == null){
    $dependency->getPage()->redirectLogin();
}

if($dependency->getSession()->getUsuario() != null){
    if($dependency->getPage()->getPage() != 'login'){
        if($dependency->getSession()->getUsuario() instanceof Usuarios_cliente){$dependency->getIncludes()->phpNavCliente($dependency);}
        else { $dependency->getIncludes()->phpNavGestor($dependency); }
        $dependency->getIncludes()->jsHome();

        if($dependency->getPage()->getPage() === 'datosCliente'){
            $dependency->getIncludes()->phpDatosCliente($dependency);
            $dependency->getIncludes()->jsDatosCliente();
            if(isset($_POST["nick"])){
                msjSuccess("UPDATE", "Se ha modificado correctamente");
                $dependency->getSession()->setUsuario($dependency->getSessionIni()->ini($dependency));
            }
        }
        else if($dependency->getPage()->getPage() === 'realizarPedidosCliente'){
            $dependency->getIncludes()->phpRealizarPedidosCliente($dependency);
            $dependency->getIncludes()->jsRealizarPedidosCliente();
        }
        else if($dependency->getPage()->getPage() === 'pedidosCliente'){
            $dependency->getIncludes()->phpPedidosCliente($dependency);
            $dependency->getIncludes()->jsPedidosCliente();
        }

    }
    else if($dependency->getPage()->getPage() === 'login'){ $dependency->getPage()->redirectHome();}
}