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
            '<script src="' . $actualPath . _jsPath . _jsBootstrap . '.js"></script>' .
            '<script src="' . $actualPath . _jsPath . _jsComun . '.js"></script>';
    }
    function jsLogin(){
        $this->jsComun();
        echo '<script src="' . _jsPath . 'login.min.js"></script>';
    }
    function jsHome(){
        $this->jsComun('../');
    }

    function phpHead($dependency){ include_once _layoutsPathPHP . "head.php"; }

    function phpPriController($dependency){ include_once "../controller/primary.php"; }
    function phpFooter(){ include_once _layoutsPathPHP . "footer.php"; }
    function phpLogin(){ include_once _assetsPathPHP . "login.php";}
}