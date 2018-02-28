"use strict";

var realizarPedidosApp = new RealizarPedidos();
var ajaxApp = new Ajax();
var articulos = "";
var indexLocal = [];

document.onload = addEventsRealizarPedidos();

function addEventsRealizarPedidos(){
    iniUsuarios();
    $("#search").click(search);
    $("#carrito").click(carrito);
    $("#borrar").click(borrarCarrito);
}

function addEventsSiguiente(){
    $('#siguiente').click(searchSiguiente);
}

function addEventsAnterior(){
    $('#anterior').click(searchAnterior);
}

function delEventsSig(){
    $('#siguiente').off();
}

function delEventsAnt(){
    $('#anterior').off();
}

function addEventsAgregar(){
    $(document).off('click', "#agregar");
    $(document).on('click', "#agregar", evalCantidadesAgregar);
}

function addEventsCarrito(){
    $(document).off('click', "#procesar");
    $(document).on('click', "#procesar", evalCantidadesCarrito);
    $(document).off('click', "#actualizar");
    $(document).on('click', "#actualizar", updateCarrito);
}