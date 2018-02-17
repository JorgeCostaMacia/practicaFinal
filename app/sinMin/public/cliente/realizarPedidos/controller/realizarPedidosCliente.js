"use strict";

function search(){
    msjClean();
    ajaxApp.callController(realizarPedidosClienteApp.getParameterSearchArticulos(),'callBackSearchArticulos');
}

function callBackSearchArticulos(result){
    if (!result["success"]) {
        msjDanger("SEARCH ARTICULO", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        if(result["articulos"].length !== 0){
            articulos = result["articulos"];
            injectArcitulos(articulos);
            enableProcesar();
        }
        else {
            disableProcesar();
            articulos = "";
        }
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