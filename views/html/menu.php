<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="../home.php" class="app-brand-link"> <span class="app-brand-logo demo">
                </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Librería</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item active">
            <a href="dashboard_content.php" target="base" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
                <div data-i18n="Layouts">Gestión Librería</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="autores/autores.views.php" target="base" class="menu-link">
                        <div data-i18n="Blank">Autores</div>
                    </a>
                </li>
                 <li class="menu-item">
                    <a href="libros/libros.views.php" target="base" class="menu-link">
                        <div data-i18n="Blank">Libros</div>
                    </a>
                </li>
                 <li class="menu-item">
                    <a href="inventario/inventario.views.php" target="base" class="menu-link">
                        <div data-i18n="Blank">Inventario</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>