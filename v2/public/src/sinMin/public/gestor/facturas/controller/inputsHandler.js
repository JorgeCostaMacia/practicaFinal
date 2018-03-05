"use strict";

function validateDescuento(descuento){
    return descuento === "0" || descuento === "100" || (esNumeroPositivoEntero(descuento) && descuento > 0 && descuento <=100);
}