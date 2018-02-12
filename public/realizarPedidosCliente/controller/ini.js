"use strict";

var realizarPedidosClienteApp = new RealizarPedidosCliente();
var ajaxApp = new Ajax();

document.onload = addEventsRealizarPedidos();

function addEventsRealizarPedidos(){
    $("#search").click(search);
}

