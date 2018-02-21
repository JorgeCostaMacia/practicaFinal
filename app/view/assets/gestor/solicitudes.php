<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="formSearch" class="col-lg-2 col-md-2 col-sm-12 col-xs-12 navbar-right text-center">
                    <input type="hidden" id="usuario" name="usuario" value="gestor">
                    <select name="campSearch" class="form-control">
                        <option value="cif_dni">CIF / DNI</option>
                        <option value="nombre_completo">Nombre completo</option>
                        <option value="razon_social">Razon social</option>
                        <option value="domicilio_social">Domicilio social</option>
                        <option value="ciudad">Ciudad</option>
                        <option value="email">Email</option>
                        <option value="telefono">Telefono</option>
                        <option value="nick">Nick</option>
                    </select>
                    <input name="textSearch" placeholder="Buscar solicitudes" class="form-control" type="text" maxlength="30" />
                    <button type="button" id="search" class="btn btn-primary btn-block"><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </form>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>cif_dni</th>
                                    <th>nombre_completo</th>
                                    <th>razon_social</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
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