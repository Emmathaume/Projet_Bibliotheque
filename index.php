 <!DOCTYPE html>
 <html lang="fr">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- reset le css -->
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jgthms/minireset.css@master/minireset.min.css"> -->
     <!-- Fontawesome -->
     <script src="https://kit.fontawesome.com/7e0d33e192.js" crossorigin="anonymous"></script>
     <!-- Slick -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- FONTS -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;700&display=swap" rel="stylesheet">
     <!-- Fichier CSS -->
     <link rel="stylesheet" href="style.css">
     <title>Bibliothèque Parici - Parlabas</title>
    </head>
    

<!-- HEADER -->
<?php include 'includes/header.php';?>


            <!-- Nav bar avec menu déroulant -->
            <nav class="collapse navbar-collapse container d-flex justify-content-center ml-4 p-0 mt-4 navbar navbar-expand-lg navbar-light">
                    <!-- <div class="" > -->
                        <ul class="navbar-nav" id="navbarNavDropdown">
                            <li class="col-xl-3 col-md-2 nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Menu
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Les livres</a>
                                    <a class="dropdown-item" href="#">Les catégories</a>
                                    <a class="dropdown-item" href="#">Les auteurs</a>
                                    <a class="dropdown-item" href="#">Bibliothèque numérique</a>
                                    <a class="dropdown-item" href="contact.php">Nous contacter</a>
                                </div>
                            </li>
                            <li class="col-xl-3 col-md-2 nav-item">
                                <a class="nav-link" href="#">Infos</span></a>
                            </li>
                            <li class="col-xl-3 col-md-2 nav-item">
                                <a class="nav-link" href="#">Agenda</a>
                            </li>
                            <li class="col-xl-3 col-md-2 nav-item">
                                <a class="nav-link" href="#">Ressources</a>
                            </li>
                        </ul>
                    <!-- </div> -->
            </nav>

            <!-- Actus + en un clic -->
            <div class="container row mx-auto mt-5">
                <div class="col-xl-6 col-md-0 img">
                    <!-- <span></span> -->
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="row">
                        <span class="fs50 mt-5 col-xl-8 col-md-12 text-center">En un clic</span>
                        <img class="col-xl-4 corner" src="Img/Corner en un clic.png" alt="">
                    </div>
                    <div class="infos-click">
                        <div class="row mb-5 mt-5">
                        <div class="col-4">
                            <img src="Img/Inscription1.png" alt="">
                        </div>
                        <div class="col-4">
                            <img src="Img/Nous trouver.png" alt="">
                        </div>
                        <div class="col-4">
                            <img src="Img/Nos livres.png" alt="">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-4">
                            <img src="Img/espace pro.png" alt="">
                        </div>
                        <div class="col-4">
                            <img src="Img/Accessibilité.png" alt="">
                        </div>
                        <div class="col-4">
                            <img src="Img/Aide.png" alt="">
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sliders "les petis nouveaux" -->
            <div class="mt-5 mb-5 container-fluid">
                <span class="fs50 d-block">Les petits nouveaux</span>
                <div class="container-slick">
                    <div class="slick-carousel">
                        <div><img src="Img/1.jpg" alt=""></div>
                        <div><img src="Img/2.jpg" alt=""></div>
                        <div><img src="Img/3.jpg" alt=""></div>
                        <div><img src="Img/4.jpg" alt=""></div>
                        <div><img src="Img/5.jpg" alt=""></div>
                        <div><img src="Img/6.jpg" alt=""></div>
                        <div><img src="Img/7.jpg" alt=""></div>
                        <div><img src="Img/8.jpg" alt=""></div>
                        <div><img src="Img/9.jpg" alt=""></div>
                        <div><img src="Img/a.jpg" alt=""></div>
                        <div><img src="Img/11.jpg" alt=""></div>
                        <div><img src="Img/12.jpg" alt=""></div>
                        <div><img src="Img/13.jpg" alt=""></div>
                    </div>  
                </div>
            </div>

            <!-- Slider Events -->
            <div id="carouselExampleIndicators" class="carousel mb-5 container-fluid" data-ride="carousel">
                <!-- <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> -->
                <div class="d-block w-100 carousel-inner">

                    <div class="carousel-item active">
                        <div class="img-event">
                            <img class="" src="Img/sliders2-1.svg" alt="First slide">
                        </div>
                        <div class="bloc-text">
                            <h4 class="fs50">Le mois de l'imaginaire</h4>
                            <p>La Bibliothèque municipale participe à la cinquième édition 
                            du Mois de l’imaginaire,lancé par les éditeurs spécialisés dans lesdomainesde la science-fiction, fantasy et.
                            La Bibliothèque municipale participe à la cinquième édition du Moisdel’imaginaire,lancé par les éditeurs spécialisés dans les domaines delascience-fiction, fantasy et</p>
                            <button class="date">Du 2 Janvier au 15 Mars 2036</button>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div>
                            <img class=" " src="Img/slider_chat.png" alt="Second slide">
                        </div>
                        <div class="bloc-text">
                            <h4 class="fs50">Dimanche lectures</h4>
                            <p>La Bibliothèque municipale participe à la cinquième édition 
                            du Mois de l’imaginaire,lancé par les éditeurs spécialisés dans lesdomainesde la science-fiction, fantasy et.
                            La Bibliothèque municipale participe à la cinquième édition du Moisdel’imaginaire,lancé par les éditeurs spécialisés dans les domaines delascience-fiction, fantasy et</p>
                            <button class="date">Du 2 Janvier au 15 Mars 2036</button>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div>
                            <img class="" src="Img/slider_livre.png" alt="Third slide">
                        </div>
                        <div class="bloc-text">
                            <h4 class="fs50">Les lectures du week-end</h4>
                            <p>La Bibliothèque municipale participe à la cinquième édition 
                            du Mois de l’imaginaire,lancé par les éditeurs spécialisés dans lesdomainesde la science-fiction, fantasy et.
                            La Bibliothèque municipale participe à la cinquième édition du Moisdel’imaginaire,lancé par les éditeurs spécialisés dans les domaines delascience-fiction, fantasy et</p>
                            <button class="date">Du 2 Janvier au 15 Mars 2036</button>
                        </div>
                        
                     </div> 

                </div>





                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <!-- <span class="sr-only">Previous</span> -->
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <!-- <span class="sr-only">Next</span> -->
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>

           <!-- TOP LECTURES -->
            <div class="topreading row container-fluid mt-5">
                <ul class="col-2 categories">
                    <span>catégories</span>
                    <li><a href="">Roman policiers</a></li>
                    <li><a href="">Romantique</a></li>
                    <li><a href="">Développement personnel</a></li>
                    <li><a href="">Fiction</a></li>
                    <li><a href="">Documentaire</a></li>
                    <li><a href="">Biographie</a></li>
                    <li><a href="">Jeunesse</a></li>
                    <li><a href="">Psychologie</a></li>
                    <li><a href="">Santé</a></li>
                    <li><a href="">Tout nos livres</a></li>
                </ul> 
                <div class="col-10">
                    <div class="titre-topreading">Top lectures</div>
                    <div class="d-flex justify-content-between p-4">
                        <!-- Cards bootstrap img+text -->
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="Img/card1.png" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Fucking titre</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="btn-livre">Voir ce livre</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="Img/card2.png" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Fucking titre</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="btn-livre">Voir ce livre</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="img/card3.png" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Fucking titre</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="btn-livre">Voir ce livre</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>


     

<script src="indexjs.js"></script>
<!-- JQUERY  désactiver car disabled drop down menu bootstrap -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- SLICK -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- My JS -->
        
</body>
</html>