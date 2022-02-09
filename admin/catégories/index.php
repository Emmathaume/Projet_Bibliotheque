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

    <title>Liste de toute les catégories</title>
</head>
<body>

<?php include PATH_ADMIN . 'includes/sidebar.php';?>

<?php include PATH_ADMIN . 'includes/topbar.php';?>


<!-- RECUPERER TOUT LES CATEGORIES EN BDD -->
<?php 

    // ENREGISTRER LA REQUETE SQL
    $sql = "SELECT * FROM categorie ";
    // var_dump($sql);
    // UTILISER LA METHODE QUERY POUR TRANSMMETTRE LA REQUETE A LA BDD LA REQUET
    $requete = $bdd->query($sql);
    // var_dump($requete);
    // AFFICHER AVEC FETCHALL + SON PARAMETRE D'AFFICHAGE
    $categories = $requete->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($categories);
    // L'INCLURE DANS UN ELEMENT html POUR UN AFFICHAGE PROPRE
?>

<div class="container">
    <table class="table-responsive">
    <thead>
        <tr>
        <!-- <th scope="col">ID </th> -->
        <th scope="col">ID </th>
        <th scope="col">Libellé</th>

        <th scope="col">Voir</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody> 
        <!-- BOUCLE AFFICHAGE INFOS BDD -->
        <?php foreach($categories as $categorie) : ?>
          <!-- <?php var_dump($categorie) ?> -->
        <tr> 
            <td scope="row"><?= $categorie['id']?></td>
            <td><?= $categorie['libelle']?></td>

            <td><a href="<?= URL_ADMIN ?>catégories/single.php?id=<?= $categorie['id']?>" class="btn btn-success">Voir</a></td>
            <td><a href="<?= URL_ADMIN ?>catégories/update.php?id=<?= $categorie['id']?>" class="btn btn-warning">Modifier</a></td>
            <td><a href="<?= URL_ADMIN ?>catégories/action.php?id=<?= $categorie['id']?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php endforeach;?>

    </tbody>
    </table>
</div>


<?php include PATH_ADMIN.'includes/footer.php';?>
