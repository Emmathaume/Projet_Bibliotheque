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
                <a class="nav-link collapsed" href="<?= URL_ADMIN?>location/index.php" data-toggle="collapse" data-target="#location"
                    aria-expanded="true" aria-controls="location">
                    <i class="fas fa-bookmark"></i>
                    <span>Locations</span>
                </a>
                <div id="location" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Locations en cours</a>
                        <a class="collapse-item" href="<?= URL_ADMIN?>location/add.php">Créer une nouvelle location</a>
                        <a class="collapse-item" href="<?= URL_ADMIN?>location/update.php">Cloturer une location</a>
                        <a class="collapse-item" href="<?= URL_ADMIN?>location/index.php">Toutes les locations</a>
                    </div>
                </div>
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
            <!-- Nav Item Editeurs-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#editeur"
                    aria-expanded="true" aria-controls="editeur">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Éditeurs</span>
                </a>
                <div id="editeur" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= URL_ADMIN?>editeur/index.php">Toutes les locs</a>
                        <a class="collapse-item" href="<?= URL_ADMIN?>editeur/add.php">Ajouter</a>
                        <a class="collapse-item" href="">Voir locations en cours</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">


<!-- RESERVE AU ADMIN -->
<?php 
    if (isAdmin($bdd)) :?>
        <!-- Heading -->
        <div class="sidebar-heading">Utilisateurs</div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= URL_ADMIN?>utilisateurs/index.php">
                <i class="fas fa-users"></i>
                <span>Tous les utilisateurs</span>
            </a>
        </li>            
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= URL_ADMIN?>utilisateurs/add.php">
                <i class="fas fa-user"></i>
                <span>Ajouter un utilisateur</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    <?php endif; ?>
        </ul>
        <!-- End of Sidebar -->


