"use strict";

function evalModificar(){
    msjClean();

    let result = updateApp.evalInputsUpdate();

    if(!result["succes"]){
        msjDanger("UPDATE", updateApp.getTextErrorUpdate(result["errores"]));
    }
    else {
        ajaxApp.callController(updateApp.getParameterUpdate(),'callBackEvalUpdate');
    }
}

function callBackEvalUpdate(result){
    if (!result["success"]) {
        msjDanger("UPDATE", result["errores"][0]["errMessage"]);
    }
    else { $('#formGetAccount').submit();}
}