<?php

class IncludesCliente extends Includes{
    public function css(){
        foreach(_actualPath as $apath){
            $filePath = $apath . _cssPath . _cssClienteFileName . '.css';
            if (file_exists($filePath) && is_file($filePath)) {
                echo '<link rel="stylesheet" href="' . $filePath . '">';
            }
        }
    }
    public function jsMisDatos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'cliente/misDatos.min.js"></script>';
    }
    public function jsRealizarPedidos(){
        $this->jsComun('../');
        echo   '<script src="../' . _jsPath . 'cliente/realizarPedidos.min.js"></script>';
    }
    public function jsPedidos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'cliente/pedidos.min.js"></script>';
    }
    public function jsAlbaranes(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'cliente/albaranes.min.js"></script>';
    }
    public function jsFacturas(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'cliente/facturas.min.js"></script>';
    }

    public function phpController($dependency){ include_once "../controller/cliente.php"; }
    public function phpNav($dependency){ include_once _assetsPathPHP . "cliente/nav.php";}
    public function phpHome($dependency){ include_once _assetsPathPHP . "cliente/home.php"; }
    public function phpMisDatos($dependency){ include_once _assetsPathPHP . "cliente/misDatos.php"; }
    public function phpRealizarPedidos($dependency){include_once _assetsPathPHP . "cliente/realizarPedidos.php";}
    public function phpPedidos($dependency){include_once _assetsPathPHP . "cliente/pedidos.php";}
    public function phpAlbaranes($dependency){include_once _assetsPathPHP . "cliente/albaranes.php";}
    public function phpFacturas($dependency){include_once _assetsPathPHP . "cliente/facturas.php";}
}