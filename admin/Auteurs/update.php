<!-- LISTE LES AUTEURS-->
<?php  include '../config/config.php'; ?>
<!-- connexion a la bdd -->
<?php include PATH_ADMIN.'bdd.php';?>

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
            $sql = "SELECT * FROM auteur WHERE id= ?";

            // utiliser la methode prepare (dnc drapeau)
            $requete = $bdd->prepare($sql);
            // var_dump($requete);

            // execute avec un array contenant la valeur
            $requete->execute(array($id));
            // var_dump($requete);
            // $requete->errorInfo();
            // fetch pour récupérer les infos de la bdd      
            $auteur= $requete->fetch(PDO::FETCH_ASSOC);
            // var_dump($auteur);
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
    <title>Modifier un auteur</title>
</head>
<body>

    <?php include PATH_ADMIN.'includes/sidebar.php';?>

    <?php include PATH_ADMIN.'includes/topbar.php';?>

<!-- FORMULAIRE D'AJOUT -->
<div class="container">
    <form action="<?= URL_ADMIN?>/Auteurs/action.php" method="POST">
        <input type="hidden" name="id" value=" <?= $auteur['id']?>">
        <div class="mb-3">
            <label for="nonm" class="form-label">Nom : </label>
            <input type="text" name="nom" class="form-control" value="<?= $auteur['nom']?>">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" name="prenom" class="form-control" value="<?= $auteur['prenom']?>">
        </div>
        <div class="mb-3">
            <label for="nom_de_plume" class="form-label">Nom de plume :</label>
            <input type="text" name="nom_de_plume" class="form-control" value="<?= $auteur['nom_de_plume']?>">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Addresse :</label>
            <input type="text" name="adresse" class="form-control" value="<?= $auteur['adresse']?>">
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" name="ville" class="form-control" value="<?= $auteur['ville']?>">
        </div>
        <div class="mb-3">
            <label for="code_postal" class="form-label">Code postal :</label>
            <input type="text" name="code_postal" class="form-control" value="<?= $auteur['code_postal']?>">
        </div>    
        <div class="mb-3">
            <label for="mail" class="form-label">Mail :</label>
            <input type="email" name="mail" class="form-control" value="<?= $auteur['mail']?>">
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Numero :</label>
            <input type="text" name="numero" class="form-control" value="<?= $auteur['numero']?>">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo :</label>
            <input type="file" name="photo" class="form-control">
        </div>
            <div class="text-center mb-3">
            <input type="submit" name="btn_update_auteur" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
</div>


<?php include PATH_ADMIN . 'includes/footer.php';?>