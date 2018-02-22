"use strict";

var clientesApp = new Clientes();
var ajaxApp = new Ajax();
var clientes = "";

document.onload = addEventsClientes();

function addEventsClientes(){
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

function addEventsModificar(clientes){
    for(let i = 0; i < clientes.length; i++){
        $('#modificar-' + clientes[i]['cod_cliente']).off();
        $('#modificar-' + clientes[i]['cod_cliente']).click(showCliente);
    }
}

function addEventsUpdate(){
    $("#updateCliente").off();
    $("#buttonVolver").off();
    $(document).on('click', "#updateCliente", evalModificar);
    $(document).on('click', "#buttonVolver", restoreClientes);
}