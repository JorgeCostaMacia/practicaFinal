<?php

class Includes {
    function css(){
        foreach(_cssFileName as $name){
            foreach(_actualPath as $apath){
                $filePath = $apath . _cssPath . $name;
                if (file_exists($filePath) && is_file($filePath)) {
                    echo '<link rel="stylesheet" href="' . $filePath . '">';
                }
            }
        }
    }
    function jsLogin(){
        echo '<script src="public/js/jquery-3.3.1.min.js"></script>' .
            '<script src="public/js/bootstrap.min.js"></script>' .
            '<script src="public/js/login.min.js"></script>';
    }
    function jsHome(){
        echo '<script src="../public/js/jquery-3.3.1.min.js"></script>' .
            '<script src="../public/js/bootstrap.min.js"></script>' .
            '<script src="../public/js/home.min.js"></script>';
    }
    function jsDatosCliente(){
        echo '<script src="../public/js/jquery-3.3.1.min.js"></script>' .
            '<script src="../public/js/bootstrap.min.js"></script>' .
            '<script src="../public/js/datosCliente.min.js"></script>';
    }

    function phpHead($services){ include_once "layout/head.php"; }
    function phpPriController($services){ include_once "../controller/primary.php"; }
    function phpFooter(){ include_once "layout/footer.php"; }

    function phpLogin(){ include_once "assets/login.php";}
    function phpNavCliente($services){ include_once "assets/navCliente.php";}
    function phpNavGestor($services){ include_once "assets/navGestor.php";}
    function phpDatosCliente($services){ include_once "assets/datosCliente.php"; }
}