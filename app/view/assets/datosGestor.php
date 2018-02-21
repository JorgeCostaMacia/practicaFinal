<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container" id="formAcountContainer">
                    <form id="formGetAccount" action="../misDatos/" method="POST">
                        <input type="hidden" name="usuario" value="gestor">
                        <input type="hidden" name="cod_gestor" value="<?=$dependency->getSession()->getUsuario()->getCodGestor();?>">
                        <input type="hidden" name="nick" value="<?= $dependency->getSession()->getUsuario()->getNick(); ?>">
                        <input type="hidden" name="estado" value="<?= $dependency->getSession()->getUsuario()->getEstado(); ?>">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="cod_cliente" id="cod_cliente" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="<?=$dependency->getSession()->getUsuario()->getCodGestor();?>" required disabled>
                            </div>
                            <br>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="nick" id="nickReg" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="<?=$dependency->getSession()->getUsuario()->getNick();?>" required disabled>
                            </div>
                            <br>
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
                            <br>
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