<?php
if($services->getPage()->getPage() == "logout"){
    $services->getSession()->destroy();
    $services->getPage()->redirectLogin();
}

if($services->getSession()->getUsuario() == null && !isset($_POST["nick"]) && !isset($_POST["password"]) ) {
    $services->getSession()->destroy();
    $services->getPage()->redirectCheckLogin();
    $services->getIncludes()->phpLogin();
    $services->getIncludes()->jsLogin();
}
else if(isset($_POST["nick"]) && isset($_POST["password"])) {
    $services->getSession()->setUsuario($services->getSessionIni()->ini());
}
else if($services->getSession()->getUsuario() == null){
    $services->getPage()->redirectLogin();
}

if($services->getSession()->getUsuario() != null){
    if($services->getPage()->getPage() != 'login'){
        if($services->getSession()->getUsuario() instanceof Usuarios_cliente){$services->getIncludes()->phpNavCliente($services);}
        else { $services->getIncludes()->phpNavGestor($services); }
        $services->getIncludes()->jsHome();

        if($services->getPage()->getPage() === 'datosCliente'){
            $services->getIncludes()->phpDatosCliente($services);
            $services->getIncludes()->jsDatosCliente();
        }
        else if($services->getPage()->getPage() === 'realizarPedidosCliente'){
            $services->getIncludes()->phpRealizarPedidosCliente($services);
            $services->getIncludes()->jsRealizarPedidosCliente();
        }
        else if($services->getPage()->getPage() === 'pedidosCliente'){
            $services->getIncludes()->phpPedidosCliente($services);
            $services->getIncludes()->jsPedidosCliente();
        }

    }
    else if($services->getPage()->getPage() === 'login'){ $services->getPage()->redirectHome();}
}