<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form id="formSearch" class="col-lg-2 col-md-2 col-sm-12 col-xs-12 navbar-right text-center">
                    <input type="hidden" name="usuario" value="cliente">
                    <input type="hidden" name="cod_cliente" value="<?= $services->getSession()->getUsuario()->getCodCliente(); ?>">
                    <select name="campSearch" class="form-control">
                        <option value="cod_articulo">Codigo articulo</option>
                        <option value="nombre">Nombre</option>
                        <option value="descripcion">Descripcion</option>
                        <option value="precio">Precio</option>
                        <option value="descuento">Descuento</option>
                        <option value="iva">Iva</option>
                    </select>
                    <input name="textSearch" placeholder="Buscar articulo" class="form-control" type="text" maxlength="30" />
                    <button type="button" id="search" class="btn btn-primary btn-block"><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </form>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>cod_ariculo</th>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>precio</th>
                                <th>descuento</th>
                                <th>iva</th>
                                <th>cantidad</th>
                            </tr>
                            </thead>
                            <tbody>
                                <form id="formPedido"></form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>