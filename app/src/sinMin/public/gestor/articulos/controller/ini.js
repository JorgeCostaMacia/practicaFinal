"use strict";

var articulosApp = new Articulos();
var ajaxApp = new Ajax();
var articulos = "";

document.onload = addEventsArticulos();

function addEventsArticulos(){
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

function addEventsModificar(articulos){
    for(let i = 0; i < articulos.length; i++){
        $('#modificar-' + articulos[i]['cod_articulo']).off();
        $('#modificar-' + articulos[i]['cod_articulo']).click(showArticulo);
    }
}

function addEventsUpdate(){
    $("#updateCliente").off();
    $("#buttonVolver").off();
    $(document).on('click', "#updateArticulo", evalModificar);
    $(document).on('click', "#buttonVolver", restoreArticulos);
}