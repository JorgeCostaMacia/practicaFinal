"use strict";

function validatePrecio(precio){
    return esNumeroPositivoEntero(precio) || precio === "0" || (esNumeroDecimal(precio) && precio > 0);
}
function validateDescuento(descuento){
    return descuento === "0" || descuento === "1" || (esNumeroDecimal(descuento) && descuento > 0 && descuento <=1);
}