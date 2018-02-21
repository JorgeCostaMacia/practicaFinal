<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="formGetAccount" method="POST">
                    <input type="hidden" id="usuario" name="usuario" value="gestor">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="nick" id="nickReg" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" required>
                            </div>
                        <br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name="password" id="passReg" maxlength="30" class="form-control" placeholder="Password" required>
                        </div>
                        <br/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="nombre_completo" id="nombre_completo" maxlength="30" class="form-control" placeholder="Nombre completo" required>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="cif_dni" id="cif_dni" maxlength="30" class="form-control" placeholder="CIF / DNI" required>
                        </div>
                        <br>
                        </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
                            <input type="text" name="razon_social" id="razon_social" maxlength="30" class="form-control" placeholder="Razon social" required>
                        </div>
                        <br>
                        </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
                            <input type="text" name="domicilio_social" id="domicilio_social" maxlength="30" class="form-control" placeholder="Domicilio social" required>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                            <input type="text" name="ciudad" id="ciudad" maxlength="30" class="form-control" placeholder="Ciudad" required>
                            </div>
                        <br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="email" name="email" id="email" maxlength="30" class="form-control" placeholder="Email" required>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
                            <input type="text" name="telefono" id="telefono" maxlength="30" class="form-control" placeholder="Telefono" required>
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