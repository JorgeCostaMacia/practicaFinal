"use strict";

function search(){
    msjClean();
    ajaxApp.callController(solicitudesApp.getParameterSearchSolicitudes(),'callBackSearchSolicitudes');
}

function callBackSearchSolicitudes(result){
    if (!result["success"]) {
        msjDanger("SEARCH SOLICITUDES", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        solicitudes = result["solicitudes"];
        if(result["solicitudes"].length !== 0){
            injectSolicitudes(result["solicitudes"]);
            addEventsDetalles(result["solicitudes"]);
            addEventsAcceptar(result["solicitudes"]);
            addEventsCancelar(result["solicitudes"]);
        }
    }
}

function showSolicitud(event){
    msjClean();
    for(let i = 0; i < solicitudes.length; i++){
        if(solicitudes[i]["cod_solicitud"] === event.target.name.split('-')[1]){
            injectDetalles(solicitudes[i]);
        }
    }
}

function aceptarSolicitud(event){
    msjClean();
    ajaxApp.callController(solicitudesApp.getParameterAceptarSolicitud(event),'callBackAceptarSolicitudes');
}

function callBackAceptarSolicitudes(result){
    if (!result["success"]) {
        msjDanger("ACEPTAR SOLICITUD", result["errores"][0]["errMessage"]);
    }
    else{
        msjSucces("ACEPTAR SOLICITUD", 'Se acepto la solicitud correctamente');
        cleanTbody();
    }
}

function cancelarSolicitud(event){
    ajaxApp.callController(solicitudesApp.getParameterCancelarSolicitud(event),'callBackCancelarSolicitudes');
}

function callBackCancelarSolicitudes(result){
    if (!result["success"]) {
        msjDanger("CANCELAR SOLICITUD", result["errores"][0]["errMessage"]);
    }
    else{
        msjSucces("CANCELAR SOLICITUD", 'Se cancelo la solicitud correctamente');
        cleanTbody();
    }
}