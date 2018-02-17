"use strict";

var realizarPedidosClienteApp = new RealizarPedidosCliente();
var ajaxApp = new Ajax();
var articulos = "";

document.onload = addEventsRealizarPedidos();

function addEventsRealizarPedidos(){
    $("#search").click(search);
    $("#procesar").click(evalCantidades);
}