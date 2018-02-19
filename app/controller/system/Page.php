<?php

class Page {
    private $page;

    public function __construct(){
        if(isset($_GET["page"])){ $this->page = $_GET["page"]; }
        else { $this->page = 'login'; }
    }

    public function getPage() {return $this->page;}
    public function setPage($page){$this->page = $page;}

    function getTitle(){
        if($this->page === "login") { return "Login"; }
        else if($this->page === "home") { return "Home"; }
        else if($this->page === "datosCliente") { return "Mis datos"; }
        else if($this->page === "realizarPedidosCliente") { return "Realizar pedido"; }
        else if($this->page === "pedidosCliente") { return "Pedidos"; }

        else if($this->page === "datosGestor") { return "Mis datos"; }
        else if($this->page === "solicitudesGestor") { return "Solicitudes"; }
        else if($this->page === "clientesGestor") { return "Clientes"; }
    }

    function redirectHome(){
       echo '<script>window.location.assign("home/"); </script>';
    }
    function redirectLogout(){
        echo '<script>window.location.assign("logout/"); </script>';
    }
    function redirectLogin(){
        echo '<script>window.location.assign("../"); </script>';
    }
    function redirectCheckLogin(){
        echo '<script> if(window.location.href.split("practicaFinal/")[1] != ""){window.location.assign("../");}</script>';
    }
}