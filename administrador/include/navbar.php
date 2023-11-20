<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            <?php if($_SESSION['id'] === "1") { ?>
            <li class="nav-item mr-4 <?php echo ($_GET['module'] == 'dashboard') ? 'active' : ''; ?>">
                <a class="nav-link " href="main?module=dashboard">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <?php } ?>
            <li
                class="nav-item mr-4 <?php echo ($_GET['module'] == 'negocios' || $_GET['module'] == 'autos' || $_GET['module'] == 'crear-auto' || $_GET['module'] == 'configurar-auto' || $_GET['module'] == 'configurar-color' || $_GET['module'] == 'autopartes' || $_GET['module'] == 'web' || $_GET['module'] == 'configurar-color-autoparte') ? 'active' : ''; ?>">
                <a class="nav-link " href="main?module=negocios">
                    <i class="link-icon" data-feather="award"></i>
                    <span class="menu-title">Negocios</span>
                </a>
            </li>
            
            <li
                class="nav-item mr-4 <?php echo ($_GET['module'] == 'marcas' || $_GET['module'] == 'tipos' || $_GET['module'] == 'modelos' || $_GET['module'] == 'anios' || $_GET['module'] == 'categorias') ? 'active' : ''; ?>">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="menu-title">Configuración</span>
                    <i class="link-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="nav-item <?php echo ($_GET['module'] == 'marcas') ? 'active' : ''; ?>">
                            <a class="nav-link" href="main?module=marcas">Marcas</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'tipos') ? 'active' : ''; ?>"><a
                                class="nav-link" href="main?module=tipos">Tipos</a></li>
                        <li class="nav-item <?php echo ($_GET['module'] == 'modelos') ? 'active' : ''; ?>"><a
                                class="nav-link" href="main?module=modelos">Modelos</a></li>
                    </ul>
                </div>
            </li>

            <?php if($_SESSION['id'] === "1") { ?>
            <li class="nav-item mr-4 <?php echo ($_GET['module'] == 'usuarios') ? 'active' : ''; ?>">
                <a class="nav-link " href="main?module=usuarios">
                    <i class="link-icon" data-feather="user-plus"></i>
                    <span class="menu-title">Usuarios</span>
                </a>
            </li>
            <?php } ?>

        </ul>
    </div>
</nav>