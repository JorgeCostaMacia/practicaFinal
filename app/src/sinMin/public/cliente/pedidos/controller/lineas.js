"use strict";

function searchLineas(event){
    cleanLineas();
    var cod_pedido = event.target.id.split('-')[1];
    ajaxApp.callController(pedidosApp.getParameterSearchLineas(cod_pedido),'callBackSearchLineas');
}

function callBackSearchLineas(result){
    if (!result["success"]) {
        msjDanger("PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        addEventsButtonLineas();
        lineasPedidos = result["lineas_pedidos"];
        injectLineas(result["lineas_pedidos"]);
    }
}

function evalCantidades(){
    let result = pedidosApp.evalInputsCantidades();

    if(!result["success"]){
        msjDanger("PEDIDOS", pedidosApp.getTextErrorCantidades(result["errores"]));
    }
    else {
        if(pedidosApp.evalExistPendientes()["success"]){
            ajaxApp.callController(pedidosApp.getParameterUpdateLineas(),'callBackEvalCantidades');
        }
        else {
            msjInfo("PEDIDOS", '<strong>No puede modificar las cantidades<br></strong>Todas las lineas han sido procesadas');
        }
    }
}

function callBackEvalCantidades(result){
    if(!result["success"]){
        msjDanger("PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        msjSucces("PEDIDOS", "<strong>Se ha actualizado correctamente su pedido</strong>");
        restorePedidos();
        cleanTbody();
    }
}