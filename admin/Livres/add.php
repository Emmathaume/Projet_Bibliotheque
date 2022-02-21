<?php include '../config/config.php'; ?>
<?php include PATH_ADMIN.'bdd.php';?>
<!-- function isConnect -->
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>

<!-- recuperer auteur en bdd -->
<?php 
    // requete sql
    $sql = 'SELECT nom_de_plume,id FROM auteur';
    // prepare
    $req = $bdd->query($sql);
    // fetchAll
    $name_auteur = $req->fetchAll(PDO::FETCH_ASSOC);
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

    <title>Ajouter un Livre</title>
</head>
<body>

    <?php include PATH_ADMIN.'includes/sidebar.php';?>

    <?php include PATH_ADMIN.'includes/topbar.php';?>

<!-- FORMULAIRE D'AJOUT -->
<div class="container">
    <!-- gestion alerte error -->
    <?php
        if (isset($_SESSION['error_add_book']) && $_SESSION['error_
        _book']==false){
            alert ('danger',"Votre livre n'as pas correctement été ajouter veuillez recommencer");
            unset($_SESSION['error_add_book']);
        }
    ?>
    <form class= "row" action="<?= URL_ADMIN?>Livres/action.php" method="POST" enctype="multipart/form-data">
        <div class="col-4 mb-3">
            <label for="num_isbn" class="form-label">Numéro ISBN : </label>
            <input type="text" name="num_isbn" class="form-control">
        </div>
        <div class="col-4 mb-3">
            <label for="titre" class="form-label">Titre :</label>
            <input type="text" name="titre" class="form-control">
        </div>
        <div class="col-4 mb-3">
            <label for="illustration" class="form-label">Illustration :</label>
            <input type="file" name="illustration" class="form-control">
        </div>

        <div class="col-4 mb-3">
            <label for="prix" class="form-label">Prix location :</label>
            <input type="text" name="prix" class="form-control">
        </div>    
        <div class="col-4 mb-3">
            <label for="nbre_page" class="form-label">Nombre de pages :</label>
            <input type="text" name="nbre_page" class="form-control">
        </div>        
        <div class="col-4 mb-3">
            <label for="date" class="form-label">Date d'achat :</label>
            <input type="date" name="date" class="form-control">
        </div>
        <div class="col-8 mb-3">
            <label for="auteur" class="form-label">Auteur :</label>
            <select class="js-example-basic-multiple form-control" name="auteurs[]" multiple="multiple" style="width: 100%">
            <!-- Option select 2 -->
                <?php 
                    for ($i=0; $i < count($name_auteur) ; $i++) : ?>
                        <option value="<?= $name_auteur[$i]['id']  ?>"><?= $name_auteur[$i]['nom_de_plume'] ?></option>
                    <?php endfor;?>
                ?>
            </select>
        </div>
        <div class="col-4 mb-3">
            <label for="date_ecriture" class="form-label">Date d'écriture :</label>
            <input type="date" name="date_ecriture" class="form-control">
        </div>
        <div class="col-8 mb-3">
        <label for="categorie" class="form-label">Catégories :</label>
        <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple" style="width: 100%">
        <!-- Option select 2 -->
            <?php 
                for ($i=0; $i < count($name_categorie) ; $i++) : ?>
                    <option value="<?= $name_categorie[$i]['id']  ?>"><?= $name_categorie[$i]['libelle'] ?></option>
                <?php endfor;?>
            ?>
        </select>
        </div>
        <div class="col-4 mb-3">
            <label for="etat" class="form-label">État :</label>
            <select class="js-example-basic-multiple form-control" name="etats[]"  style="width: 100%">
            <!-- Option select 2 -->
                <?php 
                    foreach ($etats as $etat) : ?>
                        <option value="<?= $etat['id']  ?>"><?= $etat['libelle'] ?></option>
                    <?php endforeach;?>
                ?>
            </select>
        </div>
        <div class="col-12 mb-3">
        <!-- <div class=" mb-3"> -->
            <textarea name="resume" id='resume' cols="30" rows="10"></textarea>
        <!-- </div> -->
        </div>
            <div class="col-12 text-center mb-3">
            <input type="submit" name="btn_add_book" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
</div>


<?php include PATH_ADMIN . 'includes/footer.php';?>
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('resume');
</script>