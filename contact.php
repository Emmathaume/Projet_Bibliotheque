<!DOCTYPE html>
 <html lang="fr">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Fontawesome -->
     <script src="https://kit.fontawesome.com/7e0d33e192.js" crossorigin="anonymous"></script>
     <!-- Slick -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- FONTS -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;700&display=swap" rel="stylesheet">
     <!-- Fichier CSS -->
     <link rel="stylesheet" href="indexcss.css">
     <link rel="stylesheet" href="Contact.css">
     <title>Bibliothèque Parici - Parlabas</title>
    </head>

    <!-- header generer en php -->
   <?php 
    include "includes/header.php"; ?>

    <div class="container-form d-flex justify-content-center mt-5">
        <form action="" method="">
            <h1 class="mb-3 text-center">NOUS-CONTACTER</h1>
            <label for="nom">Nom :</label>
            <input type="text" name="nom">
            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom">
            <label for="mail">E-mail :</label>
            <input type="mail" name="mail">
            <label for="objet">Objet :</label>
            <input type="text" name="objet">
            <label for="message">Votre message :</label>
            <textarea id="message" name="message" rows="5" cols="33"></textarea>
            <input class="btn_form1" type="submit" name="btn_form" value="Envoyer">
        </form>
    </div>

    <!-- footer generé en php -->
    <?php
    include "includes/footer.php";
    ?>