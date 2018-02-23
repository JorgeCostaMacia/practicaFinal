"use strict";

var realizarPedidosApp = new RealizarPedidos();
var ajaxApp = new Ajax();
var articulos = "";

document.onload = addEventsRealizarPedidos();

function addEventsRealizarPedidos(){
    iniUsuarios();
    $("#search").click(search);
    $("#procesar").click(evalCantidades);
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