<?php

class AjaxCliente{
    private $connection;
    private $dataContent;
    private $itemsPage;
    private $offset;

    public function __construct($connection, $dataContent){
        $this->connection = $connection;
        $this->dataContent = $dataContent;
        $this->itemsPage = 10;

        if(isset($_POST["numPage"])){
            $this->offest = ($_POST["numPage"] - 1) * $this->itemsPage;
        }

        if($this->connection->connection instanceof DBError){
            $this->dataContent->setSuccess(false);
            $this->dataContent->addErrores($this->connection->connection);
            echo $this->dataContent->toJson();
            die();
        }
    }

    public function login(){
        $crud = new Usuarios_clienteCRUD();
        $crud->select($this->connection, $this->dataContent, '*', 'WHERE nick="' . trim($_POST["nick"]) . '" AND password="' . trim($_POST["password"]) . ' "AND estado="activo"');
    }

    public function updateUser(){
        $crud = new Usuarios_clienteCRUD();
        $crud->update($this->connection, $this->dataContent);
    }

    public function searchArticulosActivos(){
        $crud = new ArticulosCRUD();
        $crud->select($this->connection, $this->dataContent, '*', 'WHERE estado="activo" AND ' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%" LIMIT ' . $this->offest . ',' . $this->itemsPage );
    }

    public function procesarArticulos(){
        $this->connection->startTransaction();

        $crud = new PedidosCRUD();
        $max_cod = $crud->selectMax($this->connection, $this->dataContent);
        if($this->dataContent->getSuccess()){
            $crud->insert($this->connection, $this->dataContent, $max_cod);
        }
        if($this->dataContent->getSuccess()){
            $crud = new Lineas_pedidosCRUD();
            $values = $crud->insert($this->connection, $this->dataContent, $max_cod);
        }
        if($this->dataContent->getSuccess()){
            $crud = new ActividadCRUD();
            $crud->insert($this->connection, $this->dataContent, $max_cod, "pedidos", "crear", trim($_POST['cod_cliente']), 'cliente');
        }
        if($this->dataContent->getSuccess()){
            $crud->prepareLineas($this->connection, $this->dataContent, $max_cod, $values, 'lineas_pedidos', 'crear', trim($_POST['cod_cliente']), 'cliente');
        }
        $this->connection->endTransaction($this->dataContent->getSuccess());
    }

    public function searchPedidos(){
        $crud = new PedidosCRUD();
        $crud->select($this->connection, $this->dataContent, 'pedidos.cod_pedido, pedidos.cod_cliente, pedidos.fecha, pedidos.estado, COUNT(cod_linea) as lineas, usuarios_cliente.nombre_completo as nombre_cliente', 'INNER JOIN lineas_pedidos ON pedidos.cod_pedido = lineas_pedidos.cod_pedido INNER JOIN usuarios_cliente ON pedidos.cod_cliente = usuarios_cliente.cod_cliente WHERE ' . 'pedidos.' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"' . ' AND pedidos.cod_cliente="' . $_POST["cod_cliente"] . '" GROUP BY cod_pedido LIMIT ' . $this->offest . ',' . $this->itemsPage);
    }

    public function searchLineasPedidos(){
        $crud = new Lineas_pedidosCRUD();
        $crud->select($this->connection, $this->dataContent, 'cod_linea, cod_pedido, lineas_pedidos.cod_articulo, nombre as nombre_articulo, lineas_pedidos.precio, cantidad, lineas_pedidos.iva, total, lineas_pedidos.estado','INNER JOIN articulos ON lineas_pedidos.cod_articulo = articulos.cod_articulo WHERE cod_pedido="' . $_POST["cod_pedido"] . '" GROUP BY cod_linea');
    }

    public function updateLineasPedidos(){
        $crud = new Lineas_pedidosCRUD();
        $values = $crud->delete($this->connection, $this->dataContent);
        if($this->dataContent->getSuccess() && count($values[0]) > 0){
            $crud = new ActividadCRUD();
            $crud->prepareLineas($this->connection, $this->dataContent, $_POST["cod_pedido"], $values, 'lineas_pedidos', 'borrar', trim($_POST['cod_cliente']), 'cliente');
        }
        $crud = new Lineas_pedidosCRUD();
        $values = $crud->update($this->connection, $this->dataContent);
        if($this->dataContent->getSuccess() && count($values[0]) > 0){
            $crud = new ActividadCRUD();
            $crud->prepareLineas($this->connection, $this->dataContent, $_POST["cod_pedido"], $values, 'lineas_pedidos', 'cambiar', trim($_POST['cod_cliente']), 'cliente');
        }

        $crud = new Lineas_pedidosCRUD();
        $crud->select($this->connection, $this->dataContent, '*', 'WHERE cod_pedido=' . $_POST["cod_pedido"]);
        if(count($this->dataContent->getLineasPedidos()) === 0){
            $crud = new PedidosCRUD();
            $crud->delete($this->connection, $this->dataContent, " cod_pedido=" . $_POST["cod_pedido"]);
            if($this->dataContent->getSuccess()) {
                $crud = new ActividadCRUD();
                $crud->insert($this->connection, $this->dataContent, $_POST["cod_pedido"], "pedidos", "borrar", trim($_POST['cod_cliente']), 'cliente');
            }
        }
    }
}