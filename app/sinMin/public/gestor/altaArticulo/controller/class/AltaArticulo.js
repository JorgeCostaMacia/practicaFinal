"use strict";

class AltaArticulo{
    evalInputsRegistro(){
        let result = [];
        result["succes"] = true;
        result["errores"] = [];
        result["errores"]["nombre"] = true;
        result["errores"]["descripcion"] = true;
        result["errores"]["precio"] = true;
        result["errores"]["descuento"] = true;

        if(!validateNombre($("#nombre").val())){
            result["succes"] = false;
            result["errores"]["nombre"] = false;
        }
        if(!validateDescripcion($("#descripcion").val())){
            result["succes"] = false;
            result["errores"]["descripcion"] = false;
        }
        if(!validatePrecio($("#precio").val())){
            result["succes"] = false;
            result["errores"]["precio"] = false;
        }
        if(!validateDescuento($("#descuento").val())){
            result["succes"] = false;
            result["errores"]["descuento"] = false;
        }

        return result;
    }

    getParameterRegistro(){
        return 'action=' + 'altaArticulo&' + $("#formAltaArticulo").serialize();
    }

    getTextErrorRegistro(result){
        let errorText = "";

        if(!result["nombre"]){
            errorText += "<strong>Formato de nombre incorrecto</strong><br>";
            errorText += "Solo admite letras<br>";
            errorText += "Ha de contener al menos 2 caracteres<br>";
        }
        if(!result["descripcion"]){
            errorText += "<strong>Formato de descripcion incorrecto</strong><br>";
            errorText += "Solo admite letras y espacios<br>";
            errorText += "Ha de comenzar por una letra<br>";
            errorText += "Ha de contener al menos 5 caracteres<br>";
        }
        if(!result["precio"]){
            errorText += "<strong>Formato de precio completo incorrecto</strong><br>";
            errorText += "Ha de contener numeros, admite decimales<br>";
            errorText += "Su valor minimo admisible es 0<br>";
        }
        if(!result["descuento"]){
            errorText += "<strong>Formato de descuento completo incorrecto</strong><br>";
            errorText += "Ha de contener numeros, admite decimales<br>";
            errorText += "Su valor minimo admisible es 0<br>";
            errorText += "Su valor maximo admisible es 1, equivale a 100%<br>";
        }

        return errorText;
    }
}