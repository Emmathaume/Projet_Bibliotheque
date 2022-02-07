<!-- LISTE TOUT LES LIVRES -->

<!-- connexion a la bdd -->
<?php include '../bdd.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <title>Ajouter un livre</title>
</head>
<body>

    <?php include '../includes/sidebar.php';?>

    <?php include '../includes/topbar.php';?>

    
<!-- Recuperer les infos livres en bdd -->
<?php 
    // creer la requete SQL
    $sql = 'SELECT * FROM livre';
    // var_dump($sql);
    // utilise la methode query pour envoyer la requete a la bdd -->
    $requete = $bdd->query($sql);
    // var_dump($requete);
    // faire un fetchall pour permettre d'afficher toutes les occurence de la table récupéré
    $livres= $requete->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($livres);

?>


<div class="container">
    <table class="table">
    <thead>
        <tr>
        <!-- <th scope="col">ID </th> -->
        <th scope="col">Num° ISBN </th>
        <th scope="col">Titre</th>
        <th scope="col">Illustration</th>
        <th scope="col">Résumé</th>
        <th scope="col">Prix de location</th>
        <th scope="col">Nombre de pages</th>
        <th scope="col">Date d'achat</th>
        <th scope="col">Disponibilité</th>
        </tr>
    </thead>
    <tbody> 
        <!-- BOUCLE AFFICHAGE INFOS BDD -->
        <?php foreach($livres as $livre) : ?>
          <!-- <?php var_dump($livre) ?> -->
        <tr> 
            <td scope="row"><?= $livre['num_ISBN']?></td>
            <td><?= $livre['titre']?></td>
            <td><?= $livre['illustration']?></td>
            <td><?= $livre['resume']?></td>
            <td><?= $livre['prix']?></td>
            <td><?= $livre['nb_pages']?></td>
            <td><?= $livre['date_achat']?></td>
            <td><?= $livre['disponibilite']?></td>
            <td><a href="http://localhost/Projet_Bibliotheque/admin/Livres/single.php?id=<?= $livre['id']?>" class="btn btn-success">Voir</a></td>
            <td><a href="http://localhost/Projet_Bibliotheque/admin/Livres/update.php?id=<?= $livre['id']?>" class="btn btn-warning">Modifier</a></td>
            <td><a href="http://localhost/Projet_Bibliotheque/admin/Livres/action.php?id=<?= $livre['id']?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php endforeach;?>

    </tbody>
    </table>
</div>


<?php include '../includes/footer.php';?>