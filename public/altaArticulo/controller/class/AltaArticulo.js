"use strict";

class AltaArticulo{
    evalInputsRegistro(){
        let result = [];
        result["succes"] = true;
        result["errores"] = [];
        result["errores"]["nombre"] = true;
        result["errores"]["description"] = true;
        result["errores"]["precio"] = true;
        result["errores"]["descuento"] = true;

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
        return 'action=' + 'altaArticulo&' + $("#formGetAccount").serialize();
    }

    getTextErrorRegistro(result){
        let errorText = "";

        if(!result["nombre"]){
            errorText += "<strong>Formato de nombre incorrecto</strong><br>";
            errorText += "No puede estar vacio<br>";
        }
        if(!result["descripcion"]){
            errorText += "<strong>Formato de descripcion incorrecto</strong><br>";
            errorText += "No puede estar vacio<br>";
        }
        if(!result["precio"]){
            errorText += "<strong>Formato de precio completo incorrecto</strong><br>";
            errorText += "Ha de contener numeros, admite decimales<br>";
        }
        if(!result["descuento"]){
            errorText += "<strong>Formato de descuento completo incorrecto</strong><br>";
            errorText += "Ha de contener numeros, admite decimales<br>";
        }

        return errorText;
    }
}