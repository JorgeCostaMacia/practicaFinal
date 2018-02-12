"use strict";

function search(){
    msjClean();
    ajaxApp.callController(realizarPedidosClienteApp.getParameterSearchArticulos(),'callBackSearchArticulos');

}

function callBackSearchArticulos(result){
    console.log(result);
    if (!result["success"]) {
        msjDanger("SEARCH ARTICULO", result["errores"][0]["errMessage"]);
    }
    else { injectArcitulos(result["articulos"]); }
}