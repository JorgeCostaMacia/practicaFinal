<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="formAltaArticulo" method="POST">
                    <input type="hidden" id="usuario" name="usuario" value="gestor">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon "><span class="glyphicon glyphicon-tag"></span></span>
                            <input type="text" name="nombre" id="nombre" maxlength="30" class="form-control" placeholder="Nombre" aria-describedby="sizing-addon1" required>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" name="descripcion" id="descripcion" maxlength="30" class="form-control" placeholder="Descripcion" required>
                        </div>
                        <br/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                            <input type="number" name="precio" id="precio" maxlength="10" step="1" min="0" class="form-control" placeholder="Precio" required>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                            <input type="number" name="descuento" id="descuento" maxlength="10" step="0.01" min="0" max="1" class="form-control" placeholder="Descuento" required>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                            <select class="form-control" name="iva" id="iva">
                                <option value="0">Iva 0</option>
                                <option value="0.04">Iva 0.04</option>
                                <option value="0.10">Iva 0.10</option>
                                <option value="0.21">Iva 0.21</option>
                            </select>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <button type="button" name="registrar" id="registrar" class="btn btn-primary btn-block">Registrar</button>
                        <button type="reset" name="reset" id="reset" class="btn btn-danger btn-block">Reiniciar formulario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>