<?php include '../config/config.php'?>
<!-- connexion a la bdd -->
<?php include '../bdd.php';?>
<!-- function isConnect -->
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>
<!-- function isAdmin -->
<?php 
    if (!isAdmin($bdd)) {
        header('location:../index.php');
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
    <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <title>Affiche tout les utilisateurs</title>
</head>
<body>

    <?php include '../includes/sidebar.php';?>

    <?php include '../includes/topbar.php';?>

<!-- Recuperer les infos utilisateur en bdd -->
<?php 
    // creer la requete SQL
    $sql = 'SELECT utilisateur.id AS id_utilisateur, utilisateur.nom, utilisateur.prenom, utilisateur.pseudo, utilisateur.mail, utilisateur.num_telephone,utilisateur.adresse, utilisateur.ville, utilisateur.code_postal, role.libelle, utilisateur.avatar 
    FROM role_utilisateur 
    INNER JOIN role ON role_utilisateur.id_role = role.id 
    INNER JOIN utilisateur ON role_utilisateur.id_utilisateur = utilisateur.id';
    // utilise la methode query pour envoyer la requete a la bdd -->
    $requete = $bdd->query($sql);
    // faire un fetchall pour permettre d'afficher toutes les occurence de la table récupéré
    $utilisateurs= $requete->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
    <!-- gestion alert error -->
<?php
    if (isset($_SESSION['error_add_utilisateur']) && $_SESSION['error_add_utilisateur']==true){
        alert ('success',"Votre utilisateur à bien été ajouter");
        unset($_SESSION['error_add_utilisateur']);
    }
    if (isset($_SESSION['error_update_utilisateur']) && $_SESSION['error_update_utilisateur']==true){
        alert ('success',"Votre utilisateur à bien été modifié");
        unset($_SESSION['error_update_utilisateur']);
    }
    if (isset($_SESSION['error_delete_utilisateur']) && $_SESSION['error_delete_utilisateur']== false) {
        alert("Une erreur est survenue l'utilisateurs n'as pas été supprimer");
        unset($_SESSION['error_delete_utilisateur']);
    }
    if (isset($_SESSION['error_delete_utilisateur']) && $_SESSION['error_delete_utilisateur']==true) {
        alert('success',"Votre utilisateur a bien été supprimé");
        unset($_SESSION['error_delete_utilisateur']);
    }
?>
    <table class="table-responsive">
    <thead>
        <tr>
        <th scope="col">Nom </th>
        <th scope="col">Prénom </th>
        <th scope="col">Pseudo </th>
        <th scope="col">Mail </th>
        <th scope="col">Telephone</th>
        <th scope="col">Avatar</th>
        <th scope="col">Adresse</th>
        <th scope="col">Ville</th>
        <th scope="col">Code postal</th>
        <th scope="col">Role</th>
        <th scope="col">Voir</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody> 
        <!-- BOUCLE AFFICHAGE INFOS BDD -->
        <?php foreach($utilisateurs as $utilisateur) : ?>
        <tr> 
            <td><?= $utilisateur['nom']?></td>
            <td><?= $utilisateur['prenom']?></td>
            <td><?= $utilisateur['pseudo']?></td>
            <td><?= $utilisateur['mail']?></td>
            <td><?= $utilisateur['num_telephone']?></td>
            <td><img src="<?= URL_ADMIN . 'img/avatar_utilisateur/' . $utilisateur['avatar']?>" height="100px" width="100px" alt="photo de l'auteur"></td>
            <td><?= $utilisateur['adresse']?></td>
            <td><?= $utilisateur['ville']?></td>
            <td><?= $utilisateur['code_postal']?></td>
            <td><?= $utilisateur['libelle']?></td>
            <td><a href="http://localhost/Projet_Bibliotheque/admin/utilisateurs/single.php?id=<?= $utilisateur['id_utilisateur']?>" class="btn btn-success">Voir</a></td>
            <td><a href="http://localhost/Projet_Bibliotheque/admin/utilisateurs/update.php?id=<?= $utilisateur['id_utilisateur']?>" class="btn btn-warning">Modifier</a></td>
            <td><a href="http://localhost/Projet_Bibliotheque/admin/utilisateurs/action.php?id=<?= $utilisateur['id_utilisateur']?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php endforeach;?>

    </tbody>
    </table>
</div>


<?php include '../includes/footer.php';?>