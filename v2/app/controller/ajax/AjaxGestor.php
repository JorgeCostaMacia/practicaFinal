<?php

class AjaxGestor extends DependencyCRUD{
    private $connection;
    private $dataContent;
    private $itemsPage;
    private $offset;

    public function __construct($connection, $dataContent){
        $this->connection = $connection;
        $this->dataContent = $dataContent;
        $this->itemsPage = 10;

        if (isset($_POST["numPage"])) {
            $this->offset = ($_POST["numPage"] - 1) * $this->itemsPage;
        }

        if ($this->connection->connection instanceof DBError) {
            $this->dataContent->setSuccess(false);
            $this->dataContent->addErrores($this->connection->connection);
            echo $this->dataContent->toJson();
            die();
        }
    }

    public function login(){
        $this->getUsuariosGestionCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE nick="' . $_POST["nick"] . '" AND password="' . $_POST["password"] . '" AND estado="activo"');
    }

    public function acceso(){
        $this->getUsuariosGestionCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE nick="' . $_POST["nick"] . '" AND password="' . $_POST["password"] . '"');
        $this->getAccesosCRUD()->insert($this->connection, $this->dataContent);
    }

    public function updateUser(){
        $this->getUsuariosGestionCRUD()->update($this->connection, $this->dataContent);
    }

    public function searchSolicitudes(){
        $this->getSolicitudesCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"');
    }

    public function aceptarSolicitud(){
        $this->connection->startTransaction();

        $this->getSolicitudesCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE cod_solicitud=' . $_POST["cod_solicitud"]);
        if ($this->dataContent->getSuccess()) {
            $this->getSolicitudesCRUD()->delete($this->connection, $this->dataContent, 'cod_solicitud=' . $_POST["cod_solicitud"]);
        }
        if ($this->dataContent->getSuccess()) {
            $this->getUsuariosClienteCRUD()->insert($this->connection, $this->dataContent, $this->dataContent->getSolicitudes()[0]->getCifDni(), $this->dataContent->getSolicitudes()[0]->getNombreCompleto(), $this->dataContent->getSolicitudes()[0]->getRazonSocial(), $this->dataContent->getSolicitudes()[0]->getDomicilioSocial(), $this->dataContent->getSolicitudes()[0]->getCiudad(), $this->dataContent->getSolicitudes()[0]->getEmail(), $this->dataContent->getSolicitudes()[0]->getTelefono(), $this->dataContent->getSolicitudes()[0]->getNick(), $this->dataContent->getSolicitudes()[0]->getPassword());
        }

        $this->connection->endTransaction($this->dataContent->getSuccess());
    }

    public function cancelarSolicitud(){
        $this->getSolicitudesCRUD()->delete($this->connection, $this->dataContent, 'cod_solicitud=' . $_POST["cod_solicitud"]);
    }

    public function searchClientes(){
        $this->getUsuariosClienteCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function updateCliente(){
        $this->getUsuariosClienteCRUD()->update($this->connection, $this->dataContent);
    }

    public function searchGestores(){
        $this->getUsuariosGestionCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function updateGestor(){
        $this->getUsuariosGestionCRUD()->update($this->connection, $this->dataContent);
    }

    public function searchArticulos(){
        $this->getArticulosCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function updateArticulo(){
        $this->getArticulosCRUD()->update($this->connection, $this->dataContent);
    }

    public function altaArticulo(){
        $this->getArticulosCRUD()->insert($this->connection, $this->dataContent, trim($_POST["nombre"]), trim($_POST["descripcion"]), $_POST["precio"], $_POST["descuento"], $_POST["iva"]);
    }

    public function altaCliente(){
        $this->getSolicitudesCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');
        if ($this->dataContent->getSuccess()) {
            $this->getUsuariosClienteCRUD()->select($this->connection, $this->dataContent, 'nick, cif_dni', 'WHERE nick="' . trim($_POST["nick"]) . '" OR cif_dni="' . strtoupper(trim($_POST['cif_dni'])) . '"');
        }
        if ($this->dataContent->getSuccess()) {
            if (count($this->dataContent->getUsuariosCliente()) === 0 && count($this->dataContent->getSolicitudes()) === 0) {
                $this->getUsuariosClienteCRUD()->insert($this->connection, $this->dataContent, trim(strtoupper($_POST["cif_dni"])), trim($_POST["nombre_completo"]), trim($_POST["razon_social"]), trim($_POST["domicilio_social"]), trim($_POST["ciudad"]), trim($_POST["email"]), trim($_POST["telefono"]), trim($_POST["nick"]), trim($_POST["password"]));
            }
        }
    }

    public function altaGestor(){
        $this->getUsuariosGestionCRUD()->select($this->connection, $this->dataContent, 'nick', 'WHERE nick="' . trim($_POST["nick"]) . '"');
        if ($this->dataContent->getSuccess()) {
            if (count($this->dataContent->getUsuariosGestion()) === 0) {
                $this->getUsuariosGestionCRUD()->insert($this->connection, $this->dataContent, trim($_POST["nombre_completo"]), trim($_POST["nick"]), trim($_POST["password"]));
            }
        }
    }

    public function searchAccesos(){
        $this->getAccesosCRUD()->select($this->connection, $this->dataContent, 'accesos.cod_acceso, accesos.cod_gestor, accesos.fecha_hora_acceso,accesos.fecha_hora_salida, usuarios_gestion.nombre_completo as nombre_gestor  ', 'INNER JOIN usuarios_gestion ON accesos.cod_gestor = usuarios_gestion.cod_gestor WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function searchActividad(){
        $this->getActividadCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function getClientes(){
        $this->getUsuariosClienteCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE estado="activo"');
    }

    public function searchArticulosActivos(){
        $this->getArticulosCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE estado="activo" AND ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function procesarArticulos(){
        $this->connection->startTransaction();

        $max_cod = $this->getPedidosCRUD()->selectMax($this->connection, $this->dataContent);
        if ($this->dataContent->getSuccess()) {
            $this->getPedidosCRUD()->insert($this->connection, $this->dataContent, $max_cod);
        }
        if ($this->dataContent->getSuccess()) {
            $values = $this->getLineasPedidosCRUD()->insert($this->connection, $this->dataContent, $max_cod);
        }
        if ($this->dataContent->getSuccess()) {
            $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $max_cod, "pedidos", "crear", trim($_POST['cod_gestor']), 'gestor');
        }
        if ($this->dataContent->getSuccess()) {
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $max_cod, $values, 'lineas_pedidos', 'crear', trim($_POST['cod_gestor']), 'gestor');
        }

        $this->connection->endTransaction($this->dataContent->getSuccess());
    }

    public function searchPedidos(){
        $this->getPedidosCRUD()->select($this->connection, $this->dataContent, 'pedidos.cod_pedido, pedidos.cod_cliente, pedidos.fecha, pedidos.estado, COUNT(cod_linea) as lineas, usuarios_cliente.nombre_completo as nombre_cliente', 'INNER JOIN lineas_pedidos ON pedidos.cod_pedido = lineas_pedidos.cod_pedido INNER JOIN usuarios_cliente ON pedidos.cod_cliente = usuarios_cliente.cod_cliente WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" GROUP BY cod_pedido LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function searchLineasPedidos(){
        $this->getLineasPedidosCRUD()->select($this->connection, $this->dataContent, 'cod_linea, cod_pedido, lineas_pedidos.cod_articulo, nombre as nombre_articulo, lineas_pedidos.precio, cantidad, lineas_pedidos.iva, total, lineas_pedidos.estado', 'INNER JOIN articulos ON lineas_pedidos.cod_articulo = articulos.cod_articulo WHERE cod_pedido="' . $_POST["cod_pedido"] . '" GROUP BY cod_linea, cod_pedido');
    }

    public function updateLineasPedidos(){
        $this->connection->startTransaction();

        $values = $this->getLineasPedidosCRUD()->delete($this->connection, $this->dataContent);
        if ($this->dataContent->getSuccess() && count($values[0]) > 0) {
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_pedido"], $values, 'lineas_pedidos', 'borrar', trim($_POST['cod_gestor']), 'gestor');
        }
        if ($this->dataContent->getSuccess()) {
            $values = $this->getLineasPedidosCRUD()->updateCantidad($this->connection, $this->dataContent);
        }
        if ($this->dataContent->getSuccess() && count($values[0]) > 0) {
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_pedido"], $values, 'lineas_pedidos', 'cambiar', trim($_POST['cod_gestor']), 'gestor');
        }
        if ($this->dataContent->getSuccess()) {
            $this->getLineasPedidosCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE cod_pedido=' . $_POST["cod_pedido"]);
            if ($this->dataContent->getSuccess()) {
                if (count($this->dataContent->getLineasPedidos()) === 0) {
                    $this->getPedidosCRUD()->delete($this->connection, $this->dataContent, " cod_pedido=" . $_POST["cod_pedido"]);
                    if ($this->dataContent->getSuccess()) {
                        $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $_POST["cod_pedido"], "pedidos", "borrar", trim($_POST['cod_gestor']), 'gestor');
                    }
                }
            }
        }

        $this->connection->endTransaction($this->dataContent->getSuccess());
    }

    public function procesarLineasPedidos(){
        $this->connection->startTransaction();

        $values = $this->getLineasPedidosCRUD()->updateEstado($this->connection, $this->dataContent, "procesado");
        if ($this->dataContent->getSuccess() && count($values[0]) > 0) {
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_pedido"], $values, 'lineas_pedidos', 'procesar', trim($_POST['cod_gestor']), 'gestor');
            if ($this->dataContent->getSuccess()) {
                $max_cod = $this->getAlbaranesCRUD()->selectMax($this->connection, $this->dataContent);
            }
            if ($this->dataContent->getSuccess()) {
                $this->getAlbaranesCRUD()->insert($this->connection, $this->dataContent, $max_cod);
            }
            if ($this->dataContent->getSuccess()) {
                $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $max_cod, "albaranes", "crear", trim($_POST['cod_gestor']), 'gestor');
            }
            if ($this->dataContent->getSuccess()) {
                $values = $this->getLineasAlbaranesCRUD()->insert($this->connection, $this->dataContent, $max_cod);
            }
            if ($this->dataContent->getSuccess() && count($values[0]) > 0) {
                $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $max_cod, $values, 'lineas_albaranes', 'crear', trim($_POST['cod_gestor']), 'gestor');
            }
        }
        if ($this->dataContent->getSuccess()) {
            $this->getLineasPedidosCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE estado="pendiente" AND cod_pedido=' . $_POST["cod_pedido"]);
        }
        if ($this->dataContent->getSuccess() && count($this->dataContent->getLineasPedidos()) === 0) {
            $this->getPedidosCRUD()->update($this->connection, $this->dataContent, 'estado="procesado"');
            if ($this->dataContent->getSuccess()) {
                $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $_POST["cod_pedido"], "pedidos", "procesar", trim($_POST['cod_gestor']), 'gestor');
            }
        }

        $this->connection->endTransaction($this->dataContent->getSuccess());
    }

    public function searchAlbaranes(){
        $this->getAlbaranesCRUD()->select($this->connection, $this->dataContent, 'albaranes.cod_albaran, albaranes.cod_cliente, albaranes.fecha, albaranes.estado, COUNT(cod_linea) as lineas, usuarios_cliente.nombre_completo as nombre_cliente', 'INNER JOIN lineas_albaranes ON albaranes.cod_albaran = lineas_albaranes.cod_albaran INNER JOIN usuarios_cliente ON albaranes.cod_cliente = usuarios_cliente.cod_cliente WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"' . ' GROUP BY cod_albaran LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function searchAlbaranesCarrito(){
        $where = 'albaranes.estado="pendiente" AND (albaranes.cod_albaran="asdfasdf" ';
        foreach($_POST as $key=>$value){
            if(strpos($key, "albaran") !== false){
                $where .= ' OR albaranes.cod_albaran=' . explode("-", $key)[1];
            }
        }
        $where .= ')';

        $this->getAlbaranesCRUD()->select($this->connection, $this->dataContent, 'albaranes.cod_albaran, albaranes.cod_cliente, albaranes.fecha, albaranes.estado, COUNT(cod_linea) as lineas, usuarios_cliente.nombre_completo as nombre_cliente', 'INNER JOIN lineas_albaranes ON albaranes.cod_albaran = lineas_albaranes.cod_albaran INNER JOIN usuarios_cliente ON albaranes.cod_cliente = usuarios_cliente.cod_cliente WHERE ' .  $where . ' GROUP BY cod_albaran');
    }

    public function searchLineasAlbaranes(){
        $this->getLineasAlbaranesCRUD()->select($this->connection, $this->dataContent, 'cod_linea, cod_albaran, cod_pedido, lineas_albaranes.cod_articulo, nombre as nombre_articulo, lineas_albaranes.precio, cantidad, lineas_albaranes.descuento, lineas_albaranes.iva, total, lineas_albaranes.estado', 'INNER JOIN articulos ON lineas_albaranes.cod_articulo = articulos.cod_articulo WHERE cod_albaran="' . $_POST["cod_albaran"] . '" GROUP BY cod_linea, cod_albaran, cod_pedido');
    }

    public function searchCliente(){
        $this->getUsuariosClienteCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE cod_cliente=' . $_POST["cod_cliente"]);
    }

    public function updateAlbaran(){
        $this->connection->startTransaction();

        $values = $this->getLineasAlbaranesCRUD()->update($this->connection, $this->dataContent);
        if ($this->dataContent->getSuccess() && count($values[0]) > 0) {
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_albaran"], $values, "lineas_albaranes", "cambiar", $_POST["cod_gestor"], "gestor");
        }
        if ($this->dataContent->getSuccess()) {
            $values = $this->getLineasAlbaranesCRUD()->delete($this->connection, $this->dataContent);
        }
        if ($this->dataContent->getSuccess() && count($values[0]) > 0) {
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_albaran"], $values, "lineas_albaranes", "borrar", $_POST["cod_gestor"], "gestor");
            if ($this->dataContent->getSuccess()) {
                $this->getLineasPedidosCRUD()->updateEstadoAlbaran($this->connection, $this->dataContent, 'pendiente', $values);
            }
            if ($this->dataContent->getSuccess()) {
                $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_pedido"], $values, "lineas_pedidos", "pendiente", $_POST["cod_gestor"], "gestor");
            }
            if ($this->dataContent->getSuccess()) {
                $this->getPedidosCRUD()->update($this->connection, $this->dataContent, 'estado="pendiente"');
            }
            if ($this->dataContent->getSuccess()) {
                $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $_POST["cod_pedido"], "pedidos", "pendiente", trim($_POST['cod_gestor']), 'gestor');
            }
        }
        if ($this->dataContent->getSuccess()) {
            $this->getLineasAlbaranesCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE cod_albaran=' . $_POST["cod_albaran"]);
        }
        if ($this->dataContent->getSuccess()) {
            if (count($this->dataContent->getLineasAlbaranes()) === 0) {
                $this->getAlbaranesCRUD()->delete($this->connection, $this->dataContent, 'cod_albaran=' . $_POST["cod_albaran"]);
                if ($this->dataContent->getSuccess()) {
                    $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $_POST["cod_albaran"], "albaranes", "borrar", trim($_POST['cod_gestor']), 'gestor');
                }

            }
        }

        $this->connection->endTransaction($this->dataContent->getSuccess());
    }

    public function procesarAlbaran(){
        $this->connection->startTransaction();

        $valuesAlbaranes = $this->getLineasAlbaranesCRUD()->updateEstado($this->connection, $this->dataContent, "procesado");
        if ($this->dataContent->getSuccess() && count($valuesAlbaranes[0]) > 0) {
            $where = 'WHERE ';
            foreach($_POST as $key=>$post){
                if(strpos($key, "albaran-") !== false) {
                    $where .= 'cod_albaran=' . explode("-", $key)[1] . ' OR ';
                }
            }
            $where .= 'cod_albaran="fin"';

            $this->getLineasAlbaranesCRUD()->select($this->connection, $this->dataContent, '*', $where);
            if ($this->dataContent->getSuccess() && count($this->dataContent->getLineasAlbaranes()) > 0) {
                $values = [];
                $values[] = [];
                foreach($this->dataContent->getLineasAlbaranes() as $key=>$linea){
                    $values[$key]["cod_linea"] = $linea->getCodLinea() . ' - ' . $linea->getCodPedido();
                    $values[$key]["cod_tabla"] = $linea->getCodAlbaran();
                }

                $this->getActividadCRUD()->prepareLineasGrupo($this->connection, $this->dataContent, $values, 'lineas_albaranes', 'procesar', trim($_POST['cod_gestor']), 'gestor');
                if ($this->dataContent->getSuccess()) {
                    $this->getAlbaranesCRUD()->updateEstado($this->connection, $this->dataContent, 'procesado');
                }
                if ($this->dataContent->getSuccess()) {
                    $this->getActividadCRUD()->prepareTabla($this->connection, $this->dataContent, $valuesAlbaranes, 'albaranes', 'procesar', trim($_POST['cod_gestor']), 'gestor');
                }
                if ($this->dataContent->getSuccess()) {
                    $this->getAlbaranesCRUD()->select($this->connection, $this->dataContent, '*', $where);
                }
                if ($this->dataContent->getSuccess()) {
                    $usuarios = [];
                    foreach($this->dataContent->getAlbaranes() as $albaran){
                        if (!in_array($albaran->getCodCliente(), $usuarios)){
                            $usuarios[] = $albaran->getCodCliente();
                        }
                    }
                }
                if ($this->dataContent->getSuccess()) {
                    $max_cod = $this->getFacturasCRUD()->selectMax($this->connection, $this->dataContent);
                }
                if ($this->dataContent->getSuccess() && count($usuarios) > 0) {
                    $valuesFacturas = $this->getFacturasCRUD()->insert($this->connection, $this->dataContent, $max_cod, $usuarios);
                }
                if ($this->dataContent->getSuccess()) {
                    $this->getActividadCRUD()->prepareTabla($this->connection, $this->dataContent, $valuesFacturas, 'facturas', 'crear', trim($_POST['cod_gestor']), 'gestor');
                }
                if ($this->dataContent->getSuccess()) {
                    $valuesFactura = $this->getLineasFacturasCRUD()->insert($this->connection, $this->dataContent, $valuesFacturas);
                }
                if ($this->dataContent->getSuccess() && count($valuesFactura[0]) > 0) {
                    $values = [];
                    $values[] = [];
                    foreach($valuesFactura as $key=>$linFactura){
                        $values[$key]["cod_linea"] = $linFactura["cod_linea"] . ' - ' . $linFactura["cod_albaran"];
                        $values[$key]["cod_tabla"] = $linFactura["cod_factura"];
                    }
                    $this->getActividadCRUD()->prepareLineasGrupo($this->connection, $this->dataContent, $values, 'lineas_facturas', 'crear', trim($_POST['cod_gestor']), 'gestor');
                }
            }
        }

        $this->connection->endTransaction($this->dataContent->getSuccess());

        $this->dataContent->setAlbaranes(array());
        $this->dataContent->setLineasAlbaranes(array());
    }

    public function searchFacturas(){
        $this->getFacturasCRUD()->select($this->connection, $this->dataContent, 'facturas.cod_factura, facturas.cod_cliente, facturas.fecha, facturas.descuento, facturas.estado, COUNT(cod_linea) as lineas, usuarios_cliente.nombre_completo as nombre_cliente', 'INNER JOIN lineas_facturas ON facturas.cod_factura = lineas_facturas.cod_factura INNER JOIN usuarios_cliente ON facturas.cod_cliente = usuarios_cliente.cod_cliente WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"' . ' GROUP BY cod_factura LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function searchLineasFacturas(){
        $this->getLineasFacturasCRUD()->select($this->connection, $this->dataContent, 'cod_linea, cod_factura, cod_albaran, lineas_facturas.cod_articulo, nombre as nombre_articulo, lineas_facturas.precio, cantidad, lineas_facturas.descuento, lineas_facturas.iva, total, lineas_facturas.estado', 'INNER JOIN articulos ON lineas_facturas.cod_articulo = articulos.cod_articulo WHERE cod_factura="' . $_POST["cod_factura"] . '" GROUP BY cod_linea, cod_factura, cod_albaran');
    }

    public function updateFactura(){
        $this->connection->startTransaction();

        if (isset($_POST["borrar"])) {
            $this->getLineasFacturasCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE cod_factura=' . $_POST["cod_factura"]);

            if ($this->dataContent->getSuccess() && count($this->dataContent->getLineasFacturas()) > 0) {
                $this->getLineasFacturasCRUD()->delete($this->connection, $this->dataContent);

                if ($this->dataContent->getSuccess()) {
                    $values = [];
                    $values[] = [];
                    foreach ($this->dataContent->getLineasFacturas() as $key => $linea) {
                        $values[$key]["cod_linea"] = $linea->getCodLinea() . ' - ' . $linea->getCodAlbaran();
                    }
                    $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_factura"], $values, "lineas_facturas", "borrar", $_POST["cod_gestor"], "gestor");
                }
                if ($this->dataContent->getSuccess() && count($values) > 0) {
                    $values = [];
                    $values[] = [];
                    foreach ($this->dataContent->getLineasFacturas() as $key => $linea) {
                        $values[$key]["cod_linea"] = $linea->getCodLinea();
                        $values[$key]["cod_albaran"] = $linea->getCodAlbaran();
                    }
                    $this->getLineasAlbaranesCRUD()->updateEstadoFacturas($this->connection, $this->dataContent, "pendiente", $values);
                }
                if ($this->dataContent->getSuccess() && count($values[0]) > 0) {
                    $where = 'WHERE cod_albaran="asdfasd"';
                    foreach ($this->dataContent->getLineasFacturas() as $key => $linea) {
                        $where .= ' OR (cod_linea=' . $linea->getCodLinea();
                        $where .= ' AND cod_albaran=' . $linea->getCodAlbaran() . ')';
                    }

                    $this->getLineasAlbaranesCRUD()->select($this->connection, $this->dataContent, '*', $where);
                    if ($this->dataContent->getSuccess()) {
                        $values = [];
                        $values[] = [];
                        foreach ($this->dataContent->getLineasAlbaranes() as $key => $linea) {
                            $values[$key]["cod_linea"] = $linea->getCodLinea() . ' - ' . $linea->getCodPedido();
                            $values[$key]["cod_tabla"] = $linea->getCodAlbaran();
                        }
                        $this->getActividadCRUD()->prepareLineasGrupo($this->connection, $this->dataContent,  $values, 'lineas_albaranes', 'pendiente', trim($_POST['cod_gestor']), 'gestor');
                    }
                }
                if ($this->dataContent->getSuccess()) {
                    $this->getFacturasCRUD()->delete($this->connection, $this->dataContent);
                }
                if ($this->dataContent->getSuccess()) {
                    $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $_POST["cod_factura"], "facturas", "borrar", trim($_POST['cod_gestor']), 'gestor');
                }
                if ($this->dataContent->getSuccess()) {
                    $values = $this->getAlbaranesCRUD()->updateEstadoFactura($this->connection, $this->dataContent, 'pendiente', $values);
                }
                if ($this->dataContent->getSuccess()) {
                    $aux = [];
                    $values2 = [];
                    $values2[] = [];
                    $index = 0;
                    foreach($values as $val){
                        if (!in_array($val["cod_albaran"], $aux)){
                            $aux[] = $val["cod_albaran"];
                            $values2[$index]["cod_albaran"] = $val["cod_albaran"];
                            $index++;
                        }
                    }

                    $this->getActividadCRUD()->prepareTabla($this->connection, $this->dataContent, $values2,"albaranes", "pendiente", trim($_POST['cod_gestor']), 'gestor');
                }
            }
        }
        else {
            $this->getFacturasCRUD()->update($this->connection, $this->dataContent, 'descuento=' . $_POST["descuento"]);
            if ($this->dataContent->getSuccess()) {
                $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $_POST["cod_factura"], "facturas", "cambiar", trim($_POST['cod_gestor']), 'gestor');
            }
        }

        $this->connection->endTransaction($this->dataContent->getSuccess());
    }
    public function procesarFactura(){
       $this->connection->startTransaction();

        if($_POST["estado"] === "procesado"){$estadoAux = "procesar";}
        else {$estadoAux = "pendiente";}

        $this->getFacturasCRUD()->update($this->connection, $this->dataContent, 'estado="' . $_POST["estado"] . '"');
        if ($this->dataContent->getSuccess()) {
            $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $_POST["cod_factura"], "facturas", $estadoAux, trim($_POST['cod_gestor']), 'gestor');
        }
        if ($this->dataContent->getSuccess()) {
            $this->getLineasFacturasCRUD()->update($this->connection, $this->dataContent, 'estado="' . $_POST["estado"] . '"');
        }
        if ($this->dataContent->getSuccess()) {
            $this->getLineasFacturasCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE cod_factura=' . $_POST["cod_factura"]);
        }
        if ($this->dataContent->getSuccess()) {
            $values = [];
            $values[] = [];
            $linFact = $this->dataContent->getLineasFacturas();
            foreach ($linFact as $key => $linea) {
                $values[$key]["cod_linea"] = $linea->getCodLinea() . ' - ' . $linea->getCodAlbaran() ;
            }
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_factura"], $values, "lineas_facturas", $estadoAux, $_POST["cod_gestor"], "gestor");
        }

        $this->connection->endTransaction($this->dataContent->getSuccess());
    }
}