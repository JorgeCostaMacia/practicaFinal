<?php

class AjaxCliente extends DependencyCRUD {
    private $connection;
    private $dataContent;
    private $itemsPage;
    private $offset;

    public function __construct($connection, $dataContent){
        $this->connection = $connection;
        $this->dataContent = $dataContent;
        $this->itemsPage = 10;

        if(isset($_POST["numPage"])){
            $this->offset = ($_POST["numPage"] - 1) * $this->itemsPage;
        }

        if($this->connection->connection instanceof DBError){
            $this->dataContent->setSuccess(false);
            $this->dataContent->addErrores($this->connection->connection);
            echo $this->dataContent->toJson();
            die();
        }
    }

    public function login(){
        $this->getUsuariosClienteCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE nick="' . trim($_POST["nick"]) . '" AND password="' . trim($_POST["password"]) . ' "AND estado="activo"');
    }

    public function updateUser(){
        $this->getUsuariosClienteCRUD()->update($this->connection, $this->dataContent);
    }

    public function searchArticulosActivos(){
        $this->getArticulosCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE estado="activo" AND ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function procesarArticulos(){
        $this->connection->startTransaction();

        $max_cod = $this->getPedidosCRUD()->selectMax($this->connection, $this->dataContent);
        if($this->dataContent->getSuccess()){
            $this->getPedidosCRUD()->insert($this->connection, $this->dataContent, $max_cod);
        }
        if($this->dataContent->getSuccess()){
            $values = $this->getLineasPedidosCRUD()->insert($this->connection, $this->dataContent, $max_cod);
        }
        if($this->dataContent->getSuccess()){
            $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $max_cod, "pedidos", "crear", trim($_POST['cod_cliente']), 'cliente');
        }
        if($this->dataContent->getSuccess()){
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $max_cod, $values, 'lineas_pedidos', 'crear', trim($_POST['cod_cliente']), 'cliente');
        }
        $this->connection->endTransaction($this->dataContent->getSuccess());
    }

    public function searchPedidos(){
        $this->getPedidosCRUD()->select($this->connection, $this->dataContent, 'pedidos.cod_pedido, pedidos.cod_cliente, pedidos.fecha, pedidos.estado, COUNT(cod_linea) as lineas, usuarios_cliente.nombre_completo as nombre_cliente', 'INNER JOIN lineas_pedidos ON pedidos.cod_pedido = lineas_pedidos.cod_pedido INNER JOIN usuarios_cliente ON pedidos.cod_cliente = usuarios_cliente.cod_cliente WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"' . ' AND pedidos.cod_cliente="' . $_POST["cod_cliente"] . '" GROUP BY cod_pedido LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function searchLineasPedidos(){
        $this->getLineasPedidosCRUD()->select($this->connection, $this->dataContent, 'cod_linea, cod_pedido, lineas_pedidos.cod_articulo, nombre as nombre_articulo, lineas_pedidos.precio, cantidad, lineas_pedidos.iva, total, lineas_pedidos.estado','INNER JOIN articulos ON lineas_pedidos.cod_articulo = articulos.cod_articulo WHERE cod_pedido="' . $_POST["cod_pedido"] . '" GROUP BY cod_linea');
    }

    public function updateLineasPedidos(){
        $this->connection->startTransaction();

        $values = $this->getLineasPedidosCRUD()->delete($this->connection, $this->dataContent);
        if($this->dataContent->getSuccess() && count($values[0]) > 0){
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_pedido"], $values, 'lineas_pedidos', 'borrar', trim($_POST['cod_cliente']), 'cliente');
        }
        if($this->dataContent->getSuccess()){
            $values = $this->getLineasPedidosCRUD()->updateCantidad($this->connection, $this->dataContent);
        }
        if($this->dataContent->getSuccess() && count($values[0]) > 0){
            $this->getActividadCRUD()->prepareLineas($this->connection, $this->dataContent, $_POST["cod_pedido"], $values, 'lineas_pedidos', 'cambiar', trim($_POST['cod_cliente']), 'cliente');
        }
        if($this->dataContent->getSuccess()) {
            $this->getLineasPedidosCRUD()->select($this->connection, $this->dataContent, '*', 'WHERE cod_pedido=' . $_POST["cod_pedido"]);
            if (count($this->dataContent->getLineasPedidos()) === 0 && $this->dataContent->getSuccess()) {
                $this->getPedidosCRUD()->delete($this->connection, $this->dataContent, " cod_pedido=" . $_POST["cod_pedido"]);
                if ($this->dataContent->getSuccess()) {
                    $this->getActividadCRUD()->insert($this->connection, $this->dataContent, $_POST["cod_pedido"], "pedidos", "borrar", trim($_POST['cod_cliente']), 'cliente');
                }
            }
        }

        $this->connection->endTransaction($this->dataContent->getSuccess());
    }

    public function searchAlbaranes(){
        $this->getAlbaranesCRUD()->select($this->connection, $this->dataContent, 'albaranes.cod_albaran, albaranes.cod_pedido, albaranes.cod_cliente, albaranes.fecha, albaranes.estado, COUNT(cod_linea) as lineas, usuarios_cliente.nombre_completo as nombre_cliente', 'INNER JOIN lineas_albaranes ON albaranes.cod_albaran = lineas_albaranes.cod_albaran INNER JOIN usuarios_cliente ON albaranes.cod_cliente = usuarios_cliente.cod_cliente WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"' . ' AND albaranes.cod_cliente="' . $_POST["cod_cliente"] . '" GROUP BY cod_albaran LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function searchLineasAlbaranes(){
        $this->getLineasAlbaranesCRUD()->select($this->connection, $this->dataContent, 'cod_linea, cod_albaran, lineas_albaranes.cod_articulo, nombre as nombre_articulo, lineas_albaranes.precio, cantidad, lineas_albaranes.descuento, lineas_albaranes.iva, total, lineas_albaranes.estado','INNER JOIN articulos ON lineas_albaranes.cod_articulo = articulos.cod_articulo WHERE cod_albaran="' . $_POST["cod_albaran"] . '" GROUP BY cod_linea');
    }

    public function searchCliente(){
        $this->getUsuariosClienteCRUD()->select($this->connection, $this->dataContent, '*','WHERE cod_cliente=' . $_POST["cod_cliente"]);
    }

    public function searchFacturas(){
        $this->getFacturasCRUD()->select($this->connection, $this->dataContent, 'facturas.cod_factura, facturas.cod_albaran, facturas.cod_cliente, facturas.fecha, facturas.descuento, facturas.estado, COUNT(cod_linea) as lineas, usuarios_cliente.nombre_completo as nombre_cliente', 'INNER JOIN lineas_facturas ON facturas.cod_factura = lineas_facturas.cod_factura INNER JOIN usuarios_cliente ON facturas.cod_cliente = usuarios_cliente.cod_cliente WHERE ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"' . ' AND facturas.cod_cliente="' . $_POST["cod_cliente"] . '" GROUP BY cod_factura LIMIT ' . $this->offset . ',' . $this->itemsPage);
    }

    public function searchLineasFacturas(){
        $this->getLineasFacturasCRUD()->select($this->connection, $this->dataContent, 'cod_linea, cod_factura, lineas_facturas.cod_articulo, nombre as nombre_articulo, lineas_facturas.precio, cantidad, lineas_facturas.descuento, lineas_facturas.iva, total, lineas_facturas.estado','INNER JOIN articulos ON lineas_facturas.cod_articulo = articulos.cod_articulo WHERE cod_factura="' . $_POST["cod_factura"] . '" GROUP BY cod_linea');
    }
}