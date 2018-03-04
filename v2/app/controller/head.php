<?php

$dependency->getIncludes()->phpHead($dependency);
$dependency->getIncludes()->cssComun();

if($dependency->getSession()->getUsuario() != null){
    if($dependency->getSession()->getUsuario() instanceof Usuarios_cliente){
        $dependency->getIncludesCliente()->css();
    }
    else if($dependency->getSession()->getUsuario() instanceof Usuarios_gestion){
        $dependency->getIncludesGestor()->css();
    }
}
else {
    if(isset($_POST["usuario"])){
        if($_POST["usuario"] === "cliente"){
            $dependency->getIncludesCliente()->css();
        }
        else if($_POST["usuario"] === "gestor"){
            $dependency->getIncludesGestor()->css();
        }
    }
}
