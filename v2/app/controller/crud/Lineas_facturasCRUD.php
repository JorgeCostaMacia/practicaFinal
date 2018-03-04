<?php

class Lineas_facturasCRUD{
    public function select($connection, $dataContent, $col, $more) {
        $result = $connection->select($col, 'lineas_facturas', $more);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
            $dataContent->setLineasFacturas($connection->format_select_Object($result["result"], 'Lineas_facturas'));
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }


  public function insert($connection, $dataContent, $valuesAlbaranes){
      $query = 'INSERT INTO lineas_facturas VALUE(:cod_linea, :cod_factura, :cod_albaran, :cod_articulo, :precio, :cantidad, :descuento, :iva, :total, "pendiente")';
      $bindParams = ["cod_linea", "cod_factura","cod_albaran", "cod_articulo", "precio", "cantidad", "descuento", "iva", "total"];
      $index = 0;

      $values = [];
      $values[] = [];

      foreach($valuesAlbaranes as $key=>$albaranAux){
          foreach($dataContent->getLineasAlbaranes() as $linea){
              foreach($dataContent->getAlbaranes() as $albaran){
                  if($albaran->getCodCliente() === $albaranAux["cod_cliente"]){
                      if($albaran->getCodAlbaran() == $linea->getCodAlbaran()){
                          $values[$index]["cod_linea"] =  $linea->getCodLinea();
                          $values[$index]["cod_albaran"] =  $linea->getCodAlbaran();
                          $values[$index]["cod_factura"] =  $albaranAux["cod_factura"];
                          $values[$index]["cod_articulo"] = $linea->getCodArticulo();
                          $values[$index]["precio"] = $linea->getPrecio();
                          $values[$index]["cantidad"] = $linea->getCantidad();
                          $values[$index]["descuento"] = $linea->getDescuento();
                          $values[$index]["iva"] = $linea->getIva();
                          $values[$index]["total"] =  $linea->getTotal();
                          $index++;
                      }
                  }
              }
          }
      }

      $result = $connection->prepare($query, $bindParams, $values);

      if ($result["success"]) {
          $dataContent->setSuccess(true);
      }
      else {
          $dataContent->setSuccess(false);
          $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
          $dataContent->addErrores($result["error"]);
      }

      return $values;
  }

    public function delete($connection, $dataContent){
        $result = $connection->delete('lineas_facturas', 'cod_factura=' . $_POST["cod_factura"]);

        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
        }
    }
    public function update($connection, $dataContent, $set){
        $result = $connection->update('lineas_facturas', $set, 'WHERE cod_factura=' . $_POST["cod_factura"]);
        if ($result["success"]) {
            $dataContent->setSuccess(true);
        }
        else {
            $dataContent->setSuccess(false);
            $dataContent->addErrores(new DBerror("Se produjo un error intentelo mas tarde"));
            $dataContent->addErrores($result["error"]);
        }
    }

}