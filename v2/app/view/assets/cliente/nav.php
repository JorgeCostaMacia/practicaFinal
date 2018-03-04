<div id="wrapper">
    <div class="overlay"></div>

    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand"><a href="../misDatos/"><?php echo $dependency->getSession()->getUsuario()->getNombreCompleto(); ?></a></li>
            <li><a href="../home/">Home</a></li>
            <li><a href="../realizarPedidos/">Realizar pedidos</a></li>
            <li><a href="../pedidos/">Pedidos</a></li>
            <li><a href="../albaranes/">Albaranes</a></li>
            <li><a href="../facturas/">Facturas</a></li>
            <li><a href="../logout/">Salir</a></li>
        </ul>
    </nav>

    <button type="button" class="menu-cross is-closed" data-toggle="offcanvas">
        <span class="cross-top"></span>
        <span class="cross-middle"></span>
        <span class="cross-bottom"></span>
    </button>
</div>