<div id="wrapper">
    <div class="overlay"></div>

    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand"><a href="../misDatos/"><?php echo $dependency->getSession()->getUsuario()->getNombreCompleto(); ?></a></li>
            <li><a href="../home/">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Altas<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Altas</li>
                    <li><a href="../altaArticulo/">Alta articulo</a></li>
                    <li><a href="../altaCliente/">Alta cliente</a></li>
                    <li><a href="../altaGestor/">Alta gestor</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ver/modificar usuarios<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Ver/modificar usuarios</li>
                    <li><a href="../solicitudes/">Solicitudes</a></li>
                    <li><a href="../clientes/">Clientes</a></li>
                    <li><a href="../gestores/">Gestores</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actividad<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Actividad</li>
                    <li><a href="../accesos/">Accesos</a></li>
                    <li><a href="../actividad/">Actividad</a></li>
                </ul>
            </li>
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