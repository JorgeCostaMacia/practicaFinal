"use strict";

var pedidosApp = new Pedidos();
var ajaxApp = new Ajax();
var pedidos = "";
var lineasPedidos = "";
var cod_pedido = "";

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
        $('#cod_pedido-' + pedidos[i]["cod_pedido"]).off();
        $('#cod_pedido-' + pedidos[i]["cod_pedido"]).click(searchLineas);
    }
}

function addEventsButtonLineas(){
    $("#buttonLineas").off();
    $("#buttonVolver").off();
    $(document).on('click', "#procesarLineas", evalEstados);
    $(document).on('click', "#buttonLineas", evalCantidades);
    $(document).on('click', "#buttonVolver", restorePedidos);
}