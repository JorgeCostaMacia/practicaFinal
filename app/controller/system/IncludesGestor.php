<?php

class IncludesGestor extends Includes{
    function jsDatosGestor(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'datosGestor.min.js"></script>';
    }

    function phpGestorController($dependency){ include_once "../controller/gestor.php"; }
    function phpNavGestor($dependency){ include_once _assetsPathPHP . "navGestor.php";}
    function phpDatosGestor($dependency){ include_once _assetsPathPHP . "datosGestor.php"; }
}