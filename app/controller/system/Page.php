<?php

class Page {
    private $page;

    public function __construct(){
        if(isset($_GET["page"])){ $this->page = $_GET["page"]; }
        else { $this->page = 'login'; }
    }

    public function getPage() {return $this->page;}
    public function setPage($page){$this->page = $page;}

    public function getTitle(){
        if($this->page === "login") { return "Login"; }
        else if($this->page === "home") { return "Home"; }
        else if($this->page === "misDatos") { return "Mis datos"; }
        else if($this->page === "realizarPedidos") { return "Realizar pedido"; }
        else if($this->page === "pedidos") { return "Pedidos"; }
        else if($this->page === "albaranes") { return "Albaranes"; }
        else if($this->page === "facturas") { return "Facturas"; }
        else if($this->page === "solicitudes") { return "Solicitudes"; }
        else if($this->page === "clientes") { return "Clientes"; }
        else if($this->page === "gestores") { return "Gestores"; }
        else if($this->page === "articulo") { return "Articulo"; }
        else if($this->page === "altaArticulo") { return "Alta articulo"; }
        else if($this->page === "altaCliente") { return "Alta cliente"; }
        else if($this->page === "altaGestor") { return "Alta gestor"; }
        else if($this->page === "accesos") { return "Accesos"; }
        else if($this->page === "actividad") { return "Actividad"; }
    }

    public function redirectHome(){
       echo '<script>window.location.assign("home/"); </script>';
    }
    public function redirectLogout(){
        echo '<script>window.location.assign("logout/"); </script>';
    }
    public function redirectLogin(){
        echo '<script>window.location.assign("../"); </script>';
    }
    public function redirectCheckLogin(){
        echo '<script> if(window.location.href.split("practicaFinal/")[1] != ""){window.location.assign("../");}</script>';
    }
}