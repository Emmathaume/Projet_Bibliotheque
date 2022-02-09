<?php include '../config/config.php'; ?>
<!-- Ajouter un livre -->
<!-- connexion a la bdd -->
<?php include '../bdd.php';?>

<!-- Permet de recuperer les infos bdd pour les afficher -->
<?php 
// var_dump($_GET);
    // récupéré l'id transmis en get via l'url en
    if (isset($_GET['id'])) {
        // var_dump($_GET);
        // enregistrer l'info dans une variable en intval 
        $id = intval($_GET['id']);
        // var_dump($id);
        // autre couche de écurité si id > a 0
        // intval transform en 0 si c'est un string
        if ($id > 0) {
            // creer la requete sql pour
            $sql = "SELECT * FROM livre WHERE id= ?";

            // utiliser la methode prepare (dnc drapeau)
            $requete = $bdd->prepare($sql);
            // var_dump($requete);

            // execute avec un array contenant la valeur
            $requete->execute(array($id));
            // var_dump($requete);
            // $requete->errorInfo();
            // fetch pour récupérer les infos de la bdd      
            $livres= $requete->fetch(PDO::FETCH_ASSOC);
            // var_dump($livres);
        } // else (id < 0 ) donc on repart a l'index
        else {
            // rediriger vers index.php'
            header('location:index.php');
        }
        
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom fonts for this template-->
    <link href="<?= URL_ADMIN?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= URL_ADMIN?>css/sb-admin-2.min.css" rel="stylesheet">
    <title>Modifier un Livre</title>
</head>
<body>

    <?php include PATH_ADMIN.'includes/sidebar.php';?>

    <?php include PATH_ADMIN.'includes/topbar.php';?>

<!-- FORMULAIRE D'AJOUT -->
<div class="container">
    <form action="<?= URL_ADMIN?>Livres/action.php" method="POST">
        <input type="hidden" name="id" value="<?= $livres['id']?>">
        <div class="mb-3">
            <label for="num_isbn" class="form-label">Numéro ISBN : </label>
            <input type="text" name="num_ISBN" class="form-control" value="<?= $livres['num_ISBN'] ?>">
        </div>
        <div class="mb-3">
            <label for="titre" class="form-label">Titre :</label>
            <input type="text" name="titre" class="form-control" value="<?= $livres['titre'] ?>">
        </div>
        <div class="mb-3">
            <label for="illustration" class="form-label">Illustration :</label>
            <input type="file" name="illustration" class="form-control">
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Résumé :</label>
            <input type="text" name="resume" class="form-control" value="<?= $livres['resume'] ?>">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix location :</label>
            <input type="text" name="prix" class="form-control" value="<?= $livres['prix'] ?>">
        </div>    
        <div class="mb-3">
            <label for="nbre_page" class="form-label">Nombre de pages :</label>
            <input type="text" name="nb_pages" class="form-control" value="<?= $livres['nb_pages'] ?>">
        </div>        
        <div class="mb-3">
            <label for="date" class="form-label">Date d'achat :</label>
            <input type="text" name="date" class="form-control" value="<?= $livres['date_achat'] ?>">
        </div>
            <div class="text-center mb-3">
            <input type="submit" name="btn_update_book" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
</div>


<?php include PATH_ADMIN . 'includes/footer.php';?>
