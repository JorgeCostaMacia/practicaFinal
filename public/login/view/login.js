"use strict";

function addformGetAccount(){
    msjClean();
    $("#formLoginContainer").attr('class', "container hidden");
    $("#formAcountContainer").attr('class', "container");
}

function addformLogin(){
    msjClean();
    $("#formAcountContainer").attr('class', "container hidden");
    $("#formLoginContainer").attr('class', "container");
}