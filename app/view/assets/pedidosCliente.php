<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="col-lg-2 col-md-2 col-sm-12 col-xs-12 navbar-right text-center">
                    <select class="form-control">
                        <option>cod_articulo</option>
                        <option>nombre</option>
                        <option>precio</option>
                        <option>descuento</option>
                        <option>iva</option>
                    </select>
                    <input placeholder="Buscar articulo" class="form-control" type="text" maxlength="30" />
                    <button type="button" class="btn btn-primary btn-block"><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    <ul class="pagination">
                        <li class="page-item disabled"><button type="button" class="page-link" id="anterior">Anterior</button></li>
                        <li class="page-item disabled"><button type="button" class="page-link" name="pageActual" id="pageActual" value="0">0</button></li>
                        <li class="page-item"><button type="button" class="page-link" id="siguiente">Siguiente</button></li>
                    </ul>
                </form>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
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
            </div>
        </div>
    </div>
</div>




