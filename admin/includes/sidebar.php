<div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Espace <sup>admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
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
                <a class="nav-link collapsed" href="http://localhost/Projet_Bibliotheque/admin/Client/index.php">
                    <i class="fas fa-users"></i>
                    <span>Liste des clients</span>
                </a>
            </li>

            <!-- Nav Item 2 -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="http://localhost/Projet_Bibliotheque/admin/Client/add.php">
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
                <!-- <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div> -->
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Livres</div>

            <!-- module livres-->
            <!-- Nav-Items-Auteurs -->
            <li class="nav-item">
                <a class="nav-link collapsed" href=""
                    aria-expanded="true" aria-controls="auteurs">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Tous les livres</span>
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
                        <!-- <h6 class="collapse-header">Login Screens:</h6> -->
                        <a class="collapse-item" href="">Voir tout</a>
                        <a class="collapse-item" href="">Ajouter</a>
                        <a class="collapse-item" href="">Voir locations en cours</a>
                        <!-- <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
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
                        <!-- <h6 class="collapse-header">Login Screens:</h6> -->
                        <a class="collapse-item" href="">Voir tout</a>
                        <a class="collapse-item" href="">Ajouter</a>
                        <a class="collapse-item" href="">Voir locations en cours</a>
                        <!-- <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
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
