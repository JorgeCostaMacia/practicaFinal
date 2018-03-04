"use strict";

function search(){
    injectTitleAlbaranes();
    cleanTbody();
    restoreAlbaranes();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    ajaxApp.callController(albaranesApp.getParameterSearchAlbaranes(),'callBackSearchAlbaranes');
}

function callBackSearchAlbaranes(result){
    if (!result["success"]) {
        msjDanger("ALBARANES", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["albaranes"].length !== 0){
            albaranes = result["albaranes"];
            injectAlbaranes(result["albaranes"]);
            addEventsLineas(result["albaranes"]);
            addEventsSiguiente();
        }
    }
}

function searchSiguiente(){
    injectTitleAlbaranes();
    restoreAlbaranes();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(albaranesApp.getParameterSearchAlbaranes(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("ALBARANES", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["pedidos"].length !== 0){
            cleanTbody();
            albaranes = result["albaranes"];
            injectPedidos(result["albaranes"]);
            addEventsLineas(result["albaranes"]);
            addEventsSiguiente();
        }
        else{ $('#numPage').val($('#numPage').val() * 1 - 1); }

        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function searchAnterior(){
    injectTitleAlbaranes();
    restoreAlbaranes();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(albaranesApp.getParameterSearchAlbaranes(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("ALBARANES", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        albaranes = result["albaranes"];
        injectAlbaranes(result["pedidos"]);
        addEventsLineas(result["pedidos"]);
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}