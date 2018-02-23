<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="formSearch" class="col-lg-2 col-md-2 col-sm-12 col-xs-12 navbar-right text-center">
                    <input type="hidden" id="usuario" name="usuario" value="gestor">
                    <input type="hidden" id="numPage" name="numPage" value="1">
                    <select name="campSearch" class="form-control">
                        <option value="cod_actividad">Cod actividad</option>
                        <option value="cod_usuario">Cod usuario</option>
                        <option value="tipo_usuario">Tipo usuario</option>
                        <option value="cod_tabla">Cod tablas</option>
                        <option value="cod_linea">Cod linea</option>
                        <option value="tabla">Tabla</option>
                        <option value="accion">Accion</option>
                        <option value="fecha">Fecha</option>
                    </select>
                    <input name="textSearch" placeholder="Buscar articulos" class="form-control" type="text" maxlength="30" />
                    <button type="button" id="search" class="btn btn-primary btn-block"><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    <button type="button" id="descarga" class="btn btn-warning btn-block" disabled><span class="glyphicon glyphicon-download" aria-hidden="true"></span> PDF</button>
                    <ul class="pagination">
                        <li><a href="#" id="anterior">«</a></li>
                        <li class="active"><a href="#" id="pageActual">1<span class="sr-only">(current)</span></a></li>
                        <li><a href="#" id="siguiente">»</a></li>
                    </ul>
                </form>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="tableActividad">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>cod_actividad</th>
                                <th>cod_usuario</th>
                                <th>tipo_usuario</th>
                                <th>cod_tabla</th>
                                <th>cod_linea</th>
                                <th>tabla</th>
                                <th>accion</th>
                                <th>fecha</th>
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




