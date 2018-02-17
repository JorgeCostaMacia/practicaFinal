"use strict";

function evalLogin(){
    msjClean();

    let result = loginApp.evalInputsLogin();

    if(!result["succes"]){
        msjDanger("LOGIN", loginApp.getTextErrorLogin(result["errores"]));
    }
    else { ajaxApp.callController(loginApp.getParameterLogin(),'callBackEvalLogin'); }
}

function callBackEvalLogin(result) {
    if (!result["success"]) {
        msjDanger("LOGIN", result["errores"][0]["errMessage"]);
    }
    else if(result["usuarios_cliente"].length === 0 && result["usuarios_gestion"].length === 0){
        msjWarning("LOGIN", "No existe el usuario");
    }
    else if($("#usuario").val() === "gestor"){
        ajaxApp.callController(loginApp.getParameterAccesos(),'callBackAcceso');
    }
    else { $("#formLogin").submit(); }
}

function callBackAcceso(result){
    if (!result["success"]) {
        msjDanger("LOGIN", result["errores"][0]["errMessage"]);
    }
    else { $("#formLogin").submit(); }
}