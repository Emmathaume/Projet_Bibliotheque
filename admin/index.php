<!-- chargement de la config -->
<?php include 'config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Custom fonts for this template-->
        <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= URL_ADMIN ?>css/sb-admin-2.min.css" rel="stylesheet">

    <title>Espace Administrateur</title>
</head>
<body>
<!-- Connexion a la bdd -->
<?php include 'bdd.php'?>



        <?php include 'includes/sidebar.php';?>

        <?php include 'includes/topbar.php';?>





<!-- PERMET D'AFFICHER TOUT LES TITRE DES LIVRES -->
<!-- <?php 
    // Enregistre l'ordre a envoyer a notre bdd en format sql
    $sql = 'SELECT * FROM livre';

    // utilisation de la méthode query lié a l'objet PDO qui permet de transmetttre l'ordre SQL 
    // et stockage dans une variable $requete par exemple
    $requete = $bdd->query($sql);
    // var_dump($requete);
    // var_dump($bdd); 

    // on utilise requete qui est un objet PDO statement et on lui applique la methode fetchALL 
    // pour permettre l'affichage de l'odre sql envoyé il prend en paramètre le format du retour 
    // PDO fait appelle a l'objet , les :: permettent d'utiliser l'objet sans l'instancié, 
    // et FETCH_ASSOC est le format (il en existe d'autre)
    $livres = $requete->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($livres);

    echo '<ul>';
    foreach ($livres as $livre) {
        echo '<li>' . $livre['titre'] .  '</li>';
    }
    echo '</>';
?> -->
        
        
        <?php include 'includes/footer.php';?>

        
    











