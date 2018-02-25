"use strict";

var albaranesApp = new Albaranes();
var ajaxApp = new Ajax();
var albaranes = "";
var lineasAlbaranes = "";
var cod_albaran = "";

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
    $("#descarga").off();
    $("#buttonVolver").off();
    $(document).on('click', "#descarga", searchCliente);
    $(document).on('click', "#buttonVolver", restoreAlbaranes);
}