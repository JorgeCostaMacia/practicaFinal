"use strict";

function evalRegistro(){
    msjClean();

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
        msjInfo("ALTA CLIENTE", "Se ha efectuado el alta correctamente");
    }
    else {
        msjWarning("ALTA CLIENTE", altaClienteApp.getTextExistRegistro(result));
    }
}