"use strict";

function validateNickLogin(loginNick) {
	return esTexto(loginNick) && loginNick.length >= 5;
}

function validatePassLogin(loginPass) {
	return esTexto(loginPass) && loginPass.length >= 5;
}
function validateNombreCompleto(nombre){
    return esTextoEspacio(nombre) && nombre.length >= 10 && esFormatoNombre(nombre);
}

function esFormatoNombre(nombreCompleto){
    if(esLetra(nombreCompleto[0])){
        let nombreCom = nombreCompleto.split(" ");
        return nombreCom.length === 3;
    }
    else { return false; }
}