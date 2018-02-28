"use strict";

function borrarCarrito(){
    localStorage.clear();
    msjInfo("REALIZAR PEDIDOS", '<strong>Se ha borrado el carrito correctamente</strong>');
    cleanTbody();
    injectTitleArticulos();
}

function iniUsuarios(){
    ajaxApp.callController(realizarPedidosApp.getParameterGetClientes(),'callBackIniUsuarios');
}

function callBackIniUsuarios(result){
    if (!result["success"]) {
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else if(result["usuarios_cliente"].length > 0){
        injectClientes(result["usuarios_cliente"]);
        enableBuscar();
        enableCarrito();
    }
}

function search(){
    cleanTbody();
    injectTitleArticulos();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    ajaxApp.callController(realizarPedidosApp.getParameterSearchArticulos(),'callBackSearchArticulos');
}

function callBackSearchArticulos(result){
    if (!result["success"]) {
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["articulos"].length !== 0){
            articulos = result["articulos"];
            injectArticulos(articulos);
            addEventsSiguiente();
            addEventsAgregar();
        }
        else {
            disableProcesar();
            articulos = "";
        }
    }
}


function searchSiguiente(){
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(realizarPedidosApp.getParameterSearchArticulos(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["articulos"].length !== 0){
            cleanTbody();
            injectTitleArticulos();
            articulos = result["articulos"];
            injectArticulos(result["articulos"]);
            addEventsAgregar();
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
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(realizarPedidosApp.getParameterSearchArticulos(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        injectTitleArticulos();
        articulos = result["articulos"];
        injectArticulos(result["articulos"]);
        addEventsAgregar();
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
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
        msjSucces("REALIZAR PEDIDOS", "<strong>Se han procesado correctamente sus pedidos</strong>")
    }
}