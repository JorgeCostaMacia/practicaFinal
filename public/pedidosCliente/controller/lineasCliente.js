"use strict";

function searchLineas(event){
    cleanLineas();
    var cod_pedido = event.target.id.split('-')[1];
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
    let result = pedidosClienteApp.evalInputsCantidades();

    if(!result["success"]){
        msjDanger("ACTUALIZAR PEDIDO", pedidosClienteApp.getTextErrorCantidades(result["errores"]));
    }
    else {
        ajaxApp.callController(pedidosClienteApp.getParameterUpdateLineas(),'callBackEvalCantidades');
    }
}

function callBackEvalCantidades(result){
    if(!result["success"]){
        msjDanger("PROCESAR", result["errores"][0]["errMessage"]);
    }
    else { msjSucces("ACTUALIZAR PEDIDO", "<strong>Se ha actualizado correctamente su pedido</strong>")}
}