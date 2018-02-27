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
        echo '<script src="../public/src/sinMin/public/cliente/realizarPedidos/view/mensajes.js"></script>';
        echo '<script src="../public/src/sinMin/public/cliente/realizarPedidos/view/realizarPedidos.js"></script>';
        echo '<script src="../public/src/sinMin/public/cliente/realizarPedidos/libraries/typeValidate.js"></script>';
        echo '<script src="../public/src/sinMin/public/cliente/realizarPedidos/controller/class/Ajax.js"></script>';
        echo '<script src="../public/src/sinMin/public/cliente/realizarPedidos/controller/class/RealizarPedidos.js"></script>';
        echo '<script src="../public/src/sinMin/public/cliente/realizarPedidos/controller/InputsHandler.js"></script>';
        echo '<script src="../public/src/sinMin/public/cliente/realizarPedidos/controller/realizarPedidos.js"></script>';
        echo '<script src="../public/src/sinMin/public/cliente/realizarPedidos/controller/ini.js"></script>';

        //echo   '<script src="../' . _jsPath . 'cliente/realizarPedidos.min.js"></script>';
    }
    function jsPedidos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'cliente/pedidos.min.js"></script>';
    }
    function jsAlbaranes(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'cliente/albaranes.min.js"></script>';
    }

    function phpController($dependency){ include_once "../controller/cliente.php"; }
    function phpNav($dependency){ include_once _assetsPathPHP . "cliente/nav.php";}
    function phpMisDatos($dependency){ include_once _assetsPathPHP . "cliente/misDatos.php"; }
    function phpRealizarPedidos($dependency){include_once _assetsPathPHP . "cliente/realizarPedidos.php";}
    function phpPedidos($dependency){include_once _assetsPathPHP . "cliente/pedidos.php";}
    function phpAlbaranes($dependency){include_once _assetsPathPHP . "cliente/albaranes.php";}
}