"use strict";

var actividadApp = new Actividad();
var ajaxApp = new Ajax();
var actividad = "";

document.onload = addEventsActividad();

function addEventsActividad(){
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