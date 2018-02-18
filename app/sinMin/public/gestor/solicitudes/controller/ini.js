"use strict";

var solicitudesApp = new Solicitudes();
var ajaxApp = new Ajax();
var solicitudes = "";

document.onload = addEventsSolicitudes();

function addEventsSolicitudes(){
    $("#search").click(search);
}

function addEventsDetalles(solicitudes){
    for(let i = 0; i < solicitudes.length; i++){
        $('#detalles-' + solicitudes[i]['cod_solicitud']).off();
        $('#detalles-' + solicitudes[i]['cod_solicitud']).click(showSolicitud);
    }
}
function addEventsAcceptar(){
    for(let i = 0; i < solicitudes.length; i++){
        $('#aceptar-' + solicitudes[i]['cod_solicitud']).off();
        $('#aceptar-' + solicitudes[i]['cod_solicitud']).click(aceptarSolicitud);
    }
}
function addEventsCancelar(){
    for(let i = 0; i < solicitudes.length; i++){
        $('#cancelar-' + solicitudes[i]['cod_solicitud']).off();
        $('#cancelar-' + solicitudes[i]['cod_solicitud']).click(cancelarSolicitud);
    }
}