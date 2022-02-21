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

    <title>Ajouter un livre</title>
</head>
<body>

    <?php include '../includes/sidebar.php';?>

    <?php include '../includes/topbar.php';?>

<!-- Recuperer les infos livres en bdd -->
<?php 
    // creer la requete SQL
    $sql= "SELECT * FROM etat_livre 
    INNER JOIN etat ON etat.id = etat_livre.id_etat
    INNER JOIN livre ON livre.id = etat_livre.id_livre";
    // utilise la methode query pour envoyer la requete a la bdd -->
    $requete = $bdd->query($sql);
    // faire un fetchall pour permettre d'afficher toutes les occurence de la table récupéré
    $livres= $requete->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
    <!-- gestion alerte error -->
<?php
    // AJOUT OK 
    if (isset($_SESSION['error_add_book']) && $_SESSION['error_add_book']==true){
        alert ('success',"Votre livre à bien été ajouter");
        unset($_SESSION['error_add_book']);
    }
    // MODIF OK 
    if (isset($_SESSION['error_update_book']) && $_SESSION['error_update_book'] = true) {
        alert ('success',"Votre livre à bien été modifié");    
        unset($_SESSION['error_update_book']);
    }
    // ERROR DELETE
    if (isset($_SESSION['error_delete_book']) && $_SESSION['error_delete_book'] == false) {
        alert ('danger','Une erreur est survenue veuillez recommencer');
        unset($_SESSION['error_delete_book']);
    }
    // OK DELETE
    if (isset($_SESSION['error_delete_book']) && $_SESSION['error_delete_book'] == true) {
        alert ('success','Le livre à bien été supprimé');
        unset($_SESSION['error_delete_book']);
    }

?>
    <table class="table-responsive">
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
        <th scope="col">Etat</th>
        </tr>
    </thead>
    <tbody> 
        <!-- BOUCLE AFFICHAGE INFOS BDD -->
        <?php foreach($livres as $livre) : ?>

            <!-- gestion affichage dispo text / date-->
            <?php 
                $date = new DateTime($livre['date_achat']);

                if (isset($livre['disponibilite']) && $livre['disponibilite'] == 0){
                    $dispo = 'Disponible';
                }else {
                    $dispo = 'En location';
                }   
            ?>
        <tr> 
            <td scope="row"><?= $livre['num_ISBN']?></td>
            <td><a href='<?=URL_ADMIN?>Livres/single.php?id=<?= $livre['id']?>'><?= $livre['titre']?> </a></td>
            <td><img src="<?= '../../Img/'. $livre['illustration']?>" height="100px" width="70px" alt="illustration du livre"></td>
            <td class="w-break"><?= substr($livre['resume'],0,100 )?></td>
            <td><?= $livre['prix']?> €</td>
            <td><?= $livre['nb_pages']?></td>
            <td><?= $date->format('d/m/Y')?></td>
            <td><?= $dispo?></td>
            <td><?= $livre['libelle']?></td>
            <td>
            <a href="http://localhost/Projet_Bibliotheque/admin/Livres/update.php?id=<?= $livre['id']?>" class="btn btn-warning">Modifier</a>
            <a href="http://localhost/Projet_Bibliotheque/admin/Livres/action.php?id=<?= $livre['id']?>" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
        <?php endforeach;?>

    </tbody>
    </table>
</div>


<?php include '../includes/footer.php';?>