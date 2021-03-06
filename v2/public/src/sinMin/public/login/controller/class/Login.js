"use strict";

class Login{
    evalInputsLogin(){
        let result = [];
        result["succes"] = true;
        result["errores"] = [];
        result["errores"]["nick"] = true;
        result["errores"]["pass"] = true;

        if(!validateNickLogin($("#nick").val())){
            result["succes"] = false;
            result["errores"]["nick"] = false;
        }
        if(!validatePassLogin($("#pass").val())){
            result["succes"] = false;
            result["errores"]["pass"] = false;
        }

        return result;
    }

    getParameterLogin(){
        return 'action=' + 'login&' + $("#formLogin").serialize();
    }

    getParameterAccesos(){
        return 'action=' + 'acceso&' + $("#formLogin").serialize();
    }

    getTextErrorLogin(result){
        let errorText = "";

        if(!result["nick"]){
            errorText += "<strong>Formato de nick incorrecto</strong><br>";
            errorText += "Solo admite letras<br>";
            errorText += "Ha de contener al menos 5 caracteres<br>";
        }
        if(!result["pass"]){
            errorText += "<strong>Formato de password incorrecto</strong><br>";
            errorText += "Solo admite letras<br>";
            errorText += "Ha de contener al menos 5 caracteres<br>";
        }

        return errorText;
    }
}