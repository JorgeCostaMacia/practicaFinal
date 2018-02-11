<?php

class Includes {
    function css(){
        foreach(_cssFileName as $name){
            foreach(_actualPath as $apath){
                $filePath = $apath . _cssPath . $name . '.css';
                if (file_exists($filePath) && is_file($filePath)) {
                    echo '<link rel="stylesheet" href="' . $filePath . '">';
                }
            }
        }
    }
    function jsComun($actualPath = ""){
        echo '<script src="' . $actualPath . _jsPath . _jsJquery . '.js"></script>' .
            '<script src="' . $actualPath . _jsPath . jsBootstrap . '.js"></script>';
    }

    function jsLogin(){
        $this->jsComun();
        echo '<script src="public/js/login.min.js"></script>';
    }
    function jsHome(){
        $this->jsComun('../');
        echo  '<script src="../public/js/home.min.js"></script>';
    }
    function jsDatosCliente(){
        $this->jsComun('../');
        echo '<script src="../public/js/datosCliente.min.js"></script>';
    }
    function jsPedidosCliente(){
        $this->jsComun('../');
    }


    function phpHead($services){ include_once "layout/head.php"; }
    function phpPriController($services){ include_once "../controller/primary.php"; }
    function phpFooter(){ include_once "layout/footer.php"; }

    function phpLogin(){ include_once "assets/login.php";}
    function phpNavCliente($services){ include_once "assets/navCliente.php";}
    function phpNavGestor($services){ include_once "assets/navGestor.php";}
    function phpDatosCliente($services){ include_once "assets/datosCliente.php"; }
    function phpPedidosCliente($services){include_once "assets/pedidosCliente.php";}
}