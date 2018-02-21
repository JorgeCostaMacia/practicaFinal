"use strict";

class AltaCliente{
    evalInputsRegistro(){
        let result = [];
        result["succes"] = true;
        result["errores"] = [];
        result["errores"]["nick"] = true;
        result["errores"]["pass"] = true;
        result["errores"]["nombre_completo"] = true;
        result["errores"]["cif_dni"] = true;
        result["errores"]["razon_social"] = true;
        result["errores"]["domicilio_social"] = true;
        result["errores"]["ciudad"] = true;
        result["errores"]["email"] = true;
        result["errores"]["telefono"] = true;

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
        if(!validateCifDni($("#cif_dni").val())){
            result["succes"] = false;
            result["errores"]["cif_dni"] = false;
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

    getParameterRegistro(){
        return 'action=' + 'altaCliente&' + $("#formGetAccount").serialize();
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
        if(!result["cif_dni"]){
            errorText += "<strong>Formato de CIF DNI incorrecto</strong><br>";
            errorText += "Ha de ser un CIF DNI correcto<br>";
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

    getTextExistRegistro(result){
        let errorText = "";

        if(result["usuarios_cliente"].length !== 0 || result["solicitudes"].length !== 0){
            errorText += "<strong>No se puede registrar</strong><br>";
        }
        if(result["usuarios_cliente"].length !== 0){
            errorText += "Existe un usuario registrado con los datos introducidos<br>";
        }
        if(result["solicitudes"].length !== 0){
            errorText += "Existe una solicitud pendiente con los datos introducidos<br>";
        }

        return errorText;
    }
}