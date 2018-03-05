"use strict";

function search(){
    cleanTbody();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    ajaxApp.callController(actividadApp.getParameterSearchActividad(),'callBackSearchActividad');
}

function callBackSearchActividad(result){
    if (!result["success"]) {
        msjDanger("ACTIVIDAD", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["actividad"].length !== 0){
            actividad = result["actividad"];
            injectActividad(result["actividad"]);
            addEventsSiguiente();
            enableDescarga();
        }
        else {disableDescarga();}
    }
}

function searchSiguiente(){
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(actividadApp.getParameterSearchActividad(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("ACTIVIDAD", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["actividad"].length !== 0){
            cleanTbody();
            actividad = result["actividad"];
            injectActividad(result["actividad"]);
            addEventsSiguiente();
        }
        else{ $('#numPage').val($('#numPage').val() * 1 - 1); }

        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function searchAnterior(){
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(actividadApp.getParameterSearchActividad(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("ACTIVIDAD", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        actividad = result["actividad"];
        injectActividad(result["actividad"]);
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}