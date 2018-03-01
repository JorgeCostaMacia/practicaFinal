"use strict";

function search(){
    cleanTbody();
    restoreFacturas();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    ajaxApp.callController(facturasApp.getParameterSearchFacturas(),'callBackSearchFacturas');
}

function callBackSearchFacturas(result){
    if (!result["success"]) {
        msjDanger("FACTURAS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["facturas"].length !== 0){
            facturas = result["facturas"];
            injectFacturas(result["facturas"]);
            addEventsLineas(result["facturas"]);
            addEventsSiguiente();
        }
    }
}

function searchSiguiente(){
    restoreFacturas();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(facturasApp.getParameterSearchFacturas(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("FACTURAS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["facturas"].length !== 0){
            cleanTbody();
            facturas = result["facturas"];
            injectFacturas(result["facturas"]);
            addEventsLineas(result["facturas"]);
            addEventsSiguiente();
        }
        else{ $('#numPage').val($('#numPage').val() * 1 - 1); }

        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function searchAnterior(){
    restoreFacturas();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(facturasApp.getParameterSearchFacturas(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("FACTURAS", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        facturas = result["facturas"];
        injectFacturas(result["facturas"]);
        addEventsLineas(result["facturas"]);
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}