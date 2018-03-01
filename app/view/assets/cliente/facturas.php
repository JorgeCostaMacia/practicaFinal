<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="formSearch" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 navbar-right text-center">
                    <input type="hidden" id="usuario" name="usuario" value="cliente">
                    <input type="hidden" id="cod_cliente" name="cod_cliente" value="<?= $dependency->getSession()->getUsuario()->getCodCliente(); ?>">
                    <input type="hidden" id="numPage" name="numPage" value="1">
                    <select name="campSearch" class="form-control">
                        <option value="facturas.cod_factura">Codigo factura</option>
                        <option value="facturas.cod_albaran">Codigo albaran</option>
                        <option value="facturas.fecha">Fecha</option>
                        <option value="facturas.estado">Estado</option>
                        <option value="facturas.descuento">Descuento</option>
                        <option value="lineas_facturas.cod_linea">Codigo linea</option>
                        <option value="lineas_facturas.cod_articulo">Codigo articulo</option>
                        <option value="lineas_facturas.precio">Precio</option>
                        <option value="lineas_facturas.cantidad">Cantidad</option>
                        <option value="lineas_facturas.descuento">Descuento</option>
                        <option value="lineas_facturas.iva">Iva</option>
                        <option value="lineas_facturas.total">Total</option>
                    </select>
                    <input name="textSearch" placeholder="Buscar pedidos" class="form-control" type="text" maxlength="30" />
                    <button type="button" id="search" class="btn btn-primary btn-block"><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    <br>
                    <ul class="pagination">
                        <li><a href="#" id="anterior">«</a></li>
                        <li class="active"><a href="#" id="pageActual">1<span class="sr-only">(current)</span></a></li>
                        <li><a href="#" id="siguiente">»</a></li>
                    </ul>
                </form>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="tableFacturas">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Albaran</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Descuento</th>
                                <th>Estado</th>
                                <th>Lineas</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="tableLineas"></div>
            </div>
        </div>
    </div>
</div>




