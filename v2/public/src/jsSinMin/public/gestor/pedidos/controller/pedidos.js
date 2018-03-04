"use strict";

function search(){
    cleanTbody();
    restorePedidos();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    ajaxApp.callController(pedidosApp.getParameterSearchPedidosCliente(),'callBackSearchPedidosCliente');
}

function callBackSearchPedidosCliente(result){
    if (!result["success"]) {
        msjDanger("PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["pedidos"].length !== 0){
            pedidos = result["pedidos"];
            injectPedidos(result["pedidos"]);
            addEventsLineas(result["pedidos"]);
            addEventsSiguiente();
        }
    }
}

function searchSiguiente(){
    restorePedidos();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(pedidosApp.getParameterSearchPedidosCliente(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["pedidos"].length !== 0){
            cleanTbody();
            pedidos = result["pedidos"];
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
    restorePedidos();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(pedidosApp.getParameterSearchPedidosCliente(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        pedidos = result["pedidos"];
        injectPedidos(result["pedidos"]);
        addEventsLineas(result["pedidos"]);
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}