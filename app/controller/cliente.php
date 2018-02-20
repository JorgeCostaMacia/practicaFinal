<?php

$dependency->getIncludesCliente()->phpNav($dependency);

if($dependency->getPage()->getPage() === 'home'){
    $dependency->getIncludesCliente()->jsHome();
}
else if($dependency->getPage()->getPage() === 'misDatos'){
    $dependency->getIncludesCliente()->phpMisDatos($dependency);
    $dependency->getIncludesCliente()->jsMisDatos();
    if(isset($_POST["nick"])){
        msjSuccess("UPDATE", "Se ha modificado correctamente");
        $dependency->getSession()->setUsuario($dependency->getSessionIni()->ini($dependency));
    }
}
else if($dependency->getPage()->getPage() === 'realizarPedidos'){
    $dependency->getIncludesCliente()->phpRealizarPedidos($dependency);
    $dependency->getIncludesCliente()->jsRealizarPedidos();
}
else if($dependency->getPage()->getPage() === 'pedidos'){
    $dependency->getIncludesCliente()->phpPedidos($dependency);
    $dependency->getIncludesCliente()->jsPedidos();
}