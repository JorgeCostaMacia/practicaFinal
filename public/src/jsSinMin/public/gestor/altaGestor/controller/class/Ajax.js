"use strict";

class Ajax{
    callController(parameter, callBackFunction){
        $.ajax({
            url: '../ajax/',
            type:"POST",
            data: parameter,
            dataType: 'json',
            success: function(callBackData){ eval(callBackFunction + '(callBackData)'); },
            error: function (a,typeError,textError){
                let error0 = '{"errMessage": "Se ha producido un error en la conexion", "errCodeException": "", "errMessageException": "" }';
                let error1 = '{"errMessage": "Se ha producido un error en la conexion", "errCodeException":"' + typeError + '", "errMessageException":"' + textError + '"}';
                eval(callBackFunction + '({"succes": false, "errores": [' + error0 + ',' + error1 + ']})');
            }
        });
    }
}
