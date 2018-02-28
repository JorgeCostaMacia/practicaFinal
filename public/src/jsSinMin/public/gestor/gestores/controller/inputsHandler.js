"use strict";

function validatePassLogin(loginPass) {
    return esTexto(loginPass) && loginPass.length >= 5;
}