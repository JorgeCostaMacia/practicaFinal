"use strict";

function search(){
    cleanTbody();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    ajaxApp.callController(accesosApp.getParameterSearchAccesos(),'callBackSearchClientes');
}

function callBackSearchClientes(result){
    if (!result["success"]) {
        msjDanger("ACCESOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["accesos"].length !== 0){
            accesos = result["accesos"];
            injectAccesos(result["accesos"]);
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

    ajaxApp.callController(accesosApp.getParameterSearchAccesos(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("ACCESOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["accesos"].length !== 0){
            accesos = result["accesos"];
            cleanTbody();
            injectAccesos(result["accesos"]);
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
    ajaxApp.callController(accesosApp.getParameterSearchAccesos(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("ACCESOS", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        injectAccesos(result["accesos"]);
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}