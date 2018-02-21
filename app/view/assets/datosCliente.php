<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container" id="formAcountContainer">
                    <form id="formGetAccount" action="../misDatos/" method="POST">
                        <input type="hidden" name="usuario" value="cliente">
                        <input type="hidden" name="cod_cliente" value="<?=$dependency->getSession()->getUsuario()->getCodCliente();?>">
                        <input type="hidden" name="nick" value="<?= $dependency->getSession()->getUsuario()->getNick(); ?>">
                        <input type="hidden" name="estado" value="<?= $dependency->getSession()->getUsuario()->getEstado(); ?>">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="cod_cliente" id="cod_cliente" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="<?=$dependency->getSession()->getUsuario()->getCodCliente();?>" required disabled>
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="nick" id="nickReg" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="<?=$dependency->getSession()->getUsuario()->getNick();?>" required disabled>
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" name="password" id="passReg" maxlength="30" class="form-control" placeholder="Password" value="<?=$dependency->getSession()->getUsuario()->getPassword();?>" required>
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="nombre_completo" id="nombre_completo" maxlength="30" class="form-control" placeholder="Nombre completo" value="<?=$dependency->getSession()->getUsuario()->getNombreCompleto();?>" required disabled>
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="cif_dni" id="cif_dni" maxlength="30" class="form-control" placeholder="CIF / DNI" value="<?=$dependency->getSession()->getUsuario()->getCifDni();?>" required disabled>
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
                                <input type="text" name="razon_social" id="razon_social" maxlength="30" class="form-control" placeholder="Razon social" value="<?=$dependency->getSession()->getUsuario()->getRazonSocial();?>" required>
                            </div>
                            <br/>
                        </div>
                        <br/>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
                                <input type="text" name="domicilio_social" id="domicilio_social" maxlength="30" class="form-control" placeholder="Domicilio social" value="<?=$dependency->getSession()->getUsuario()->getDomicilioSocial();?>" required>
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                <input type="text" name="ciudad" id="ciudad" maxlength="30" class="form-control" placeholder="Ciudad" value="<?=$dependency->getSession()->getUsuario()->getCiudad();?>" required>
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                <input type="email" name="email" id="email" maxlength="30" class="form-control" placeholder="Email" value="<?=$dependency->getSession()->getUsuario()->getEmail();?>" required>
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
                                <input type="text" name="telefono" id="telefono" maxlength="30" class="form-control" placeholder="Telefono" value="<?=$dependency->getSession()->getUsuario()->getTelefono();?>" required>
                            </div>
                            <br/>
                        </div>
                        <div class="col-lg-12">
                            <button type="button" name="modificar" id="modificar" class="btn btn-warning btn-block">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>