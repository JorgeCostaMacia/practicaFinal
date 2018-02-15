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
        else{
            delEventsSig();
            $('#numPage').val($('#numPage').val() - 1);
        }

        if($('#numPage').val() === "1" ){ delEventsAnt();}
        else {addEventsAnterior();}

        injectPageNumber();
    }
}

function searchAnterior(){
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
        if($('#numPage').val() === "1" ){ delEventsAnt();}
        else {addEventsAnterior();}

        injectPageNumber();
    }
}

function searchLineas(event){
    let cod_pedido = event.target.id.split('-')[1];
    msjClean();
    ajaxApp.callController(pedidosClienteApp.getParameterSearchLineas(cod_pedido),'callBackSearchLineas');
}

function callBackSearchLineas(result){
    if (!result["success"]) {
        msjDanger("SEARCH PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        console.log(result);
    }
}









function evalCantidades(){
    msjClean();
    let result = realizarPedidosClienteApp.evalInputsCantidades();

    if(!result["success"]){
        msjDanger("PROCESAR", realizarPedidosClienteApp.getTextErrorCantidades(result["errores"]));
    }
    else { ajaxApp.callController(realizarPedidosClienteApp.getParameterProcesarArticulos(),'callBackEvalCantidades');}
}

function callBackEvalCantidades(result){
    if(!result["success"]){
        msjDanger("PROCESAR", result["errores"][0]["errMessage"]);
    }
    else { msjSucces("PROCESAR", "<strong>Se han procesado correctamente sus pedidos</strong>")}
}