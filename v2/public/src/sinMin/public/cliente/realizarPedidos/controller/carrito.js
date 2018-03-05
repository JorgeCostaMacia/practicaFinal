"use strict";

function borrarCarrito(){
    localStorage.clear();
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
        msjSucces("REALIZAR PEDIDOS", '<strong>Se ha actualizado su carrito correctamente</strong>')
    }
    else {msjInfo("REALIZAR PEDIDOS", '<strong>Todas las cantidades son 0</strong>')}
}

function carrito(){
    let articulosCarrito = realizarPedidosApp.getLocalStorage();
    cleanTbody();
    injectTitleCarrito();
    if(articulosCarrito.length > 0 ){
        injectCarrito(articulosCarrito);
        addEventsCarrito();
    }
}

function updateCarrito(){
    let result = realizarPedidosApp.evalInputsCantidadesUpdateCarrito();

    if(!result["success"]){
        msjDanger("REALIZAR PEDIDOS", realizarPedidosApp.getTextErrorCantidades(result["errores"]));
    }
    else {
        realizarPedidosApp.updateLocalStorage();
        msjSucces("REALIZAR PEDIDOS", '<strong>Se ha actualizado su carrito correctamente</strong>')
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
    else {msjInfo("REALIZAR PEDIDOS", '<strong>Todas las cantidades son 0</strong>')}

}

function callBackEvalCantidadesCarrito(result){
    if(!result["success"]){
        msjDanger("", result["errores"][0]["errMessage"]);
    }
    else {
        localStorage.clear();
        cleanTbody();
        injectTitleArticulos();
        msjSucces("REALIZAR PEDIDOS", "<strong>Se ha generado su pedido correctamente</strong>")
    }
}