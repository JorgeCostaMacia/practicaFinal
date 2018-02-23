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