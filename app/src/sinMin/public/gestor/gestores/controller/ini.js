"use strict";

var gestoresApp = new Gestores();
var ajaxApp = new Ajax();
var gestores = "";

document.onload = addEventsGestores();

function addEventsGestores(){
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
        $('#modificar-' + gestores[i]['cod_gestor']).off();
        $('#modificar-' + gestores[i]['cod_gestor']).click(showGestores);
    }
}

function addEventsUpdate(){
    $("#updateGestor").off();
    $("#buttonVolver").off();
    $(document).on('click', "#updateGestor", evalModificar);
    $(document).on('click', "#buttonVolver", restoreGestores);
}