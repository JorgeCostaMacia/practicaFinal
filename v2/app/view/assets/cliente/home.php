<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="container panelHome">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="glyphicon glyphicon-bookmark"></span> <?php echo $dependency->getSession()->getUsuario()->getNombreCompleto(); ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="butGrup col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <a href="../misDatos/" class="btnHome btn btn-success btn-lg col-lg-3 col-md-3 col-sm-6 col-xs-12" role="button"><span class="glyphicon glyphicon-user"></span><br/>Mis datos</a>
                                <a href="../logout/" class="btnHome btn btn-danger btn-lg col-lg-3 col-md-3 col-sm-6 col-xs-12" role="button"><span class="glyphicon glyphicon-off"></span> <br/>Salir</a>
                            </div>
                            <div class="butGrup col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <a href="../realizarPedidos/" class="btnHome btn btn-primary btn-lg col-lg-3 col-md-3 col-sm-6 col-xs-12" role="button"><span class="glyphicon glyphicon-shopping-cart"></span><br/>Comprar</a>
                                <a href="../pedidos/" class="btnHome btn btn-primary btn-lg col-lg-3 col-md-3 col-sm-6 col-xs-12" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> <br/>Pedidos</a>
                                <a href="../albaranes/" class="btnHome btn btn-primary btn-lg col-lg-3 col-md-3 col-sm-6 col-xs-12" role="button"><span class="glyphicon glyphicon-shopping-cart"></span><br/>Albaranes</a>
                                <a href="../facturas/" class="btnHome btn btn-primary btn-lg col-lg-3 col-md-3 col-sm-6 col-xs-12" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> <br/>Facturas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>