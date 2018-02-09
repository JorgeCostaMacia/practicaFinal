<div class="container" id="formLoginContainer">
    <form id="formLogin" action="home/" method="POST" class="col-md-6 col-md-offset-3 panel panel-default">
        <div class="panel-body">
            <h3 class="text-center">Acceso</h3>
            <div class="input-group input-group-lg">
                <span class="input-group-addon "><i class="fa fa-user" aria-hidden="true">
                        <span class="glyphicon glyphicon-user"></span>
                    </i></span>
                <input type="text"  name="nick" id="nick" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" required>
                <span id="nick"></span>
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-lock"></span>
                </i></span>
                <input type="password" name="password" id="pass" maxlength="30" class="form-control" placeholder="Password" required>
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon glyphicon-tag"></span>
                </i></span>
                <select class="form-control" name="usuario" id="usuario">
                    <option value="cliente">Cliente</option>
                    <option value="gestion">Gestion</option>
                </select>
            </div>
            <br>
            <button type="button" name="entrar" id="entrar" class="btn btn-primary btn-block">Entrar</button>
            <button type="button" name="addFormRegistrar" id="addFormRegistrar" class="btn btn-warning btn-block">Formulario registro</button>
        </div>
    </form>
</div>

<div class="container hidden" id="formAcountContainer">
    <form id="formGetAccount" method="POST" class="col-md-6 col-md-offset-3 panel panel-default">
        <input type="hidden" name="usuario" value="limitado">
        <div class="panel-body">
            <h3 class="text-center">Registro</h3>
            <div class="input-group input-group-lg">
                <span class="input-group-addon "><i class="fa fa-user" aria-hidden="true">
                        <span class="glyphicon glyphicon-user"></span>
                    </i></span>
                <input type="text" name="nick" id="nickReg" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="" required>
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-lock"></span>
                </i></span>
                <input type="password" name="password" id="passReg" maxlength="30" class="form-control" placeholder="Password" required>
            </div>
            <br/>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-user"></span>
                </i></span>
                <input type="text" name="nombre_completo" id="nombre_completo" maxlength="30" class="form-control" placeholder="Nombre completo" required>
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-user"></span>
                </i></span>
                <input type="text" name="cif_dni" id="cif_dni" maxlength="30" class="form-control" placeholder="CIF / DNI" required>
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-briefcase"></span>
                </i></span>
                <input type="text" name="razon_social" id="razon_social" maxlength="30" class="form-control" placeholder="Razon social" required>
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-briefcase"></span>
                </i></span>
                <input type="text" name="domicilio_social" id="domicilio_social" maxlength="30" class="form-control" placeholder="Domicilio social" required>
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-map-marker"></span>
                </i></span>
                <input type="text" name="ciudad" id="ciudad" maxlength="30" class="form-control" placeholder="Ciudad" required>
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-envelope"></span>
                </i></span>
                <input type="email" name="email" id="email" maxlength="30" class="form-control" placeholder="Email" required>
            </div>
            <br>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-earphone"></span>
                </i></span>
                <input type="text" name="telefono" id="telefono" maxlength="30" class="form-control" placeholder="Telefono" required>
            </div>
            <br>
            <button type="button" name="registrar" id="registrar" class="btn btn-primary btn-block">Registrar</button>
            <button type="reset" name="reset" id="reset" class="btn btn-danger btn-block">Reiniciar formulario</button>
            <button type="button" name="addFormLogin" id="addFormLogin" class="btn btn-warning btn-block">Formulario acceso</button>
        </div>
    </form>
</div>

