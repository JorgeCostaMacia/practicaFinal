<div id="wrapper">
    <div class="overlay"></div>

    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand"><a href="../datosCliente/"><?php echo $dependency->getSession()->getUsuario()->getNombreCompleto(); ?></a></li>
            <li><a href="../home/">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Usuarios</li>
                    <li><a href="../solicitudesGestor/">Solicitudes</a></li>
                    <li><a href="../clientesGestor/">Clientes</a></li>
                    <li><a href="../gestoresGestor/">Gestores</a></li>
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
            <li><a href="../realizarPedidosGestor/">Realizar pedidos</a></li>
            <li><a href="../pedidosGestor/">Pedidos</a></li>
            <li><a href="../albaranesGestor/">Albaranes</a></li>
            <li><a href="../facturasGestor/">Facturas</a></li>
            <li><a href="../logout/">Salir</a></li>
        </ul>
    </nav>

    <button type="button" class="menu-cross is-closed" data-toggle="offcanvas">
        <span class="cross-top"></span>
        <span class="cross-middle"></span>
        <span class="cross-bottom"></span>
    </button>
</div>