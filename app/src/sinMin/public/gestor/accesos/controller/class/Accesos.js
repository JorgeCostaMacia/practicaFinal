"use strict";

class Accesos{
    getParameterSearchAccesos(){
        return  'action=' + 'searchAccesos&' + $("#formSearch").serialize();
    }
}