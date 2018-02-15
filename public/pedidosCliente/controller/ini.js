"use strict";

var pedidosClienteApp = new PedidosCliente();
var ajaxApp = new Ajax();

document.onload = addEventsPedidos();

function addEventsPedidos(){
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

function addEventsLineas(pedidos){
    for(let i = 0; i  < pedidos.length; i++){
        $('#cod_pedido-' + pedidos[i]["cod_pedido"]).click(searchLineas);
    }
}