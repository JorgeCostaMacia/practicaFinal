<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="col-lg-3 col-md-3 col-sm-12 col-xs-12 navbar-right text-center">
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
                        <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">0</a></li>
                        <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                    </ul>
                </form>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
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




