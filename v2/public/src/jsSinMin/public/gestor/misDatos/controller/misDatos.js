"use strict";

function evalModificar(){
    let result = updateApp.evalInputsUpdate();

    if(!result["succes"]){
        msjDanger("MIS DATOS", updateApp.getTextErrorUpdate(result["errores"]));
    }
    else {
        ajaxApp.callController(updateApp.getParameterUpdate(),'callBackEvalUpdate');
    }
}

function callBackEvalUpdate(result){
    if (!result["success"]) {
        msjDanger("MIS DATOS", result["errores"][0]["errMessage"]);
    }
    else {
        $('#formGetAccount').submit()
    }
}