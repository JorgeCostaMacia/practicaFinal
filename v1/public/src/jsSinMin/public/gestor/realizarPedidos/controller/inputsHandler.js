"use strict";

function validateCantidad(cantidad) {
	return esNumeroPositivoEntero(cantidad) || cantidad === "0";
}
