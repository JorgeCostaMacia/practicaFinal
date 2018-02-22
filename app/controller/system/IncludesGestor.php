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
    public function jsAltaArticulo(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'altaArticulo.min.js"></script>';
    }
    public function jsAltaCliente(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'altaCliente.min.js"></script>';
    }
    public function jsAltaGestor(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'altaGestor.min.js"></script>';
    }
    public function jsSolicitudes(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'solicitudesGestor.min.js"></script>';
    }
    public function jsClientes(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'clientesGestor.min.js"></script>';
    }
    public function jsGestores(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestoresGestor.min.js"></script>';
    }

    public function phpController($dependency){ include_once "../controller/gestor.php"; }
    public function phpNav($dependency){ include_once _assetsPathPHP . "gestor/nav.php";}
    public function phpMisDatos($dependency){ include_once _assetsPathPHP . "gestor/misDatos.php"; }
    public function phpAltaCliente($dependency){ include_once _assetsPathPHP . "gestor/altaCliente.php"; }
    public function phpAltaGestor($dependency){ include_once _assetsPathPHP . "gestor/altaGestor.php"; }
    public function phpAltaArticulo($dependency){ include_once _assetsPathPHP . "gestor/altaArticulo.php"; }
    public function phpSolicitudes($dependency){ include_once _assetsPathPHP . "gestor/solicitudes.php"; }
    public function phpClientes($dependency){ include_once _assetsPathPHP . "gestor/clientes.php"; }
    public function phpGestores($dependency){ include_once _assetsPathPHP . "gestor/gestores.php"; }
}