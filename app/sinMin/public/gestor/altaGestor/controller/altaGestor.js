"use strict";

function evalRegistro(){
    msjClean();

    let result = altaGestorApp.evalInputsRegistro();

    if(!result["succes"]){
        msjDanger("ALTA CLIENTE", altaGestorApp.getTextErrorRegistro(result["errores"]));
    }
    else {
        ajaxApp.callController(altaGestorApp.getParameterRegistro(),'callBackEvalRegistro');
    }
}

function callBackEvalRegistro(result){
    if (!result["success"]) {
        msjDanger("ALTA GESTOR", result["errores"][0]["errMessage"]);
    }
    else if(altaGestorApp.getTextExistRegistro(result) === ""){
        msjInfo("ALTA GESTOR", "Se ha efectuado el alta correctamente");
    }
    else {
        msjWarning("ALTA GESTOR", altaGestorApp.getTextExistRegistro(result));
    }
}