"use strict";

var albaranesApp = new Albaranes();
var ajaxApp = new Ajax();
var albaranes = "";
var lineasAlbaranes = "";
var cod_albaran = "";
var cod_cliente = "";

document.onload = addEventsAlbaranes();

function addEventsAlbaranes(){
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

function addEventsLineas(albaranes){
    for(let i = 0; i  < albaranes.length; i++){
        $('#cod_albaran-' + albaranes[i]["cod_albaran"]).off();
        $('#cod_albaran-' + albaranes[i]["cod_albaran"]).click(searchLineas);
    }
}

function addEventsButtonLineas(){
    $(document).off('click', "#procesar", procesarAlbaran);
    $(document).off('click', "#actualizar", actualizarAlbaran);
    $(document).off('click', "#descarga", searchCliente);
    $(document).off('click', "#buttonVolver", restoreAlbaranes);

    $(document).on('click', "#procesar", procesarAlbaran);
    $(document).on('click', "#actualizar", actualizarAlbaran);
    $(document).on('click', "#descarga", searchCliente);
    $(document).on('click', "#buttonVolver", restoreAlbaranes);
}