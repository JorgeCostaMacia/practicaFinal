"use strict";

function cleanTbody(){
    $('#tbody').empty();
}
function restoreAlbaranes(){
    $('#tableLineas').empty();
    $('#tableAlbaranes').attr('hidden', false);
}

function cleanLineas(){
    $('#tableLineas').empty();
}
function injectAlbaranes(albaranes){
    for(let i = 0; i < albaranes.length; i++){
        $('#tbody').append(
            '<tr><td>' + albaranes[i]["cod_albaran"] + '</td>' +
            '<td>' + albaranes[i]["cod_pedido"] + '</td>' +
            '<td>' + albaranes[i]["cod_cliente"] + ' - ' + albaranes[i]["nombre_cliente"] + '</td>' +
            '<td>' + albaranesApp.formatDate(albaranes[i]["fecha"]) + '</td>' +
            '<td>' + albaranes[i]["estado"] + '</td>' +
            '<td><input type="button" id="cod_albaran-' + albaranes[i]["cod_albaran"] + '" value="' + albaranes[i]["lineas"] + '" class="form-control btn-primary"></td></tr>'
        );
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function injectLineas(lineas){
    let tableLineas = '<form id="formLineas" name="formLineas">' +
        '<h2>Albaran ' + lineas[0]["cod_albaran"] +'</h2>' +
        '<div class="table-responsive">' +
        '<table class="table table-hover">' +
        '<thead>' +
        '<tr>' +
        '<th>Linea</th>' +
        '<th>Articulo</th>' +
        '<th>Precio</th>' +
        '<th>Descuento</th>' +
        '<th>Iva</th>' +
        '<th>Total</th>' +
        '<th>Estado</th>' +
        '<th>Cantidad</th>' +
        '</tr>' +
        '</thead>' +
        '<tbody>';
    for(let i = 0; i < lineas.length; i++){
        tableLineas +=
            '<tr><td>' + lineas[i]["cod_linea"] + '</td>' +
            '<td>' + lineas[i]["cod_articulo"] + ' - ' + lineas[i]["nombre_articulo"] + '</td>' +
            '<td>' + lineas[i]["precio"] + '</td>' +
            '<td>' + lineas[i]["descuento"].replace(".", ",") + '</td>' +
            '<td>' + lineas[i]["iva"].replace(".", ",") + '</td>' +
            '<td>' + lineas[i]["total"].replace(".", ",") + '</td>' +
            '<td>' + lineas[i]["estado"] + '</td>' +
            '<td><input type="number" value="' + lineas[i]["cantidad"] + '" class="cantidades form-control" disabled></td></tr>';

    }

    tableLineas += '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button type="button" id="descarga" name="descarga" class="form-control btn-warning" value=""><span class="glyphicon glyphicon-download" aria-hidden="true"></span> PDF</button></td></tr>';
    tableLineas += '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button type="button" id="buttonVolver" name="buttonVolver" class="form-control btn-primary">Volver albaranes</button></td></tr>';
    tableLineas += '</tbody></table></div></form>';

    $('#tableAlbaranes').attr('hidden', true);
    $('#tableLineas').append(tableLineas);
}


function showDescarga(cliente, albaran){
    let doc = new jsPDF('p', 'mm', [297, 210]);
    let total = 0;

    doc.setProperties({
        title: 'Albaranes',
        subject: 'Listado albaranes',
        author: 'Cliente',
        creator: 'Cliente'
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

    doc.text(20,45, cliente["nombre_completo"]);
    doc.text(20,49,'CIF / DNI : ' + cliente["cif_dni"]);
    doc.text(20,53,'Razon social: ' +  cliente["razon_social"]);
    doc.text(20,57,'Domicilio social: ' + cliente["domicilio_social"]);
    doc.text(20,61,'Ciudad: ' + cliente["ciudad"]);

    doc.setFontSize(15);
    doc.text(150,45,"Albaran");
    doc.setFontSize(8);
    doc.text(150,50,'Codigo albaran: ' + albaran["cod_albaran"]);
    doc.text(150,54,'Codigo pedido : ' + albaran["cod_pedido"]);
    doc.text(150,58,'Cod cliente: ' +  albaran["cod_cliente"]);
    doc.text(150,62,'Fecha: ' + albaranesApp.formatDate(albaran["fecha"]));
    doc.text(150,66,'Estado: ' + albaran["estado"]);

    let columns = ["Codigo", "Articulo", "Precio", "Cantidad", "Descuento", "Iva", "Total", "Estado"];
    let data = [];

    for(let i = 0; i < lineasAlbaranes.length; i++){
        let acceso = [lineasAlbaranes[i]["cod_linea"], lineasAlbaranes[i]["cod_articulo"] + ' - ' + lineasAlbaranes[i]["nombre_articulo"], lineasAlbaranes[i]["precio"].replace(".", ","), lineasAlbaranes[i]["cantidad"], lineasAlbaranes[i]["descuento"].replace(".", ","), lineasAlbaranes[i]["iva"].replace(".", ","), lineasAlbaranes[i]["total"].replace(".", ","), lineasAlbaranes[i]["estado"]];
        total += 1 * lineasAlbaranes[i]["total"];
        data.push(acceso);
    }
    doc.autoTable(columns,data, {styles: {fontSize: 5, overflow: 'linebreak'}, margin:{ top: 81 }});

    doc.setFontSize(8);
    doc.text(20,70, albaranesApp.getDate() + ' Elche');
    doc.setFontType("bold");
    doc.text(20,74,('Total: ' +  total + "€").replace(".", ","));

    doc.output('dataurlnewwindow');
    doc.save("albaran.pdf");
}