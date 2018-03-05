"use strict";

function evalRegistro(){
    let result = altaClienteApp.evalInputsRegistro();

    if(!result["succes"]){
        msjDanger("ALTA CLIENTE", altaClienteApp.getTextErrorRegistro(result["errores"]));
    }
    else {
        ajaxApp.callController(altaClienteApp.getParameterRegistro(),'callBackEvalRegistro');
    }
}

function callBackEvalRegistro(result){
    if (!result["success"]) {
        msjDanger("ALTA CLIENTE", result["errores"][0]["errMessage"]);
    }
    else if(altaClienteApp.getTextExistRegistro(result) === ""){
        msjSucces("ALTA CLIENTE", "<strong>Se ha efectuado el alta correctamente</strong>");
    }
    else {
        msjWarning("ALTA CLIENTE", altaClienteApp.getTextExistRegistro(result));
    }
}