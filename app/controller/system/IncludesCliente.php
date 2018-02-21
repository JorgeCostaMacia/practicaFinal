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
        echo '<script src="../' . _jsPath . 'datosCliente.min.js"></script>';
    }
    function jsRealizarPedidos(){
        $this->jsComun('../');
        echo   '<script src="../' . _jsPath . 'realizarPedidosCliente.min.js"></script>';
    }
    function jsPedidos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'pedidosCliente.min.js"></script>';
    }

    function phpController($dependency){ include_once "../controller/cliente.php"; }
    function phpNav($dependency){ include_once _assetsPathPHP . "cliente/nav.php";}
    function phpMisDatos($dependency){ include_once _assetsPathPHP . "cliente/misDatos.php"; }
    function phpRealizarPedidos($dependency){include_once _assetsPathPHP . "cliente/realizarPedidos.php";}
    function phpPedidos($dependency){include_once _assetsPathPHP . "pedidos.php";}
}