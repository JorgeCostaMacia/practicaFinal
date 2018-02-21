<?php

class IncludesGestor extends Includes{
    function css(){
        foreach(_actualPath as $apath){
            $filePath = $apath . _cssPath . _cssGestorFileName . '.css';
            if (file_exists($filePath) && is_file($filePath)) {
                echo '<link rel="stylesheet" href="' . $filePath . '">';
            }
        }
    }
    public function jsMisDatos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'datosGestor.min.js"></script>';
    }
    public function jsAltaCliente(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'solicitudesGestor.min.js"></script>';
    }


    public function jsSolicitudes(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'solicitudesGestor.min.js"></script>';
    }
    public function jsClientes(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'clientesGestor.min.js"></script>';
    }

    public function phpController($dependency){ include_once "../controller/gestor.php"; }
    public function phpNav($dependency){ include_once _assetsPathPHP . "navGestor.php";}
    public function phpMisDatos($dependency){ include_once _assetsPathPHP . "datosGestor.php"; }
    public function phpAltaCliente($dependency){ include_once _assetsPathPHP . "datosGestor.php"; }

    public function phpSolicitudes($dependency){ include_once _assetsPathPHP . "solicitudesGestor.php"; }
    public function phpClientes($dependency){ include_once _assetsPathPHP . "clientesGestor.php"; }
}