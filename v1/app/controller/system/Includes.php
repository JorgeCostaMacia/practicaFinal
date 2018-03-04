<?php

class Includes {
    public function cssComun(){
        foreach(_cssComunFileName as $name){
            foreach(_actualPath as $apath){
                $filePath = $apath . _cssPath . $name . '.css';
                if (file_exists($filePath) && is_file($filePath)) {
                    echo '<link rel="stylesheet" href="' . $filePath . '">';
                }
            }
        }
    }
    public function jsComun($actualPath = ""){
        echo '<script src="' . $actualPath . _jsPath . _jsJquery . '.js"></script>' .
            '<script src="' . $actualPath . _jsPath . _jsBootstrap . '.js"></script>' .
            '<script src="' . $actualPath . _jsPath . _jsComun . '.js"></script>';
    }
    public function jsLogin(){
        $this->jsComun();
        echo '<script src="' . _jsPath . 'login.min.js"></script>';
    }
    public function jsHome(){
        $this->jsComun('../');
    }

    public function phpHeadController($dependency){ include_once "../controller/head.php"; }
    public function phpHead($dependency){ include_once _layoutsPathPHP . "head.php"; }
    public function phpPriController($dependency){ include_once "../controller/primary.php"; }
    public function phpFooter(){ include_once _assetsPathPHP . "footer.php"; }
    public function phpLogin(){ include_once _assetsPathPHP . "login.php";}
}