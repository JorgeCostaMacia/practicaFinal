"use strict";

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
    }
}

function search(){
    ajaxApp.callController(realizarPedidosApp.getParameterSearchArticulos(),'callBackSearchArticulos');
}

function callBackSearchArticulos(result){
    if (!result["success"]) {
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        if(result["articulos"].length !== 0){
            articulos = result["articulos"];
            injectArticulos(articulos);
            enableProcesar();
        }
        else {
            disableProcesar();
            articulos = "";
        }
    }
}

function evalCantidades(){
    let result = realizarPedidosApp.evalInputsCantidades();

    if(!result["success"]){
        msjDanger("REALIZAR PEDIDOS", realizarPedidosApp.getTextErrorCantidades(result["errores"]));
    }
    else if(!result["empty"]){ ajaxApp.callController(realizarPedidosApp.getParameterProcesarArticulos(),'callBackEvalCantidades');}
    else {msjInfo("REALIZAR PEDIDOS", '<strong>Todas las cantidades son 0</strong>')}
}

function callBackEvalCantidades(result){
    console.log(result);
    if(!result["success"]){
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else { msjSucces("REALIZAR PEDIDOS", "<strong>Se han procesado correctamente sus pedidos</strong>")}
}