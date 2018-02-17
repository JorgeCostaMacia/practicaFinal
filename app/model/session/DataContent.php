<?php

class DataContent {
    private $success;
    private $accesos;
    private $actividad;
    private $albaranes;
    private $articulos;
    private $facturas;
    private $lineas_albaranes;
    private $lineas_facturas;
    private $lineas_pedidos;
    private $pedidos;
    private $solicitudes;
    private $usuarios_cliente;
    private $usuarios_gestion;
    private $varios;
    private $errores;

    public function __construct() {
        $this->success = false;
        $this->accesos = [];
        $this->actividad = [];
        $this->albaranes = [];
        $this->articulos = [];
        $this->facturas = [];
        $this->lineas_albaranes = [];
        $this->lineas_facturas = [];
        $this->lineas_pedidos = [];
        $this->pedidos = [];
        $this->solicitudes = [];
        $this->usuarios_cliente = [];
        $this->usuarios_gestion = [];
        $this->varios = [];
        $this->errores = [];
    }

    public function getSuccess() { return $this->success; }
    public function setSuccess($_success) { $this->success = $_success; }

    public function getAccesos() { return $this->accesos; }
    public function setAccesos($accesos) { $this->accesos = $accesos; }
    public function addAccesos($acceso){$this->accesos[] = $acceso;}
    public function delAccesos($cod_acceso){
        foreach($this->accesos as $key => $acceso){
            if($acceso->getCodAcceso() == $cod_acceso){
                unset($this->accesos[$key]);
            }
        }
    }

    public function getActividad() { return $this->actividad; }
    public function setActividad($actividad) { $this->actividad = $actividad; }
    public function addActividad($_actividad){$this->actividad[] = $_actividad;}
    public function delActividad($cod_actividad){
        foreach($this->actividad as $key => $_actividad){
            if($_actividad->getCodActividad() == $cod_actividad){
                unset($this->actividad[$key]);
            }
        }
    }

    public function getAlbaranes() { return $this->albaranes; }
    public function setAlbaranes($albaranes) {$this->albaranes = $albaranes;}
    public function addAlbaranes($albaran){$this->albaranes[] = $albaran;}
    public function delAlbaranes($cod_albaran){
        foreach($this->albaranes as $key => $albaran){
            if($albaran->getCodAlbaran() == $cod_albaran){
                unset($this->albaranes[$key]);
            }
        }
    }

    public function getArticulos(){return $this->articulos;}
    public function setArticulos($articulos){$this->articulos = $articulos;}
    public function addArticulos($articulo){$this->articulos[] = $articulo;}
    public function delArticulos($cod_articulo){
        foreach($this->articulos as $key => $articulo){
            if($articulo->getCodArticulo() == $cod_articulo){
                unset($this->articulos[$key]);
            }
        }
    }

    public function getFacturas(){return $this->facturas;}
    public function setFacturas($facturas){$this->facturas = $facturas;}
    public function addFacturas($factura){$this->facturas[] = $factura;}
    public function delFacturas($cod_factura){
        foreach($this->facturas as $key => $factura){
            if($factura->getCodFactura() == $cod_factura){
                unset($this->facturas[$key]);
            }
        }
    }
    public function getLineasAlbaranes(){return $this->lineas_albaranes;}
    public function setLineasAlbaranes($lineas_albaranes){$this->lineas_albaranes = $lineas_albaranes;}
    public function addLineasAlbaranes($linea_albaran){$this->lineas_albaranes[] = $linea_albaran;}
    public function delLineasAlbaranes($cod_linea){
        foreach($this->lineas_albaranes as $key => $linea){
            if($linea->getCodLinea() == $cod_linea){
                unset($this->lineas_albaranes[$key]);
            }
        }
    }

    public function getLineasFacturas(){return $this->lineas_facturas;}
    public function setLineasFacturas($lineas_facturas){$this->lineas_facturas = $lineas_facturas;}
    public function addLineasFacturas($linea_factura){$this->lineas_facturas[] = $linea_factura;}
    public function delLineasFacturas($cod_linea){
        foreach($this->lineas_facturas as $key => $linea){
            if($linea->getCodLinea() == $cod_linea){
                unset($this->lineas_facturas[$key]);
            }
        }
    }

    public function getLineasPedidos(){return $this->lineas_pedidos;}
    public function setLineasPedidos($lineas_pedidos){$this->lineas_pedidos = $lineas_pedidos;}
    public function addLineasPedidos($linea_pedido){$this->lineas_pedidos[] = $linea_pedido;}
    public function delLineasPedidos($cod_linea){
        foreach($this->lineas_pedidos as $key => $linea){
            if($linea->getCodLinea() == $cod_linea){
                unset($this->lineas_pedidos[$key]);
            }
        }
    }

    public function getPedidos(){return $this->pedidos;}
    public function setPedidos($pedidos){$this->pedidos = $pedidos;}
    public function addPedidos($pedido){$this->pedidos[] = $pedido;}
    public function delPedidos($cod_pedido){
        foreach($this->pedidos as $key => $pedido){
            if($pedido->getCodPedido() == $cod_pedido){
                unset($this->pedidos[$key]);
            }
        }
    }

    public function getSolicitudes(){return $this->solicitudes;}
    public function setSolicitudes($solicitudes){$this->solicitudes = $solicitudes;}
    public function addSolicitudes($solicitud){$this->solicitudes[] = $solicitud;}
    public function delSolicitudes($cod_solicitud){
        foreach($this->solicitudes as $key => $solicitud){
            if($solicitud->getCodSolicitud() == $cod_solicitud){
                unset($this->solicitudes[$key]);
            }
        }
    }

    public function getUsuariosCliente(){return $this->usuarios_cliente;}
    public function setUsuariosCliente($usuarios_cliente){$this->usuarios_cliente = $usuarios_cliente;}
    public function addUsuariosCliente($usuario_cliente){$this->usuarios_cliente[] = $usuario_cliente;}
    public function delUsuariosCliente($cod_cliente){
        foreach($this->usuarios_cliente as $key => $usuario_cliente){
            if($usuario_cliente->getCodCliente() == $cod_cliente){
                unset($this->usuarios_cliente[$key]);
            }
        }
    }

    public function getUsuariosGestion(){return $this->usuarios_gestion;}
    public function setUsuariosGestion($usuarios_gestion){$this->usuarios_gestion = $usuarios_gestion;}
    public function addUsuariosGestion($usuario_gestion){$this->usuarios_gestion[] = $usuario_gestion;}
    public function delUsuariosGestion($cod_gestion){
        foreach($this->usuarios_gestion as $key => $usuario_gestion){
            if($usuario_gestion->getCodCliente() == $cod_gestion){
                unset($this->usuarios_gestion[$key]);
            }
        }
    }

    public function getVarios(){return $this->varios;}
    public function setVarios($varios){$this->varios = $varios;}
    public function addVarios($varios){$this->varios[] = $varios;}

    public function getErrores(){return $this->errores;}
    public function setErrores($errores){$this->errores = $errores;}
    public function addErrores($error){$this->errores[] = $error;}

    function toJson(){
        $returned = [];
        $returned["success"] = $this->success;
        $returned["accesos"] = [];
        $returned["actividad"] = [];
        $returned["albaranes"] = [];
        $returned["articulos"] = [];
        $returned["facturas"] = [];
        $returned["lineas_albaranes"] = [];
        $returned["lineas_facturas"] = [];
        $returned["lineas_pedidos"] = [];
        $returned["pedidos"] = [];
        $returned["solicitudes"] = [];
        $returned["usuarios_cliente"] = [];
        $returned["usuarios_gestion"] = [];
        $returned["varios"] = $this->getVarios();
        $returned["errores"] = $this->getErrores();

        foreach($this->accesos as $acceso){
            $aux = [];
            $aux["cod_acceso"] = $acceso->getCodAcceso();
            $aux["cod_gestor"] = $acceso->getCodGestor();
            $aux["fecha_hora_acceso"] = $acceso->getFechaHoraAcceso();
            $aux["fecha_hora_salida"] = $acceso->getFechaHoraSalida();
            $returned["accesos"][] = $aux;
        }

        foreach($this->actividad as $_actividad){
            $aux = [];
            $aux["cod_actividad"] = $_actividad->getCodActividad();
            $aux["cod_usuario"] = $_actividad->getCodUsuario();
            $aux["tipo_usuario"] = $_actividad->getTipoUsuario();
            $aux["cod_tabla"] = $_actividad->getCodTabla();
            $aux["cod_linea"] = $_actividad->getCodLinea();
            $aux["tabla"] = $_actividad->getTabla();
            $aux["accion"] = $_actividad->getAccion();
            $aux["fecha"] = $_actividad->getFecha();
            $returned["accesos"][] = $aux;
        }

        foreach($this->albaranes as $albaran){
            $aux = [];
            $aux["cod_albaran"] = $albaran->getCodAlbaran();
            $aux["cod_cliente"] = $albaran->getCodCliente();
            $aux["fecha"] = $albaran->getFecha();
            $aux["concepto"] = $albaran->getConcepto();
            $aux["estado"] = $albaran->getEstado();
            $aux["lineas"] = $albaran->getLineas();
            $returned["albaranes"][] = $aux;
        }

        foreach($this->articulos as $articulo){
            $aux = [];
            $aux["cod_articulo"] = $articulo->getCodArticulo();
            $aux["nombre"] = $articulo->getNombre();
            $aux["descripcion"] = $articulo->getDescripcion();
            $aux["precio"] = $articulo->getPrecio();
            $aux["descuento"] = $articulo->getDescuento();
            $aux["iva"] = $articulo->getIva();
            $aux["estado"] = $articulo->getEstado();
            $returned["articulos"][] = $aux;
        }

        foreach($this->facturas as $factura){
            $aux = [];
            $aux["cod_factura"] = $factura->getCodFactura();
            $aux["cod_cliente"] = $factura->getCodCliente();
            $aux["fecha"] = $factura->getFecha();
            $aux["descuento"] = $factura->getDescuento();
            $aux["concepto"] = $factura->getConcepto();
            $aux["estado"] = $factura->getEstado();
            $aux["lineas"] = $factura->getLineas();
            $returned["facturas"][] = $aux;
        }

        foreach($this->lineas_albaranes as $linea_albaran){
            $aux = [];
            $aux["cod_linea"] = $linea_albaran->getCodLinea();
            $aux["cod_albaran"] = $linea_albaran->getCodAlbaran();
            $aux["cod_articulo"] = $linea_albaran->getCodArticulo();
            $aux["precio"] = $linea_albaran->getPrecio();
            $aux["cantidad"] = $linea_albaran->getCantidad();
            $aux["descuento"] = $linea_albaran->getDescuento();
            $aux["iva"] = $linea_albaran->getIva();
            $aux["total"] = $linea_albaran->getTotal();
            $aux["estado"] = $linea_albaran->getEstado();
            $returned["lineas_albaranes"][] = $aux;
        }

        foreach($this->lineas_facturas as $linea_factura){
            $aux = [];
            $aux["cod_linea"] = $linea_factura->getCodLinea();
            $aux["cod_factura"] = $linea_factura->getCodFactura();
            $aux["cod_articulo"] = $linea_factura->getCodArticulo();
            $aux["precio"] = $linea_factura->getPrecio();
            $aux["cantidad"] = $linea_factura->getCantidad();
            $aux["descuento"] = $linea_factura->getDescuento();
            $aux["iva"] = $linea_factura->getIva();
            $aux["total"] = $linea_factura->getTotal();
            $aux["estado"] = $linea_factura->getEstado();
            $returned["lineas_facturas"][] = $aux;
        }

        foreach($this->lineas_pedidos as $linea_pedido){
            $aux = [];
            $aux["cod_linea"] = $linea_pedido->getCodLinea();
            $aux["cod_pedido"] = $linea_pedido->getCodPedido();
            $aux["cod_articulo"] = $linea_pedido->getCodArticulo();
            $aux["precio"] = $linea_pedido->getPrecio();
            $aux["cantidad"] = $linea_pedido->getCantidad();
            $aux["total"] = $linea_pedido->getTotal();
            $aux["estado"] = $linea_pedido->getEstado();
            $returned["lineas_pedidos"][] = $aux;
        }

        foreach($this->pedidos as $pedido){
            $aux = [];
            $aux["cod_pedido"] = $pedido->getCodPedido();
            $aux["cod_cliente"] = $pedido->getCodCliente();
            $aux["fecha"] = $pedido->getFecha();
            $aux["estado"] = $pedido->getEstado();
            $aux["lineas"] = $pedido->getLineas();
            $returned["pedidos"][] = $aux;
        }

        foreach($this->solicitudes as $solicitud){
            $aux = [];
            $aux["cod_solicitud"] = $solicitud->getCodSolicitud();
            $aux["cif_dni"] = $solicitud->getCifDni();
            $aux["nombre_completo"] = $solicitud->getNombreCompleto();
            $aux["razon_social"] = $solicitud->getRazonSocial();
            $aux["domicilio_social"] = $solicitud->getDomicilioSocial();
            $aux["ciudad"] = $solicitud->getCiudad();
            $aux["email"] = $solicitud->getEmail();
            $aux["telefono"] = $solicitud->getTelefono();
            $aux["nick"] = $solicitud->getNick();
            $aux["password"] = $solicitud->getPassword();
            $returned["solicitudes"][] = $aux;
        }

        foreach($this->usuarios_cliente as $usuario_cliente){
            $aux = [];
            $aux["cod_cliente"] = $usuario_cliente->getCodCliente();
            $aux["cif_dni"] = $usuario_cliente->getCifDni();
            $aux["nombre_completo"] = $usuario_cliente->getNombreCompleto();
            $aux["razon_social"] = $usuario_cliente->getRazonSocial();
            $aux["domicilio_social"] = $usuario_cliente->getDomicilioSocial();
            $aux["ciudad"] = $usuario_cliente->getCiudad();
            $aux["email"] = $usuario_cliente->getEmail();
            $aux["telefono"] = $usuario_cliente->getTelefono();
            $aux["nick"] = $usuario_cliente->getNick();
            $aux["password"] = $usuario_cliente->getPassword();
            $aux["estado"] = $usuario_cliente->getEstado();
            $returned["usuarios_cliente"][] = $aux;
        }

        foreach($this->usuarios_gestion as $usuario_gestion){
            $aux = [];
            $aux["cod_gestor"] = $usuario_gestion->getCodGestor();
            $aux["nombre_completo"] = $usuario_gestion->getNombreCompleto();
            $aux["nick"] = $usuario_gestion->getNick();
            $aux["password"] = $usuario_gestion->getPassword();
            $aux["estado"] = $usuario_gestion->getEstado();
            $returned["usuarios_gestion"][] = $aux;
        }

        return json_encode($returned);
    }
}