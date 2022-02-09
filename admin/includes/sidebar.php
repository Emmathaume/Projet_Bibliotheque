<div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= URL_ADMIN?>index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Espace <sup>admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= URL_ADMIN?>index.php">
                    <!-- <i class="fas fa-cogs"></i> -->
                    <div class="text-center">Tableau de bord</div></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Clients
            </div>

            <!--- module clients -->
            <!-- nav-item 1  -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= URL_ADMIN?>Client/index.php">
                    <i class="fas fa-users"></i>
                    <span>Liste des clients</span>
                </a>
            </li>
            <!-- Nav Item 2 -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= URL_ADMIN?>Client/add.php">
                    <i class="fas fa-user"></i>
                    <span>Ajouter client</span>
                </a>
            </li>
            <!-- Nav Item 3 -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-bookmark"></i>
                    <span>Locations en cours</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Livres</div>

            <!-- module livres-->
            <!-- Nav-Items-Auteurs -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= URL_ADMIN?>Livres/index.php" aria-expanded="true" aria-controls="auteurs">
                    <i class="fas fa-swatchbook"></i>
                    <span>Tous les livres</span>
                </a>
            </li>            
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= URL_ADMIN?>Livres/add.php">
                    <i class="fas fa-book"></i>
                    <span>Ajouter un livre</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#auteurs"
                    aria-expanded="true" aria-controls="auteurs">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Auteurs</span>
                </a>
                <div id="auteurs" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= URL_ADMIN?>Auteurs/index.php">Voir tout</a>
                        <a class="collapse-item" href="<?= URL_ADMIN?>Auteurs/add.php">Ajouter</a>
                        <a class="collapse-item" href="">Voir locations en cours</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item Catégories-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categories"
                    aria-expanded="true" aria-controls="categories">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Catégories</span>
                </a>
                <div id="categories" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= URL_ADMIN?>catégories/index.php">Voir tout</a>
                        <a class="collapse-item" href="<?= URL_ADMIN?>catégories/add.php">Ajouter</a>
                        <a class="collapse-item" href="">Voir locations en cours</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
