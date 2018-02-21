<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="formSearch" class="col-lg-2 col-md-2 col-sm-12 col-xs-12 navbar-right text-center">
                    <input type="hidden" id="usuario" name="usuario" value="cliente">
                    <input type="hidden" id="cod_cliente" name="cod_cliente" value="<?= $dependency->getSession()->getUsuario()->getCodCliente(); ?>">
                    <input type="hidden" id="numPage" name="numPage" value="1">
                    <select name="campSearch" class="form-control">
                        <option value="cod_pedido">Codigo pedido</option>
                        <option value="fecha">Fecha</option>
                        <option value="estado">Estado</option>
                    </select>
                    <input name="textSearch" placeholder="Buscar pedidos" class="form-control" type="text" maxlength="30" />
                    <button type="button" id="search" class="btn btn-primary btn-block"><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        <ul class="pagination">
                            <li><a href="#" id="anterior">«</a></li>
                            <li class="active"><a href="#" id="pageActual">1<span class="sr-only">(current)</span></a></li>
                            <li><a href="#" id="siguiente">»</a></li>
                        </ul>
                </form>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="tablePedidos">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>cod_pedido</th>
                                <th>cod_cliente</th>
                                <th>fecha</th>
                                <th>estado</th>
                                <th>lineas</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="tableLineas"></div>
            </div>
        </div>
    </div>
</div>




