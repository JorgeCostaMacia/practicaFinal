"use strict";

function evalRegistro(){
    msjClean();

    let result = registroApp.evalInputsRegistro();

    if(!result["succes"]){
        msjDanger("REGISTRO", registroApp.getTextErrorRegistro(result["errores"]));
    }
    else {
        ajaxApp.callController(registroApp.getParameterRegistro(),'callBackEvalRegistro');
    }
}

function callBackEvalRegistro(result){
    if (!result["success"]) {
        msjDanger("LOGIN", result["errores"][0]["errMessage"]);
    }
    else if(registroApp.getTextExistRegistro(result) === ""){
        msjInfo("REGISTRO", "Se ha registrado correctamente, en breve validaran su cuenta");
    }
    else {
        msjWarning("REGISTRO", registroApp.getTextExistRegistro(result));
        addformLogin();
    }
}