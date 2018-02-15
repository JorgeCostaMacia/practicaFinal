<?php

class SearchPedidosCliente {
    private $itemsPage;
    private $offset;

    public function __construct(){
        $this->itemsPage = 10;
        $this->offest = ($_POST["numPage"] - 1) * $this->itemsPage;
    }

    function selectPedidos($connection, $dataContent){
        $result = $connection->select('pedidos.cod_pedido, pedidos.cod_cliente, pedidos.fecha, pedidos.estado, COUNT(cod_linea) as lineas', 'pedidos', 'INNER JOIN lineas_pedidos ON pedidos.cod_pedido = lineas_pedidos.cod_pedido WHERE ' . 'pedidos.' . $_POST["campSearch"] . ' LIKE "%' . $_POST["textSearch"] . '%"' . ' AND cod_cliente="' . $_POST["cod_cliente"] . '" GROUP BY cod_pedido LIMIT ' . $this->offest . ',' . $this->itemsPage);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setPedidos($connection->format_select_Object($result["result"], 'Pedidos'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el registro"));
            $dataContent->addErrores($result["error"]);
        }
    }

    function selectLineas($connection, $dataContent){
        $result = $connection->select('*', 'lineas_pedidos', 'WHERE cod_pedido="' . $_POST["cod_pedido"] . '"');
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setLineasPedidos($connection->format_select_Object($result["result"], 'Lineas_pedidos'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error durante el registro"));
            $dataContent->addErrores($result["error"]);
        }
    }
}