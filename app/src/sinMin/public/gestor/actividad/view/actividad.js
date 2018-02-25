"use strict";

function cleanTbody(){
    $('#tbody').empty();
}

function injectActividad(activi){
    let textActividad = "";


    for(let i = 0; i < activi.length; i++){
        textActividad += '<tr><td>' + activi[i]["cod_actividad"] + '</td>' +
            '<td>' + activi[i]["cod_usuario"] + ' - ' + activi[i]["tipo_usuario"] + '</td>' +
            '<td>' + activi[i]["cod_tabla"] + '</td>';
            if(activi[i]["cod_linea"] != null){
                textActividad += '<td>' + activi[i]["cod_linea"] + '</td>';
            }
            else { textActividad += '<td>vacio</td>';}
        textActividad += '<td>' + activi[i]["tabla"] + '</td>' +
            '<td>' + activi[i]["accion"] + '</td>' +
            '<td>' + actividadApp.formatDate(activi[i]["fecha"]) + '</td></tr>';
    }
    $('#tbody').append(textActividad);
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function enableDescarga(){$('#descarga').attr('disabled', false);}
function disableDescarga(){$('#descarga').attr('disabled', true);}


function showDescarga(event){
    let doc = new jsPDF('p', 'mm', [297, 210]);
    doc.setProperties({
        title: 'Actividad',
        subject: 'Listado actividad',
        author: 'Gestor',
        creator: 'Gestor'
    });

    let logo = new Image();
    logo.src = '../public/src/img/logo.jpg';
    doc.addImage(logo, 'JPG', 20, 20,30,10);
    doc.setFontSize(8);
    doc.text(150,20,"Imagen.SA");
    doc.text(150,24,"CIF: 85479060C");
    doc.text(150,28,"EMAIL: imagen@gmail.com");
    doc.text(150,32,"TELF: 897678768876");
    doc.text(150,36,"C/ imagen Elche Alicante");

    doc.setFontSize(15);
    doc.text(20,45,"Actividad");

    let columns = ["Codigo", "Usuario",  "Cod tabla", "Linea", "Tabla", "accion", "fecha"];
    let data = [];

    for(let i = 0; i < actividad.length; i++){
        let codLinea = "";
        if(actividad[i]["cod_linea"] != null){
            codLinea += actividad[i]["cod_linea"];
        }
        else { codLinea += "vacio";}
        let acti = [actividad[i]["cod_actividad"], actividad[i]["cod_usuario"] + ' - ' + actividad[i]["tipo_usuario"], actividad[i]["cod_tabla"], codLinea, actividad[i]["tabla"], actividad[i]["accion"], actividadApp.formatDate(actividad[i]["fecha"])];
        data.push(acti);
    }
    doc.autoTable(columns,data, {styles: {fontSize: 5, overflow: 'linebreak'}, margin:{ top: 50 }});

    doc.output('dataurlnewwindow');
    doc.save('actividad.pdf');
}