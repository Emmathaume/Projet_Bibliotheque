<!-- Liste tout les clients -->
<?php include "../bdd.php";?>
<?php include "../config/config.php";?>

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

    <title>Liste de tout les clients</title>
</head>
<body>

<?php include PATH_ADMIN . 'includes/sidebar.php';?>

<?php include PATH_ADMIN . 'includes/topbar.php';?>


<!-- RECUPERER TOUT LES USAGERS EN BDD -->
<?php 

    // ENREGISTRER LA REQUETE SQL
    $sql = "SELECT * FROM usager ";
    // var_dump($sql);
    // UTILISER LA METHODE QUERY POUR TRANSMMETTRE LA REQUETE A LA BDD LA REQUET
    $requete = $bdd->query($sql);
    // var_dump($requete);
    // AFFICHER AVEC FETCHALL + SON PARAMETRE D'AFFICHAGE
    $usagers = $requete->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($usagers);
    // L'INCLURE DANS UN ELEMENT html POUR UN AFFICHAGE PROPRE
?>

<div class="container">
    <table class="table">
    <thead>
        <tr>
        <!-- <th scope="col">ID </th> -->
        <th scope="col">Nom </th>
        <th scope="col">Prénom</th>
        <th scope="col">Adresse </th>
        <th scope="col">Ville</th>
        <th scope="col">Code Postal</th>
        <th scope="col">Mail</th>
        <th scope="col">Voir</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody> 
        <!-- BOUCLE AFFICHAGE INFOS BDD -->
        <?php foreach($usagers as $usager) : ?>
          <!-- <?php var_dump($usager) ?> -->
        <tr> 
            <td scope="row"><?= $usager['nom']?></td>
            <td><?= $usager['prenom']?></td>
            <td><?= $usager['adresse']?></td>
            <td><?= $usager['ville']?></td>
            <td><?= $usager['code_postal']?></td>
            <td><?= $usager['mail']?></td>
            <td><a href="<?= URL_ADMIN ?>Client/single.php?id=<?= $usager['id']?>" class="btn btn-success">Voir</a></td>
            <td><a href="<?= URL_ADMIN ?>Client/update.php?id=<?= $usager['id']?>" class="btn btn-warning">Modifier</a></td>
            <td><a href="<?= URL_ADMIN ?>Client/action.php?id=<?= $usager['id']?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php endforeach;?>

    </tbody>
    </table>
</div>


<?php include PATH_ADMIN.'includes/footer.php';?>
