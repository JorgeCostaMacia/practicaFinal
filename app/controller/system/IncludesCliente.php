<?php

class IncludesCliente extends Includes{
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
    function phpNav($dependency){ include_once _assetsPathPHP . "navCliente.php";}
    function phpMisDatos($dependency){ include_once _assetsPathPHP . "datosCliente.php"; }
    function phpRealizarPedidos($dependency){include_once _assetsPathPHP . "RealizarPedidosCliente.php";}
    function phpPedidos($dependency){include_once _assetsPathPHP . "pedidosCliente.php";}
}