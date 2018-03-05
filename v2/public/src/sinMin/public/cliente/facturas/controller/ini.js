"use strict";

var facturasApp = new Facturas();
var ajaxApp = new Ajax();
var facturas = "";
var lineasFacturas = "";
var cod_factura = "";

document.onload = addEventsFacturas();

function addEventsFacturas(){
    $("#search").click(search);
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

function addEventsLineas(facturas){
    for(let i = 0; i  < facturas.length; i++){
        $('#cod_factura-' + facturas[i]["cod_factura"]).off();
        $('#cod_factura-' + facturas[i]["cod_factura"]).click(searchLineas);
    }
}

function addEventsButtonLineas(){
    $(document).off('click', "#descarga");
    $(document).off('click', "#buttonVolver");
    $(document).on('click', "#descarga", searchCliente);
    $(document).on('click', "#buttonVolver", restoreFacturas);
}