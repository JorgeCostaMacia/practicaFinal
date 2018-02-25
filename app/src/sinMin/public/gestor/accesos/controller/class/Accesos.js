"use strict";

class Accesos{
    getParameterSearchAccesos(){
        return  'action=' + 'searchAccesos&' + $("#formSearch").serialize();
    }
    formatDate(date){
        if(date != null){
            let dateTime = date.split(" ");
            let format = dateTime[0].split("-");
            return format[2] + "-" + format[1] + "-" + format[0] + " " + dateTime[1];
        }
        else { return "vacio"; }
    }
}