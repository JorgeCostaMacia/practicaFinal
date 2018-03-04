"use strict";

function borrarCarrito(){
    realizarPedidosApp.borrarArticulosCarrito();
    msjInfo("REALIZAR PEDIDOS", '<strong>Se ha borrado el carrito correctamente</strong>');
    cleanTbody();
    injectTitleArticulos();
}

function evalCantidadesAgregar(){
    let result = realizarPedidosApp.evalInputsCantidades();

    if(!result["success"]){
        msjDanger("REALIZAR PEDIDOS", realizarPedidosApp.getTextErrorCantidades(result["errores"]));
    }
    else if(!result["empty"]){
        realizarPedidosApp.addLocalStorage();
        msjSucces("REALIZAR PEDIDOS", '<strong>Se ha actualizado su carrito correctamente</strong>');
    }
    else {msjInfo("REALIZAR PEDIDOS", '<strong>Todas las cantidades son 0</strong>'); }
}


function carrito(){
    realizarPedidosApp.iniIndex();
    realizarPedidosApp.iniArticulosCarrito();
    cleanTbody();
    injectTitleCarrito();
    if(Object.keys(articulosCarrito).length > 0 ){
        injectCarrito(articulosCarrito);
        addEventsCarrito();
    }
}

function updateCarrito(){
    realizarPedidosApp.iniIndex();
    realizarPedidosApp.iniArticulosCarrito();
    let result = realizarPedidosApp.evalInputsCantidadesUpdateCarrito();

    if(!result["success"]){
        msjDanger("REALIZAR PEDIDOS", realizarPedidosApp.getTextErrorCantidades(result["errores"]));
    }
    else {
        realizarPedidosApp.updateLocalStorage();
        msjSucces("REALIZAR PEDIDOS", '<strong>Se ha actualizado su carrito correctamente</strong>');
    }
}

function evalCantidadesCarrito(){
    let result = realizarPedidosApp.evalInputsCantidadesProcesarCarrito();

    if(!result["success"]){
        msjDanger("REALIZAR PEDIDOS", realizarPedidosApp.getTextErrorCantidades(result["errores"]));
    }
    else if(!result["empty"]){
        ajaxApp.callController(realizarPedidosApp.getParameterProcesarArticulos(),'callBackEvalCantidadesCarrito');
    }
    else {msjInfo("REALIZAR PEDIDOS", '<strong>Todas las cantidades son 0</strong>');}
}

function callBackEvalCantidadesCarrito(result){
    if(!result["success"]){
        msjDanger("", result["errores"][0]["errMessage"]);
    }
    else {
        realizarPedidosApp.borrarArticulosCarrito();
        cleanTbody();
        injectTitleArticulos();
        msjSucces("REALIZAR PEDIDOS", "<strong>Se ha generado su pedido correctamente</strong>");
    }
}