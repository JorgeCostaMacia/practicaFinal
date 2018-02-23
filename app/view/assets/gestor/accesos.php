<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="formSearch" class="col-lg-2 col-md-2 col-sm-12 col-xs-12 navbar-right text-center">
                    <input type="hidden" id="usuario" name="usuario" value="gestor">
                    <input type="hidden" id="numPage" name="numPage" value="1">
                    <select name="campSearch" class="form-control">
                        <option value="cod_acceso">Cod acceso</option>
                        <option value="cod_gestor">Cod gestor</option>
                        <option value="nombre_gestor">Nombre gestor</option>
                        <option value="fecha_hora_acceso">Acceso</option>
                        <option value="fecha_hora_salida">Salida</option>
                    </select>
                    <input name="textSearch" placeholder="Buscar articulos" class="form-control" type="text" maxlength="30" />
                    <button type="button" id="search" class="btn btn-primary btn-block"><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    <br>
                    <button type="button" id="descarga" class="btn btn-warning btn-block" disabled><span class="glyphicon glyphicon-download" aria-hidden="true"></span> PDF</button>
                    <ul class="pagination">
                        <li><a href="#" id="anterior">«</a></li>
                        <li class="active"><a href="#" id="pageActual">1<span class="sr-only">(current)</span></a></li>
                        <li><a href="#" id="siguiente">»</a></li>
                    </ul>
                </form>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="tableAccesos">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Gestor</th>
                                <th>Acceso</th>
                                <th>Salida</th>
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




