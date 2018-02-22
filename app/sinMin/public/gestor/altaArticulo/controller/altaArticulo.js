"use strict";

function evalRegistro(){
    msjClean();

    let result = altaArticuloApp.evalInputsRegistro();

    if(!result["succes"]){
        msjDanger("ALTA ARTICULO", altaArticuloApp.getTextErrorRegistro(result["errores"]));
    }
    else {
        ajaxApp.callController(altaArticuloApp.getParameterRegistro(),'callBackEvalRegistro');
    }
}

function callBackEvalRegistro(result){
    if (!result["success"]) {
        msjDanger("ALTA ARTICULO", result["errores"][0]["errMessage"]);
    }
    else {
        msjInfo("ALTA ARTICULO", "Se ha efectuado el alta correctamente");
    }
}