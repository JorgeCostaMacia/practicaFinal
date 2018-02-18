<?php

$dependency->getIncludesCliente()->phpNavCliente($dependency);

if($dependency->getPage()->getPage() === 'home'){
    $dependency->getIncludesCliente()->jsHome();
}
else if($dependency->getPage()->getPage() === 'datosCliente'){
    $dependency->getIncludesCliente()->phpDatosCliente($dependency);
    $dependency->getIncludesCliente()->jsDatosCliente();
    if(isset($_POST["nick"])){
        msjSuccess("UPDATE", "Se ha modificado correctamente");
        $dependency->getSession()->setUsuario($dependency->getSessionIni()->ini($dependency));
    }
}
else if($dependency->getPage()->getPage() === 'realizarPedidosCliente'){
    $dependency->getIncludesCliente()->phpRealizarPedidosCliente($dependency);
    $dependency->getIncludesCliente()->jsRealizarPedidosCliente();
}
else if($dependency->getPage()->getPage() === 'pedidosCliente'){
    $dependency->getIncludesCliente()->phpPedidosCliente($dependency);
    $dependency->getIncludesCliente()->jsPedidosCliente();
}