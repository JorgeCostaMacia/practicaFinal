"use strict";

function search(){
    cleanTbody();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    msjClean();
    ajaxApp.callController(pedidosClienteApp.getParameterSearchPedidosCliente(),'callBackSearchPedidosCliente');
}

function callBackSearchPedidosCliente(result){
    if (!result["success"]) {
        msjDanger("SEARCH PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["pedidos"].length !== 0){
            injectPedidos(result["pedidos"]);
            addEventsLineas(result["pedidos"]);
            addEventsSiguiente();
        }
    }
}

function searchSiguiente(){
    delEventsSig();
    delEventsAnt();
    msjClean();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(pedidosClienteApp.getParameterSearchPedidosCliente(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){

    if (!result["success"]) {
        msjDanger("SEARCH PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["pedidos"].length !== 0){
            cleanTbody();
            injectPedidos(result["pedidos"]);
            addEventsLineas(result["pedidos"]);
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
    msjClean();
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(pedidosClienteApp.getParameterSearchPedidosCliente(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("SEARCH PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        injectPedidos(result["pedidos"]);
        addEventsLineas(result["pedidos"]);
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}