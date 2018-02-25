<?php

class IncludesCliente extends Includes{
    function css(){
        foreach(_actualPath as $apath){
            $filePath = $apath . _cssPath . _cssClienteFileName . '.css';
            if (file_exists($filePath) && is_file($filePath)) {
                echo '<link rel="stylesheet" href="' . $filePath . '">';
            }
        }
    }
    function jsMisDatos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'cliente/misDatos.min.js"></script>';
    }
    function jsRealizarPedidos(){
        $this->jsComun('../');
        echo   '<script src="../' . _jsPath . 'cliente/realizarPedidos.min.js"></script>';
    }
    function jsPedidos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'cliente/pedidos.min.js"></script>';
    }
    function jsAlbaranes(){
        $this->jsComun('../');
        echo '<script src="../public/albaranes/view/albaranes.js"></script>';
        echo '<script src="../public/albaranes/view/mensajes.js"></script>';
        echo '<script src="../public/albaranes/controller/class/Ajax.js"></script>';
        echo '<script src="../public/albaranes/controller/class/Albaranes.js"></script>';
        echo '<script src="../public/albaranes/controller/albaranes.js"></script>';
        echo '<script src="../public/albaranes/controller/lineas.js"></script>';
        echo '<script src="../public/albaranes/controller/ini.js"></script>';
        //echo '<script src="../' . _jsPath . 'cliente/pedidos.min.js"></script>';
    }

    function phpController($dependency){ include_once "../controller/cliente.php"; }
    function phpNav($dependency){ include_once _assetsPathPHP . "cliente/nav.php";}
    function phpMisDatos($dependency){ include_once _assetsPathPHP . "cliente/misDatos.php"; }
    function phpRealizarPedidos($dependency){include_once _assetsPathPHP . "cliente/realizarPedidos.php";}
    function phpPedidos($dependency){include_once _assetsPathPHP . "cliente/pedidos.php";}
    function phpAlbaranes($dependency){include_once _assetsPathPHP . "cliente/albaranes.php";}
}