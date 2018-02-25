<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="formSearch" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 navbar-right text-center">
                    <input type="hidden" id="usuario" name="usuario" value="gestor">
                    <input type="hidden" id="cod_gestor" name="cod_gestor" value="<?= $dependency->getSession()->getUsuario()->getCodGestor(); ?>">
                    <input type="hidden" id="numPage" name="numPage" value="1">
                    <select name="campSearch" class="form-control">
                        <option value="cod_articulo">Codigo articulo</option>
                        <option value="nombre">Nombre</option>
                        <option value="descripcion">Descripcion</option>
                        <option value="precio">Precio</option>
                        <option value="descuento">Descuento</option>
                        <option value="iva">Iva</option>
                    </select>
                    <input name="textSearch" placeholder="Buscar articulo" class="form-control" type="text" maxlength="30" />
                    <button type="button" id="search" class="btn btn-primary btn-block" disabled><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    <br>
                    <select name="cod_cliente" id="cod_cliente" class="form-control"></select>
                    <button type="button" id="procesar" class="btn btn-warning btn-block" disabled><span class="icon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
                    <ul class="pagination">
                        <li><a href="#" id="anterior">«</a></li>
                        <li class="active"><a href="#" id="pageActual">1<span class="sr-only">(current)</span></a></li>
                        <li><a href="#" id="siguiente">»</a></li>
                    </ul>
                </form>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="formPedido" name="formPedido">
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Descuento</th>
                                <th>Iva</th>
                                <th>Cantidad</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>