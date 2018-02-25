<?php

class IncludesGestor extends Includes{
    function css(){
        foreach(_actualPath as $apath){
            $filePath = $apath . _cssPath . _cssGestorFileName . '.css';
            if (file_exists($filePath) && is_file($filePath)) {
                echo '<link rel="stylesheet" href="' . $filePath . '">';
            }
        }
    }
    public function jsMisDatos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/misDatos.min.js"></script>';
    }
    public function jsAltaArticulo(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/altaArticulo.min.js"></script>';
    }
    public function jsAltaCliente(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/altaCliente.min.js"></script>';
    }
    public function jsAltaGestor(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/altaGestor.min.js"></script>';
    }
    public function jsSolicitudes(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/solicitudes.min.js"></script>';
    }
    public function jsClientes(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/clientes.min.js"></script>';
    }
    public function jsGestores(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/gestores.min.js"></script>';
    }
    public function jsArticulos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/articulos.min.js"></script>';
    }
    public function jsAccesos(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/accesos.min.js"></script>';
    }
    public function jsActividad(){
        $this->jsComun('../');
        echo '<script src="../' . _jsPath . 'gestor/actividad.min.js"></script>';
    }
    function jsRealizarPedidos(){
        $this->jsComun('../');
        echo   '<script src="../' . _jsPath . 'gestor/realizarPedidos.min.js"></script>';
    }
    function jsPedidos(){
        $this->jsComun('../');
        echo   '<script src="../' . _jsPath . 'gestor/pedidos.min.js"></script>';
    }
    function jsAlbaranes(){
        $this->jsComun('../');
        echo   '<script src="../' . _jsPath . 'gestor/albaranes.min.js"></script>';
    }

    public function phpController($dependency){ include_once "../controller/gestor.php"; }
    public function phpNav($dependency){ include_once _assetsPathPHP . "gestor/nav.php";}
    public function phpMisDatos($dependency){ include_once _assetsPathPHP . "gestor/misDatos.php"; }
    public function phpAltaCliente($dependency){ include_once _assetsPathPHP . "gestor/altaCliente.php"; }
    public function phpAltaGestor($dependency){ include_once _assetsPathPHP . "gestor/altaGestor.php"; }
    public function phpAltaArticulo($dependency){ include_once _assetsPathPHP . "gestor/altaArticulo.php"; }
    public function phpSolicitudes($dependency){ include_once _assetsPathPHP . "gestor/solicitudes.php"; }
    public function phpClientes($dependency){ include_once _assetsPathPHP . "gestor/clientes.php"; }
    public function phpGestores($dependency){ include_once _assetsPathPHP . "gestor/gestores.php"; }
    public function phpArticulos($dependency){ include_once _assetsPathPHP . "gestor/articulos.php"; }
    public function phpAccesos($dependency){ include_once _assetsPathPHP . "gestor/accesos.php"; }
    public function phpActividad($dependency){ include_once _assetsPathPHP . "gestor/actividad.php"; }
    function phpRealizarPedidos($dependency){include_once _assetsPathPHP . "gestor/realizarPedidos.php";}
    function phpPedidos($dependency){include_once _assetsPathPHP . "gestor/pedidos.php";}
    function phpAlbaranes($dependency){include_once _assetsPathPHP . "gestor/albaranes.php";}
}