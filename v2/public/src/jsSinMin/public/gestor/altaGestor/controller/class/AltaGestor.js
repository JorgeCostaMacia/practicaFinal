"use strict";

class AltaGestor{
    evalInputsRegistro(){
        let result = [];
        result["succes"] = true;
        result["errores"] = [];
        result["errores"]["nick"] = true;
        result["errores"]["pass"] = true;
        result["errores"]["nombre_completo"] = true;

        if(!validateNickLogin($("#nickReg").val())){
            result["succes"] = false;
            result["errores"]["nick"] = false;
        }
        if(!validatePassLogin($("#passReg").val())){
            result["succes"] = false;
            result["errores"]["pass"] = false;
        }
        if(!validateNombreCompleto($("#nombre_completo").val())){
            result["succes"] = false;
            result["errores"]["nombre_completo"] = false;
        }

        return result;
    }

    getParameterRegistro(){
        return 'action=' + 'altaGestor&' + $("#formGetAccount").serialize();
    }

    getTextErrorRegistro(result){
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
        if(!result["nombre_completo"]){
            errorText += "<strong>Formato de nombre completo incorrecto</strong><br>";
            errorText += "Solo admite letras y espacios<br>";
            errorText += "Ha de comenzar por una letra<br>";
            errorText += "Ha de contener un nombre y 2 apellidos separados por espacios<br>";
            errorText += "Ha de contener al menos 10 caracteres<br>";
        }

        return errorText;
    }

    getTextExistRegistro(result){
        let errorText = "";

        if(result["usuarios_gestion"].length !== 0 || result["solicitudes"].length !== 0){
            errorText = "<strong>No se puede registrar</strong><br>Existe un usuario registrado con los datos introducidos";
        }

        return errorText;
    }
}