<?php

$dependency->getIncludesGestor()->phpNavGestor($dependency);

if($dependency->getPage()->getPage() === 'home'){
    $dependency->getIncludesGestor()->jsHome();
}
else if($dependency->getPage()->getPage() === 'datosGestor'){
    $dependency->getIncludesGestor()->phpDatosGestor($dependency);
    $dependency->getIncludesGestor()->jsDatosGestor();
    if(isset($_POST["nick"])){
        msjSuccess("UPDATE", "Se ha modificado correctamente");
        $dependency->getSession()->setUsuario($dependency->getSessionIni()->ini($dependency));
    }
}
else if($dependency->getPage()->getPage() === 'solicitudesGestor'){
    $dependency->getIncludesGestor()->phpSolicitudesGestor($dependency);
    $dependency->getIncludesGestor()->jsSolicitudesGestor();
}
else if($dependency->getPage()->getPage() === 'clientesGestor'){
    $dependency->getIncludesGestor()->phpClientesGestor($dependency);
    $dependency->getIncludesGestor()->jsClientesGestor();
}
else if($dependency->getPage()->getPage() === 'gestoresGestor'){
    $dependency->getIncludesGestor()->phpClientesGestor($dependency);
    $dependency->getIncludesGestor()->jsClientesGestor();
}