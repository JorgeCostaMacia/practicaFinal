<?php

class IncludesGestor extends Includes{
    public function jsDatosGestor(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'datosGestor.min.js"></script>';
    }
    public function jsSolicitudesGestor(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'solicitudesGestor.min.js"></script>';
    }
    public function jsClientesGestor(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'solicitudesGestor.min.js"></script>';
    }

    public function phpGestorController($dependency){ include_once "../controller/gestor.php"; }
    public function phpNavGestor($dependency){ include_once _assetsPathPHP . "navGestor.php";}
    public function phpDatosGestor($dependency){ include_once _assetsPathPHP . "datosGestor.php"; }
    public function phpSolicitudesGestor($dependency){ include_once _assetsPathPHP . "solicitudesGestor.php"; }
    public function phpClientesGestor($dependency){ include_once _assetsPathPHP . "clientesGestor.php"; }

}