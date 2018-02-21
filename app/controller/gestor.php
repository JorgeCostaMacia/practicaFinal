<?php

$dependency->getIncludesGestor()->phpNav($dependency);

if($dependency->getPage()->getPage() === 'home'){
    $dependency->getIncludesGestor()->jsHome();
}
else if($dependency->getPage()->getPage() === 'misDatos'){
    $dependency->getIncludesGestor()->phpMisDatos($dependency);
    $dependency->getIncludesGestor()->jsMisDatos();
    if(isset($_POST["nick"])){
        msjSuccess("UPDATE", "Se ha modificado correctamente");
        $dependency->getSession()->setUsuario($dependency->getSessionIni()->ini($dependency));
    }
}
else if($dependency->getPage()->getPage() === 'altaArticulo'){
    $dependency->getIncludesGestor()->phpSolicitudes($dependency);
    $dependency->getIncludesGestor()->jsSolicitudes();
}
else if($dependency->getPage()->getPage() === 'altaCliente'){
    $dependency->getIncludesGestor()->phpAltaCliente($dependency);
    $dependency->getIncludesGestor()->jsAltaCliente();
}
else if($dependency->getPage()->getPage() === 'altaGestor'){
    $dependency->getIncludesGestor()->phpAltaGestor($dependency);
    $dependency->getIncludesGestor()->jsAltaGestor();
}
else if($dependency->getPage()->getPage() === 'solicitudes'){
    $dependency->getIncludesGestor()->phpSolicitudes($dependency);
    $dependency->getIncludesGestor()->jsSolicitudes();
}
else if($dependency->getPage()->getPage() === 'clientes'){
    $dependency->getIncludesGestor()->phpClientes($dependency);
    $dependency->getIncludesGestor()->jsClientes();
}
else if($dependency->getPage()->getPage() === 'gestores'){
    $dependency->getIncludesGestor()->phpGestores($dependency);
    $dependency->getIncludesGestor()->jsGestores();
}