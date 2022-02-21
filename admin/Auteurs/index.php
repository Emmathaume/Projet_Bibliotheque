<!-- Liste tout les clients -->
<?php include "../config/config.php";?>
<?php include "../bdd.php";?>
<!-- function isConnect -->
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
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
    <link href="<?= URL_ADMIN ?>css/sb-admin-2.min.css" rel="stylesheet">

    <title>Liste de tout les auteurs</title>
</head>
<body>

<?php include PATH_ADMIN . 'includes/sidebar.php';?>

<?php include PATH_ADMIN . 'includes/topbar.php';?>


<!-- RECUPERER TOUT LES AUTEURS EN BDD -->
<?php 

    // ENREGISTRER LA REQUETE SQL
    $sql = "SELECT * FROM auteur ";
    // UTILISER LA METHODE QUERY POUR TRANSMMETTRE LA REQUETE A LA BDD LA REQUET
    $requete = $bdd->query($sql);
    // AFFICHER AVEC FETCHALL + SON PARAMETRE D'AFFICHAGE
    $auteurs = $requete->fetchAll(PDO::FETCH_ASSOC);
    // L'INCLURE DANS UN ELEMENT html POUR UN AFFICHAGE PROPRE
?>

<div class="container">
    <!-- gestion alerte error -->
<?php
    if (isset($_SESSION['error_add_auteur']) && $_SESSION['error_add_auteur']==true) {
        alert('success',"L'auteur à bien été ajouté");
        unset($_SESSION['error_add_auteur']);
    }
    
    if (isset($_SESSION['error_update_auteur']) && $_SESSION['error_update_auteur']==true){
        alert ('success','Votre auteur à bien été modifier');
        unset($_SESSION['error_update_auteur']);
    }

    if (isset($_SESSION['error_delete_auteur']) && $_SESSION['error_delete_auteur']==false){
        alert('danger',"L'auteur n'as pas pu etre supprimé sorry");
        unset($_SESSION['error_delete_auteur']);
    }

    if (isset($_SESSION['error_delete_auteur']) && $_SESSION['error_delete_auteur'] == true ) {
        alert('success',"L'auteur à bien été supprimé");
        unset($_SESSION['error_delete_auteur']);
    }
?>
    <table class="table-responsive">
    <thead>
        <tr>
        <th scope="col">Nom </th>
        <th scope="col">Prénom</th>
        <th scope="col">Nom de plume</th>
        <th scope="col">Adresse </th>
        <th scope="col">Ville</th>
        <th scope="col">Code Postal</th>
        <th scope="col">Mail</th>
        <th scope="col">Numero</th>
        <th scope="col">photo</th>
        <th scope="col">Voir</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody> 
        <!-- BOUCLE AFFICHAGE INFOS BDD -->
        <?php foreach($auteurs as $auteur) : ?>
        <tr> 
            <td scope="row"><?= $auteur['nom']?></td>
            <td><?= $auteur['prenom']?></td>
            <td><?= $auteur['nom_de_plume']?></td>
            <td><?= $auteur['adresse']?></td>
            <td><?= $auteur['ville']?></td>
            <td><?= $auteur['code_postal']?></td>
            <td><?= $auteur['mail']?></td>
            <td><?= $auteur['numero']?></td>
            <td><img src="<?= URL_ADMIN . 'img/avatar_utilisateur/' . $auteur['photo']?>" height="100px" width="100px" alt="photo de l'auteur"></td>
            <td><a href="<?= URL_ADMIN ?>Auteurs/single.php?id=<?= $auteur['id']?>" class="btn btn-success">Voir</a></td>
            <td><a href="<?= URL_ADMIN ?>Auteurs/update.php?id=<?= $auteur['id']?>" class="btn btn-warning">Modifier</a></td>
            <td><a href="<?= URL_ADMIN ?>Auteurs/action.php?id=<?= $auteur['id']?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php endforeach;?>

    </tbody>
    </table>
</div>


<?php include PATH_ADMIN.'includes/footer.php';?>
