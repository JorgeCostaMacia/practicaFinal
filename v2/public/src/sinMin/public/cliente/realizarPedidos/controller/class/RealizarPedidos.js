"use strict";

class RealizarPedidos{
    getParameterSearchArticulos(){
        return 'action=' + 'searchArticulosActivos&' + $("#formSearch").serialize();
    }

    getParameterProcesarArticulos(){
        let parameter = 'action=' + 'procesarArticulos&usuario=' + $('#usuario').val() + '&cod_cliente=' + $('#cod_cliente').val();

        for(let i = 0; i < indexLocal.length; i++){
            if($("#cod_articulo-" + indexLocal[i]).val() !== "0"){
                parameter += '&cod_articulo-' + indexLocal[i] + '=' + $('#cod_articulo-' + indexLocal[i]).val();
            }
        }

        return parameter;
    }

    iniIndex(){
        indexLocal = JSON.parse(localStorage.getItem('index'));

        if(indexLocal === "" || indexLocal === null){
            indexLocal = [];

        }
    }

    evalInputsCantidades(){
        let result = [];
        result['success'] = true;
        result['errores'] = [];
        result["empty"] = true;
        for(let i = 0; i < articulos.length; i++){
            if(!validateCantidad($('#cod_articuloReal-' + articulos[i]["cod_articulo"]).val())) {
                result['success'] = false;
                result['errores'].push(articulos[i]["cod_articulo"] + ' - ' + articulos[i]["nombre"]);
            }
            if($('#cod_articuloReal-' + articulos[i]["cod_articulo"]).val() !== "0"){ result["empty"] = false;}
        }

        return result;
    }

    evalInputsCantidadesUpdateCarrito(){
        this.iniIndex();
        let result = [];
        result['success'] = true;
        result['errores'] = [];

        for(let i = 0; i < indexLocal.length; i++){
            if(!validateCantidad($('#cod_articulo-' + indexLocal[i]).val())) {
                result['success'] = false;
                result['errores'].push(indexLocal[i] + ' - ' + JSON.parse(localStorage.getItem("articulo" + indexLocal[i]))["nombre"]);
            }
        }

        return result;
    }

    evalInputsCantidadesProcesarCarrito(){
        this.iniIndex();
        let result = [];
        result['success'] = true;
        result['errores'] = [];
        result["empty"] = true;

        for(let i = 0; i < indexLocal.length; i++){
            if(!validateCantidad($('#cod_articulo-' + indexLocal[i]).val())) {
                result['success'] = false;
                result['errores'].push(indexLocal[i] + ' - ' + JSON.parse(localStorage.getItem("articulo" + indexLocal[i]))["nombre"]);
            }
            if($('#cod_articulo-' + indexLocal[i]).val() !== "0"){ result["empty"] = false;}

        }

        return result;
    }

    addLocalStorage(){
        this.iniIndex();
        for(let i = 0; i < articulos.length; i++){
            if($("#cod_articuloReal-" + articulos[i]["cod_articulo"]).val() !== "0"){
                let artAux = {};
                artAux["cod_articulo"] = articulos[i]["cod_articulo"];
                artAux["nombre"] = articulos[i]["nombre"];
                artAux["descripcion"] = articulos[i]["descripcion"];
                artAux["precio"] = articulos[i]["precio"];
                artAux["descuento"] = articulos[i]["descuento"];
                artAux["iva"] = articulos[i]["iva"];
                artAux["cantidad"] = $('#cod_articuloReal-' + articulos[i]["cod_articulo"]).val();
                localStorage.setItem('articulo' + articulos[i]["cod_articulo"], JSON.stringify(artAux));

                if(indexLocal.length === 0){
                    indexLocal.push(articulos[i]["cod_articulo"]);
                }
                else {
                    let exist = false;
                    for(let x = 0; x < indexLocal.length; x++){
                        if(articulos[i]["cod_articulo"] === indexLocal[x]){
                            exist = true;
                        }
                    }
                    if(!exist){ indexLocal.push(articulos[i]["cod_articulo"]); }
                }
            }
        }

        localStorage.setItem('index', JSON.stringify(indexLocal));
    }

    updateLocalStorage(){
        this.iniIndex();
        for(let j = 0; j < indexLocal.length; j++){
            for(let i = 0; i < articulos.length; i++){
                if(articulos[i]["cod_articulo"] === indexLocal[j]){
                    let artAux = {};
                    artAux["cod_articulo"] = articulos[i]["cod_articulo"];
                    artAux["nombre"] = articulos[i]["nombre"];
                    artAux["descripcion"] = articulos[i]["descripcion"];
                    artAux["precio"] = articulos[i]["precio"];
                    artAux["descuento"] = articulos[i]["descuento"];
                    artAux["iva"] = articulos[i]["iva"];
                    artAux["cantidad"] = $('#cod_articulo-' + articulos[i]["cod_articulo"]).val();
                    localStorage.setItem('articulo' + articulos[i]["cod_articulo"], JSON.stringify(artAux));
                }
            }
        }
    }

    getLocalStorage(){
        this.iniIndex();
        let carrito = [];
        for(let i = 0; i < indexLocal.length; i++){
            carrito.push(JSON.parse(localStorage.getItem('articulo' + indexLocal[i])));
        }

        return carrito;
    }

    getTextErrorCantidades(errores){
        let errorText = "<strong>Los siguientes articulos tienen un formato de cantidades incorrectas</strong><br>";
        for(let i = 0; i < errores.length; i++){
            errorText += errores[i] + '<br>';
        }

        return errorText;
    }
}