"use strict";

function searchLineas(event){
    cleanLineas();
    cod_pedido = event.target.id.split('-')[1];
    ajaxApp.callController(pedidosApp.getParameterSearchLineas(cod_pedido),'callBackSearchLineas');
}

function callBackSearchLineas(result){
    if (!result["success"]) {
        msjDanger("PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        addEventsButtonLineas();
        lineasPedidos = result["lineas_pedidos"];
        injectLineas(result["lineas_pedidos"], pedidosApp.getCodClientePedido(cod_pedido));
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
            msjInfo("PEDIDOS", '<strong>No se puede realizar la accion<br></strong>Todas las lineas han sido procesadas');
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

function evalEstados(){
    if(pedidosApp.evalExistPendientes()["success"]){
        if(!pedidosApp.evalEstadoInputs()["success"]){
            msjInfo("PEDIDOS", '<strong>No has modificado ningun estado</strong>');
        }
        else {
            ajaxApp.callController(pedidosApp.getParameterProcesarLineas(),'callBackEvalEstado');
        }
    }
    else {
        msjInfo("PEDIDOS", '<strong>No se puede realizar la accion<br></strong>Todas las lineas han sido procesadas');
    }
}

function callBackEvalEstado(result){
    if (!result["success"]) {
        msjDanger("PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        msjSucces("PEDIDOS", '<strong>Se ha procesado correctamente el pedido</strong>');
        restorePedidos();
        cleanTbody();
    }
}