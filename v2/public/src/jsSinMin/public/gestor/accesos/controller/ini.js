"use strict";

var accesosApp = new Accesos();
var ajaxApp = new Ajax();
var accesos = "";

document.onload = addEventsAccesos();

function addEventsAccesos(){
    $("#search").click(search);
    $('#descarga').click(showDescarga);
}

function addEventsSiguiente(){
    $('#siguiente').click(searchSiguiente);
}

function addEventsAnterior(){
    $('#anterior').click(searchAnterior);
}

function delEventsSig(){
    $('#siguiente').off();
}

function delEventsAnt(){
    $('#anterior').off();
}