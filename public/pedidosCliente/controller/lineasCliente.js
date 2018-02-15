"use strict";

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
        addEventsButtonLineas();
        injectLineas(result["lineas_pedidos"]);
    }
}

function evalCantidades(){
    msjClean();
    pedidosClienteApp.evalInputsCantidades();
/*
    if(!result["success"]){
        msjDanger("PROCESAR", realizarPedidosClienteApp.getTextErrorCantidades(result["errores"]));
    }
    else { ajaxApp.callController(realizarPedidosClienteApp.getParameterProcesarArticulos(),'callBackEvalCantidades');}
    */
}

function callBackEvalCantidades(result){
    if(!result["success"]){
        msjDanger("PROCESAR", result["errores"][0]["errMessage"]);
    }
    else { msjSucces("PROCESAR", "<strong>Se han procesado correctamente sus pedidos</strong>")}
}