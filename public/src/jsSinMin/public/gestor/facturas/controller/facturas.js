"use strict";

function search(){
    total = 0;
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


function procesarFactura(){
    if(facturasApp.evalChangeEstado()){
        ajaxApp.callController(facturasApp.getParameterProcesarFactura(),'callBackProcesarFactura');
    }
    else {
        msjInfo("FACTURAS", '<strong>No ha modificado ningun estado</strong>');
    }
}

function callBackProcesarFactura(result){
    if (!result["success"]) {
        msjDanger("FACTURAS", result["errores"][0]["errMessage"]);
    }
    else {
        msjSucces("FACTURAS", "<strong>Se ha procesado correctamente la factura</strong>");
        cleanTbody();
        restoreFacturas();
    }
}

function  actualizarFactura(){
    if(factura["estado"] === "pendiente"){
        let result = facturasApp.evalInputDescuento();
        if(result["success"]){
            ajaxApp.callController(facturasApp.getParameterUpdateFactura(),'callBackActualizarFactura');
        }
        else {msjDanger("FACTURAS", facturasApp.getTextErrorDescuento(result["errores"]));}
    }
    else {
        msjInfo("FACTURAS", '<strong>No se puede realizar la accion<br></strong>La factura ha sido procesada');
    }
}

function callBackActualizarFactura(result){
    if (!result["success"]) {
        msjDanger("FACTURAS", result["errores"][0]["errMessage"]);
    }
    else {
        msjSucces("FACTURAS", "<strong>Se actualizaron los datos correctamente</strong>");
        cleanTbody();
        restoreFacturas();
    }
}