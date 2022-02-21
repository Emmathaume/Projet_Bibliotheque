<?php include '../config/config.php'; ?>
<!-- AFFICHER UN SEUL CONTACT -->
<?php include PATH_ADMIN.'bdd.php';?>
<!-- function isConnect -->
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>

<!-- requete bdd -->
<?php 
    // recevoir l'id de l'occurence selectionner
    // faire une verification qu'il existe pour executer le code 
    if (isset($_GET['id'])){
        // s'il existe enregistrer + intval pour securit
        $id = intval($_GET['id']);
        // creer la requete sql 
        $sql = "SELECT * FROM auteur WHERE id = :id";
        // prepare de la requette 
        $requete = $bdd->prepare($sql);
        // execute
        $requete->execute(array(':id' => $id));
        // Recupere les infos bdd
        $auteur = $requete->fetch(PDO::FETCH_ASSOC);
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
    <title>Fiche auteur</title>
</head>
<body>

    <?php include '../includes/sidebar.php';?>

    <?php include '../includes/topbar.php';?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom de plume</th>
            <th scope="col">Adresse</th>
            <th scope="col">Ville</th>
            <th scope="col">Code postal</th>
            <th scope="col">Mail</th>
            <th scope="col">Numero</th>
            <th scope="col">Photo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?= $auteur['nom']?></td>
            <td><?= $auteur['prenom']?></td>
            <td><?= $auteur['nom_de_plume']?></td>
            <td><?= $auteur['adresse']?></td>
            <td><?= $auteur['ville']?></td>
            <td><?= $auteur['code_postal']?></td>
            <td><?= $auteur['mail']?></td>
            <td><?= $auteur['numero']?></td>
            <td><img src="<?= URL_ADMIN . 'img/avatar_utilisateur/' . $auteur['photo']?>" height="200px" width="200px" alt="photo de l'auteur"></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container mt-5">
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th class="text-center" colspan="4">Information locations</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <!-- <th scope="row">1</th> -->
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <!-- <th scope="row">2</th> -->
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <!-- <th scope="row">3</th> -->
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
        </tr>
    </tbody>
    </table>
</div>

    <?php include '../includes/footer.php';?>