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
    <link href="<?= URL_ADMIN?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= URL_ADMIN?>css/style.css" rel="stylesheet">

    <title>Voir un livre</title>
</head>
<body>

    <?php include '../includes/sidebar.php';?>

    <?php include '../includes/topbar.php';?>

    
<!-- Recuperer les infos du livre en bdd -->
<?php 
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        // creer la requete SQL
        $sql = 'SELECT livre.id, livre.num_ISBN, livre.titre, livre.illustration, livre.resume, livre.prix, livre.nb_pages, livre.date_achat, livre.disponibilite, auteur.nom_de_plume,auteur.id AS auteur_id, categorie_livre.id_categorie, categorie.libelle
        FROM auteur_livre
        INNER JOIN livre ON auteur_livre.id_livre = livre.id
        INNER JOIN auteur ON auteur_livre.id_auteur = auteur.id
        INNER JOIN categorie_livre ON livre.id = categorie_livre.id_livre
        INNER JOIN categorie ON categorie.id = categorie_livre.id_categorie
        WHERE livre.id = :id';
        // utilise la methode prepare pour envoyer la requete a la bdd -->
        $requete = $bdd->prepare($sql);
        $requete->execute(array(':id'=>$id));
        // faire un fetchall pour permettre d'afficher toutes les occurence de la table récupéré
        $livre= $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($livre);
        // die;
    }
?>


<div class="container">
    <table class="table-responsive">
    <thead>
        <tr>
        <th scope="col">Num° ISBN </th>
        <th scope="col">Titre</th>
        <th scope="col">Illustration</th>
        <th scope="col">Résumé</th>
        <th scope="col">Auteur</th>
        <th scope="col">Prix de location</th>
        <th scope="col">Nombre de pages</th>
        <th scope="col">Date d'achat</th>
        <th scope="col">Disponibilité</th>
        </tr>
    </thead>
    <tbody> 
        
<!-- Gestion date/ text dispo -->
<?php
    $date = new DateTime($livre['date_achat']);
    if (isset($livre['disponibilite']) && $livre['disponibilite'] == 0){
        $dispo = 'Disponible';
    }else {
        $dispo = 'En location';
    }  
?>
        <tr> 
            <td class='p-3' scope="row"><?= $livre['num_ISBN']?></td>
            <td class='p-3'><?= $livre['titre']?></td>
            <td class='p-3'><img src="<?= URL_ADMIN . 'img/illustration/' . $livre['illustration']?>" height="150px" width="100px" alt="illustration du livre"></td>
            <td class="p-3 w-break"><?= substr($livre['resume'],0,100 )?>... </br> <b>Catégories :</b><?=$livre['libelle']  ?></td>
            <td class='p-3'><a href= "<?= URL_ADMIN ?>Auteurs/single.php?id=<?= $livre['auteur_id']?>"><?= $livre['nom_de_plume']?></a></td>
            <td class='p-3'><?= $livre['prix']?> €</td>
            <td class='p-3'><?= $livre['nb_pages']?></td>
            <td class='p-3'><?= $date->format('d/m/Y')?></td>
            <td class='p-3'><?= $dispo ?></td>

        </tr> 
        <tr>
            <td colspan="12" class="text-center">
                <a href="<?= URL_ADMIN?>Livres/update.php?id=<?= $livre['id']?>" class="btn btn-warning">Modifier</a>
                <a href="<?= URL_ADMIN?>Livres/action.php?id=<?= $livre['id']?>" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
    </tbody>
    </table>
</div>

<div class="container mt-5">
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th class="text-center" colspan="4">Historique de location</th>
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

