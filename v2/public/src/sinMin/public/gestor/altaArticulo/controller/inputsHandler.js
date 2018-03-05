"use strict";

function validateNombre(nombre){
    return esTexto(nombre) && nombre.length >= 2;
}

function validateDescripcion(descripcion){
    return esTextoEspacio(descripcion) && descripcion.length >= 5 && esFormatoDescripcion(descripcion);
}

function esFormatoDescripcion(descripcion){
    return esLetra(descripcion[0]);
}

function validatePrecio(precio){
    return esNumeroPositivoEntero(precio) || precio === "0" || (esNumeroDecimal(precio) && precio > 0);
}
function validateDescuento(descuento){
    return descuento === "0" || descuento === "100" || (esNumeroPositivoEntero(descuento) && descuento > 0 && descuento <=100);
}