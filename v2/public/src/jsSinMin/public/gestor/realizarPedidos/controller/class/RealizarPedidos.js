"use strict";

class RealizarPedidos{
    getParameterGetClientes(){
        return 'action=' + 'getClientes&' + $("#formSearch").serialize();
    }

    getParameterSearchArticulos(){
        return 'action=' + 'searchArticulosActivos&' + $("#formSearch").serialize();
    }

    getParameterProcesarArticulos(){
        let parameter = 'action=' + 'procesarArticulos&usuario=' + $('#usuario').val() + '&cod_gestor=' + $('#cod_gestor').val() + '&cod_cliente=' + $('#cod_cliente').val();
        for(let i = 0; i < indexLocal.length; i++){
            if($("#cod_articulo-" + indexLocal[i]).val() !== "0"){
                parameter += '&cod_articulo-' + indexLocal[i] + '=' + $('#cod_articulo-' + indexLocal[i]).val();
            }
        }
        return parameter;
    }

    iniIndex(){
        indexLocal = JSON.parse(localStorage.getItem("index"));

        if(indexLocal === "" || indexLocal === null){
            indexLocal = [];
        }
    }

    iniArticulosCarrito(){
        articulosCarrito = JSON.parse(localStorage.getItem('articulos'));

        if(articulosCarrito === "" || articulosCarrito === null){
            articulosCarrito = {};
        }
    }

    borrarArticulosCarrito(){
        articulosCarrito = {};
        indexLocal = [];
        localStorage.setItem('articulos', JSON.stringify(articulosCarrito));
        localStorage.setItem('index', JSON.stringify(indexLocal));
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
        this.iniArticulosCarrito();
        let result = [];
        result['success'] = true;
        result['errores'] = [];

        for(let i = 0; i < indexLocal.length; i++){
            if(!validateCantidad($('#cod_articulo-' + indexLocal[i]).val())) {
                result['success'] = false;
                result['errores'].push(indexLocal[i] + ' - ' + articulosCarrito["articulo" + indexLocal[i]]["nombre"]);
            }
        }

        return result;
    }

    evalInputsCantidadesProcesarCarrito(){
        this.iniIndex();
        this.iniArticulosCarrito();
        let result = [];
        result['success'] = true;
        result['errores'] = [];
        result["empty"] = true;

        for(let i = 0; i < indexLocal.length; i++){
            if(!validateCantidad($('#cod_articulo-' + indexLocal[i]).val())) {
                result['success'] = false;
                result['errores'].push(indexLocal[i] + ' - ' + articulosCarrito["articulo" + indexLocal[i]]["nombre"]);
            }
            if($('#cod_articulo-' + indexLocal[i]).val() !== "0"){ result["empty"] = false;}

        }

        return result;
    }

    addLocalStorage(){
        this.iniIndex();
        this.iniArticulosCarrito();

        for(let i = 0; i < articulos.length; i++){
            if($("#cod_articuloReal-" + articulos[i]["cod_articulo"]).val() !== "0"){
                articulosCarrito['articulo' + articulos[i]["cod_articulo"]] = {};
                articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["cod_articulo"] = articulos[i]["cod_articulo"];
                articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["nombre"] = articulos[i]["nombre"];
                articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["descripcion"] = articulos[i]["descripcion"];
                articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["precio"] = articulos[i]["precio"];
                articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["descuento"] = articulos[i]["descuento"];
                articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["iva"] = articulos[i]["iva"];
                articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["cantidad"] = $('#cod_articuloReal-' + articulos[i]["cod_articulo"]).val();

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
        localStorage.setItem('articulos', JSON.stringify(articulosCarrito));
        localStorage.setItem('index', JSON.stringify(indexLocal));
    }

    updateLocalStorage(){
        this.iniIndex();
        this.iniArticulosCarrito();
        for(let j = 0; j < indexLocal.length; j++){
            for(let i = 0; i < articulos.length; i++){
                if(articulos[i]["cod_articulo"] === indexLocal[j]){
                    articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["cod_articulo"] = articulos[i]["cod_articulo"];
                    articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["nombre"] = articulos[i]["nombre"];
                    articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["descripcion"] = articulos[i]["descripcion"];
                    articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["precio"] = articulos[i]["precio"];
                    articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["descuento"] = articulos[i]["descuento"];
                    articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["iva"] = articulos[i]["iva"];
                    articulosCarrito['articulo' + articulos[i]["cod_articulo"]]["cantidad"] = $('#cod_articulo-' + articulos[i]["cod_articulo"]).val();
                }
            }
        }

        localStorage.setItem('articulos', JSON.stringify(articulosCarrito));
    }

    getTextErrorCantidades(errores){
        let errorText = "<strong>Los siguientes articulos tienen un formato de cantidades incorrectas</strong><br>";
        for(let i = 0; i < errores.length; i++){
            errorText += errores[i];
        }

        return errorText;
    }
}