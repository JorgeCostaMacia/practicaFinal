"use strict";

class Update{
    evalInputsUpdate(){
        let result = [];
        result["succes"] = true;
        result["errores"] = [];
        result["errores"]["pass"] = true;

        if(!validatePassLogin($("#passReg").val())) {
            result["succes"] = false;
            result["errores"]["pass"] = false;
        }

        return result;
    }

    getParameterUpdate(){
        let parameter = 'action=' + 'update&';
        parameter += $("#formGetAccount").serialize();
        return parameter;
    }

    getTextErrorUpdate(result){
        let errorText = "";

        if(!result["pass"]){
            errorText += "<strong>Formato de password incorrecto</strong><br>";
            errorText += "Solo admite letras<br>";
            errorText += "Ha de contener al menos 5 caracteres<br>";
        }

        return errorText;
    }
}