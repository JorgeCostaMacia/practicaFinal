<?php

$dependency->getIncludesGestor()->phpNav($dependency);

if($dependency->getPage()->getPage() === 'home'){
    $dependency->getIncludesGestor()->jsHome();
}
else if($dependency->getPage()->getPage() === 'misDatos'){
    $dependency->getIncludesGestor()->phpMisDatos($dependency);
    $dependency->getIncludesGestor()->jsMisDatos();
    if(isset($_POST["nick"])){
        msjSuccess("MIS DATOS", "<strong>Se ha modificado correctamente</strong>");
        $dependency->getSession()->setUsuario($dependency->getSessionIni()->ini($dependency));
    }
}
else if($dependency->getPage()->getPage() === 'altaArticulo'){
    $dependency->getIncludesGestor()->phpAltaArticulo($dependency);
    $dependency->getIncludesGestor()->jsAltaArticulo();
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
else if($dependency->getPage()->getPage() === 'articulos'){
    $dependency->getIncludesGestor()->phpArticulos($dependency);
    $dependency->getIncludesGestor()->jsArticulos();
}
else if($dependency->getPage()->getPage() === 'accesos'){
    $dependency->getIncludesGestor()->phpAccesos($dependency);
    $dependency->getIncludesGestor()->jsAccesos();
}
else if($dependency->getPage()->getPage() === 'accesos'){
    $dependency->getIncludesGestor()->phpAccesos($dependency);
    $dependency->getIncludesGestor()->jsAccesos();
}
else if($dependency->getPage()->getPage() === 'actividad'){
    $dependency->getIncludesGestor()->phpActividad($dependency);
    $dependency->getIncludesGestor()->jsActividad();
}
else if($dependency->getPage()->getPage() === 'realizarPedidos'){
    $dependency->getIncludesGestor()->phpRealizarPedidos($dependency);
    $dependency->getIncludesGestor()->jsRealizarPedidos();
}
else if($dependency->getPage()->getPage() === 'pedidos'){
    $dependency->getIncludesGestor()->phpPedidos($dependency);
    $dependency->getIncludesGestor()->jsPedidos();
}
else if($dependency->getPage()->getPage() === 'albaranes'){
    $dependency->getIncludesGestor()->phpAlbaranes($dependency);
    $dependency->getIncludesGestor()->jsAlbaranes();
}