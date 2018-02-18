<?php

class IncludesCliente extends Includes{
    function jsDatosCliente(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'datosCliente.min.js"></script>';
    }
    function jsRealizarPedidosCliente(){
        $this->jsComun('../');
        echo   '<script src="../' . _jsPath . 'realizarPedidosCliente.min.js"></script>';
    }
    function jsPedidosCliente(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'pedidosCliente.min.js"></script>';
    }

    function phpClienteController($dependency){ include_once "../controller/cliente.php"; }
    function phpNavCliente($dependency){ include_once _assetsPathPHP . "navCliente.php";}
    function phpDatosCliente($dependency){ include_once _assetsPathPHP . "datosCliente.php"; }
    function phpRealizarPedidosCliente($dependency){include_once _assetsPathPHP . "RealizarPedidosCliente.php";}
    function phpPedidosCliente($dependency){include_once _assetsPathPHP . "pedidosCliente.php";}
}