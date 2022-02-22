<?php include '../config/config.php'; ?>
<!-- Ajouter un livre -->
<!-- connexion a la bdd -->
<?php include '../bdd.php';?>
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>
<!-- Permet de recuperer les infos du livre pour les afficher -->
<?php 
    // récupéré l'id transmis en get via l'url en
    if (isset($_GET['id'])) {
        // enregistrer l'info dans une variable en intval 
        $id = intval($_GET['id']);
        // autre couche de écurité si id > a 0
        // intval transform en 0 si c'est un string
        if ($id > 0) {
            // creer la requete sql pour
            $sql = "SELECT * FROM livre WHERE id= ?";
            // utiliser la methode prepare (dnc drapeau)
            $requete = $bdd->prepare($sql);
            // execute avec un array contenant la valeur
            $requete->execute(array($id));
            // fetch pour récupérer les infos de la bdd      
            $livres= $requete->fetch(PDO::FETCH_ASSOC);
            // var_dump($livres);
            // die;
            // <!-- préselection categorie -->
            // <?php 
                $sql_cat = 'SELECT livre.id AS id_livre,categorie.id AS id_categorie, categorie.libelle
                FROM categorie_livre 
                INNER JOIN livre 
                ON livre.id = categorie_livre.id_livre
                INNER JOIN categorie
                ON categorie.id = categorie_livre.id_categorie
                WHERE livre.id = ?';

                $req_cat= $bdd->prepare($sql_cat);
                $req_cat->execute([$id]);
                $cat_livre = $req_cat->fetchAll(PDO::FETCH_NUM);
                $cat_livre = array_merge([],...$cat_livre);
            

                // <!-- preselection auteur -->
                $sql_auteur = 'SELECT auteur.id as id_auteur, livre.id AS id_livre, auteur.nom_de_plume
                FROM auteur_livre
                INNER JOIN auteur 
                ON auteur.id = auteur_livre.id_auteur
                INNER JOIN livre
                ON livre.id = auteur_livre.id_livre
                WHERE livre.id = ?';

                $req_auteur = $bdd->prepare($sql_auteur);
                $req_auteur->execute([$id]);
                $auteur_livre = $req_auteur->fetchAll(PDO::FETCH_NUM);
                $auteur_livre = array_merge([],...$auteur_livre);


                // <!-- préselection etat -->
                $sql_etat = 'SELECT etat.id as id_etat, livre.id AS id_livre, etat.libelle
                FROM etat_livre
                INNER JOIN etat 
                ON etat.id = etat_livre.id_etat
                INNER JOIN livre
                ON livre.id = etat_livre.id_livre
                WHERE livre.id = ?';

                $req_etat= $bdd->prepare($sql_etat);
                $req_etat->execute([$id]);
                $etat_livre = $req_etat->fetchAll(PDO::FETCH_ASSOC);
                $etat_livre = $etat_livre[0];
                // var_dump($etat_livre);


        }
        else {
            // rediriger vers index.php'
            header('location:index.php');
        }  
    }
?>

<!-- *********AFFICHAGE SELECT 2  *******-->
    <!-- recuperer auteur en bdd -->
    <?php 
        // requete sql
        $sql = 'SELECT nom_de_plume,id FROM auteur';
        // prepare
        $req = $bdd->query($sql);
        // fetchAll
        $name_auteurs = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!-- recuperer catégorie en bdd -->
    <?php 
        // requete sql
        $sql = 'SELECT * FROM categorie';
        // query
        $req = $bdd->query($sql);
        // fetchAll
        $name_categorie = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!-- recuperer Etat en bdd -->
    <?php
        // requete sql
        $sql= 'SELECT * FROM etat';
        // query
        $req = $bdd->query($sql);
        // fetchAll
        $etats = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>
<!-- ******************************** -->




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
    <!-- SELECT 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>Modifier un Livre</title>
</head>
<body>
    <?php include PATH_ADMIN.'includes/sidebar.php';?>
    <?php include PATH_ADMIN.'includes/topbar.php';?>
<!-- FORMULAIRE D'AJOUT -->
<div class="container">
<!-- gestion alerte error -->
<?php 
    if (isset($_SESSION['error_update_book']) && $_SESSION['error_update_book'] = false) {
        alert('danger', "Votre modification n'as pas été prise en compte, veuillez recommencer");
        unset($_SESSION['error_update_book']);
    }
?>
    <form class='row' action="<?= URL_ADMIN?>Livres/action.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $livres['id']?>">
        <div class="col-4 mb-3">
            <label for="num_isbn" class="form-label">Numéro ISBN : </label>
            <input type="text" name="num_ISBN" class="form-control" value="<?= $livres['num_ISBN'] ?>">
        </div>
        <div class="col-4 mb-3">
            <label for="titre" class="form-label">Titre :</label>
            <input type="text" name="titre" class="form-control" value="<?= $livres['titre'] ?>">
        </div>
        <div class="col-4 mb-3">
            <label for="illustration" class="form-label">Illustration :</label>
            <input type="file" name="illustration" class="form-control">
        </div>

        <div class="col-4 mb-3">
            <label for="prix" class="form-label">Prix location :</label>
            <input type="text" name="prix" class="form-control" value="<?= $livres['prix'] ?>">
        </div>    
        <div class="col-4 mb-3">
            <label for="nbre_page" class="form-label">Nombre de pages :</label>
            <input type="text" name="nb_pages" class="form-control" value="<?= $livres['nb_pages'] ?>">
        </div>        
        <div class="col-4 mb-3">
            <label for="date" class="form-label">Date d'achat :</label>
            <input type="text" name="date" class="form-control" value="<?= $livres['date_achat'] ?>">
        </div>
        <div class="col-4 mb-3">
            <label for="auteur" class="form-label">Auteur : </label>
            <select class="js-example-basic-multiple form-control" name="auteur[]" multiple="multiple" style="width: 100%">
                <!-- Option select 2 -->
                <?php 
                    foreach ($name_auteurs as $name_auteur) : ?>
                    <?php
                        if (in_array($name_auteur['nom_de_plume'], $auteur_livre)) {
                            $selected = ' selected';
                        }else {
                            $selected = '';
                        }
                    ?>
                        <option value="<?= $name_auteur['id']?>" <?=$selected ?>><?= $name_auteur['nom_de_plume'] ?></option>
                    <?php endforeach;?>
                ?>
            </select>
        </div>
        <div class="col-4 mb-3">
            <label for="categorie" class="form-label">Catégorie : </label>
            <select class="js-example-basic-multiple form-control" name="categorie[]" multiple="multiple" style="width: 100%">
                <!-- Option select 2 -->
                <?php 
                foreach ($name_categorie as $name_cat) : ?>
                    <?php 
                    var_dump(in_array($name_cat['libelle'],$cat_livre));
                        if (in_array($name_cat['libelle'],$cat_livre)) {
                            $selected = ' selected';
                        }else {
                            $selected = '';
                        }
                    ?>
                    <option value="<?= $name_cat['id']  ?>" <?=$selected?> ><?= $name_cat['libelle'] ?></option>
                <?php endforeach;?>
                ?>
            </select>
        </div>
        <div class="col-4 mb-3">
            <label for="etat" class="form-label">Etat : </label>
            <select class="js-example-basic-multiple form-control" name="etat[]">
                <!-- Option select 2 -->
                <?php 
                    foreach ($etats as $etat) : ?>
                    <?php 
                        if (in_array($etat['libelle'],$etat_livre)) {
                            $selected= ' selected';
                        }else {
                            $selected = '';
                        }
                    ?>
                        <option value="<?= $etat['id']  ?>" <?= $selected ?>><?= $etat['libelle'] ?></option>
                    <?php endforeach;?>
                ?>
            </select>
        </div>
        <div class="col-12 mb-3">
            <label for="resume" class="form-label">Résumé :</label>
            <input type="text" name="resume" class="form-control" value="<?= $livres['resume'] ?>">
        </div>
            <div class="col-12 text-center mb-3">
            <input type="submit" name="btn_update_book" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
</div>


<?php include PATH_ADMIN . 'includes/footer.php';?>
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('resume');
</script>