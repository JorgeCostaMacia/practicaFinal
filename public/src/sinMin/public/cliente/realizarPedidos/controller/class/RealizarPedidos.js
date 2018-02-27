"use strict";

class RealizarPedidos{
    getParameterSearchArticulos(){
        return 'action=' + 'searchArticulosActivos&' + $("#formSearch").serialize();
    }

    getParameterProcesarArticulos(){
        let parameter = 'action=' + 'procesarArticulos&usuario=' + $('#usuario').val() + '&cod_cliente=' + $('#cod_cliente').val();
        for(let i = 0; i < articulos.length; i++){
            if($("#cod_articulo-" + articulos[i]["cod_articulo"]).val() !== "0"){
                parameter += '&cod_articulo-' + articulos[i]["cod_articulo"] + '=' + $('#cod_articulo-' + articulos[i]["cod_articulo"]).val();
            }
        }
        return parameter;
    }

    evalInputsCantidades(){
        let result = [];
        result['success'] = true;
        result['errores'] = [];
        result["empty"] = true;
        for(let i = 0; i < articulos.length; i++){
            if(!validateCantidad($('#cod_articulo-' + articulos[i]["cod_articulo"]).val())) {
                result['success'] = false;
                result['errores'].push(articulos[i]["cod_articulo"] + ' - ' + articulos[i]["nombre"]);
            }
            if($('#cod_articulo-' + articulos[i]["cod_articulo"]).val() !== "0"){ result["empty"] = false;}
        }

        return result;
    }

    addLocalStorage(){
        for(let i = 0; i < articulos.length; i++){
            if($("#cod_articulo-" + articulos[i]["cod_articulo"]).val() !== "0"){
                let artAux = {};
                artAux["cod_articulo"] = articulos[i]["cod_articulo"];
                artAux["nombre"] = articulos[i]["nombre"];
                artAux["descripcion"] = articulos[i]["descripcion"];
                artAux["precio"] = articulos[i]["precio"];
                artAux["descuento"] = articulos[i]["descuento"];
                artAux["iva"] = articulos[i]["iva"];
                artAux["cantidad"] = $('#cod_articulo-' + articulos[i]["cod_articulo"]).val();
                localStorage.setItem(articulos[i]["cod_articulo"], JSON.stringify(artAux));
            }
        }

    }

    getTextErrorCantidades(errores){
        let errorText = "<strong>Los siguientes articulos tienen un formato de cantidades incorrectas</strong><br>";
        for(let i = 0; i < errores.length; i++){
            errorText += errores[i];
        }

        return errorText;
    }
}