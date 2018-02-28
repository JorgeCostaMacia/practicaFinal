"use strict";

function search(){
    ajaxApp.callController(solicitudesApp.getParameterSearchSolicitudes(),'callBackSearchSolicitudes');
}

function callBackSearchSolicitudes(result){
    if (!result["success"]) {
        msjDanger("SOLICITUDES", result["errores"][0]["errMessage"]);
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
    for(let i = 0; i < solicitudes.length; i++){
        if(solicitudes[i]["cod_solicitud"] === event.target.name.split('-')[1]){
            injectDetalles(solicitudes[i]);
        }
    }
}

function aceptarSolicitud(event){
    ajaxApp.callController(solicitudesApp.getParameterAceptarSolicitud(event),'callBackAceptarSolicitudes');
}

function callBackAceptarSolicitudes(result){
    if (!result["success"]) {
        msjDanger("SOLICITUDES", result["errores"][0]["errMessage"]);
    }
    else{
        msjSucces("SOLICITUDES", '<strong>Se acepto la solicitud correctamente</strong>');
        cleanTbody();
    }
}

function cancelarSolicitud(event){
    ajaxApp.callController(solicitudesApp.getParameterCancelarSolicitud(event),'callBackCancelarSolicitudes');
}

function callBackCancelarSolicitudes(result){
    if (!result["success"]) {
        msjDanger("SOLICITUDES", result["errores"][0]["errMessage"]);
    }
    else{
        msjSucces("SOLICITUDES", '<strong>Se cancelo la solicitud correctamente</strong>');
        cleanTbody();
    }
}