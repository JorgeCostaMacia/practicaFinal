<?php

class Page {
    function getTitle(){
        $page = $_GET["page"];
        if($page === "login") { return "Login"; }
    }
}