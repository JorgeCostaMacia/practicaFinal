"use strict";

class Clientes{
    getParameterSearchClientes(){
        return  'action=' + 'searchClientes&' + $("#formSearch").serialize();
    }

    evalInputsUpdate(){
        let result = [];
        result["succes"] = true;
        result["errores"] = [];
        result["errores"]["pass"] = true;
        result["errores"]["razon_social"] = true;
        result["errores"]["domicilio_social"] = true;
        result["errores"]["ciudad"] = true;
        result["errores"]["email"] = true;
        result["errores"]["telefono"] = true;

        if(!validatePassLogin($("#passReg").val())){
            result["succes"] = false;
            result["errores"]["pass"] = false;
        }
        if(!validateRazonSocial($("#razon_social").val())){
            result["succes"] = false;
            result["errores"]["razon_social"] = false;
        }
        if(!validateDomicilioSocial($("#domicilio_social").val())){
            result["succes"] = false;
            result["errores"]["domicilio_social"] = false;
        }
        if(!validateCiudad($("#ciudad").val())){
            result["succes"] = false;
            result["errores"]["ciudad"] = false;
        }
        if(!validateEmail($("#email").val())){
            result["succes"] = false;
            result["errores"]["email"] = false;
        }
        if(!validateTelefono($("#telefono").val())){
            result["succes"] = false;
            result["errores"]["telefono"] = false;
        }

        return result;
    }

    getParameterUpdate(){ return 'action=' + 'updateCliente&' + $("#formGetAccount").serialize(); }

    getTextErrorUpdate(result){
        let errorText = "";

        if(!result["pass"]){
            errorText += "<strong>Formato de password incorrecto</strong><br>";
            errorText += "Solo admite letras<br>";
            errorText += "Ha de contener al menos 5 caracteres<br>";
        }
        if(!result["razon_social"]){
            errorText += "<strong>Formato de razon social incorrecto</strong><br>";
            errorText += "Solo admite letras y .<br>";
            errorText += "Ha de comenzar por una letra<br>";
            errorText += "Ha de contener nombre social . tipo empresa<br>";
            errorText += "Ha de contener al menos 5 caracteres<br>";
        }
        if(!result["domicilio_social"]){
            errorText += "<strong>Formato de domicilio social incorrecto</strong><br>";
            errorText += "Solo admite letras y \ <br>";
            errorText += "Ha de comenzar por una letra<br>";
            errorText += "Puede contener tipo domicilio \ nombre domicilio o nombre domicilio<br>";
            errorText += "Ha de contener al menos 5 caracteres<br>";
        }
        if(!result["ciudad"]){
            errorText += "<strong>Formato de ciudad incorrecto</strong><br>";
            errorText += "Solo admite letras y espacios<br>";
            errorText += "Ha de comenzar por una letra<br>";
            errorText += "Puede contener un unico espacio<br>";
            errorText += "Ha de contener al menos 5 caracteres<br>";
        }
        if(!result["email"]){
            errorText += "<strong>Formato de email incorrecto</strong><br>";
            errorText += "Ha de comenzar por una letra<br>";
            errorText += "Ha de contener nombre@email.dominio<br>";

        }
        if(!result["telefono"]){
            errorText += "<strong>Formato de telefono incorrecto</strong><br>";
            errorText += "Solo admite numeros y +<br>";
            errorText += "Ha de terminar en 9 numeros<br>";
            errorText += "Ha de contener al menos 9 caracteres<br>";
        }

        return errorText;
    }
}