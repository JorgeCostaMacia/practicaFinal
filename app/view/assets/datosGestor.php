<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container" id="formAcountContainer">
                    <form id="formGetAccount" method="POST" class="col-md-6 col-md-offset-2 panel panel-default">
                        <input type="hidden" name="usuario" value="gestor">
                        <input type="hidden" name="cod_gestor" value="<?=$dependency->getSession()->getUsuario()->getCodGestor();?>">
                        <input type="hidden" name="nick" value="<?= $dependency->getSession()->getUsuario()->getNick(); ?>">
                        <div class="panel-body">
                            <h3 class="text-center">Datos cliente</h3>
                            <div class="input-group input-group-lg">
                <span class="input-group-addon "><i class="fa fa-user" aria-hidden="true">
                        <span class="glyphicon glyphicon-user"></span>
                    </i></span>
                                <input type="text" name="cod_cliente" id="cod_cliente" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="<?=$dependency->getSession()->getUsuario()->getCodGestor();?>" required disabled>
                            </div>
                            <br>
                            <div class="input-group input-group-lg">
                <span class="input-group-addon "><i class="fa fa-user" aria-hidden="true">
                        <span class="glyphicon glyphicon-user"></span>
                    </i></span>
                                <input type="text" name="nick" id="nickReg" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="<?=$dependency->getSession()->getUsuario()->getNick();?>" required disabled>
                            </div>
                            <br>
                            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-lock"></span>
                </i></span>
                                <input type="password" name="password" id="passReg" maxlength="30" class="form-control" placeholder="Password" value="<?=$dependency->getSession()->getUsuario()->getPassword();?>" required>
                            </div>
                            <br/>
                            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true">
                    <span class="glyphicon glyphicon-user"></span>
                </i></span>
                                <input type="text" name="nombre_completo" id="nombre_completo" maxlength="30" class="form-control" placeholder="Nombre completo" value="<?=$dependency->getSession()->getUsuario()->getNombreCompleto();?>" required disabled>
                            </div>
                            <br>
                            <br>
                            <button type="button" name="modificar" id="modificar" class="btn btn-warning btn-block">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>