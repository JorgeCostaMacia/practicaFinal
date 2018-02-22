"use strict";

function evalRegistro(){
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
        msjSucces("ALTA GESTOR", "<strong>Se ha efectuado el alta correctamente</strong>");
    }
    else {
        msjWarning("ALTA GESTOR", altaGestorApp.getTextExistRegistro(result));
    }
}