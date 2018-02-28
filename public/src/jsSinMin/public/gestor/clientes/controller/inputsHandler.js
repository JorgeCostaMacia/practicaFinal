"use strict";

function validatePassLogin(loginPass) {
    return esTexto(loginPass) && loginPass.length >= 5;
}

function validateRazonSocial(razon_social){
    return esTextoPunto(razon_social) && razon_social.length >= 5 && esFormatoRazonSocial(razon_social);
}

function esFormatoRazonSocial(razon_social){
    if(esLetra(razon_social[0])){
        let razonSocial = razon_social.split(".");
        return razonSocial.length === 2;
    }
    else { return false; }
}

function validateDomicilioSocial(domicilio_social){
    return esTextoBarra(domicilio_social) && domicilio_social.length >= 5 && esFormatoDomicilioSocial(domicilio_social);
}

function esFormatoDomicilioSocial(domicilio_social){
    if(esLetra(domicilio_social[0])){
        let domicilioSocial = domicilio_social.split("\\");
        return domicilioSocial.length === 2 || domicilioSocial.length === 1;
    }
    else { return false; }
}

function validateCiudad(ciudad){
    return esTextoEspacio(ciudad) && ciudad.length >= 3 && esFormatoCiudad(ciudad);
}

function esFormatoCiudad(ciudad){
    if(esLetra(ciudad[0])){
        let _ciudad = ciudad.split(" ");
        return _ciudad.length === 2 || _ciudad.length === 1;
    }
    else { return false; }
}

function validateEmail(email){
    let resultEmail = false;
    let _email = email.split("@");

    if(_email.length === 2){
        if(esTexto(_email[0])){
            _email = _email[1].split(".");
            if(_email.length === 2){
                if(esTexto(_email[0]) && esTexto(_email[1])){
                    resultEmail = true;
                }
            }
        }
    }
    return resultEmail;
}

function validateTelefono(telefono){
    return esNumeroMas(telefono) && telefono.length >= 9 && esFormatoTelefono(telefono);
}

function esFormatoTelefono(telefono){
    let controlData = true;

    for(let i = telefono.length -1; i > telefono.length - 10; i--){
        if(!esNumero(telefono[i])){ controlData = false; }
    }

    return controlData;
}
