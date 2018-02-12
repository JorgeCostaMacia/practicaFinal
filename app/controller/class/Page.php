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