"use strict";

function evalRegistro(){
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
        msjDanger("REGISTRO", result["errores"][0]["errMessage"]);
    }
    else if(registroApp.getTextExistRegistro(result) === ""){
        msjSucces("REGISTRO", "<strong>Se ha registrado correctamente, en breve validaran su cuenta</strong>");
    }
    else {
        msjWarning("REGISTRO", registroApp.getTextExistRegistro(result));
        addformLogin();
    }
}