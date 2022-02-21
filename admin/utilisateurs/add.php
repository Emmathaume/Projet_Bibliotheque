<?php include '../config/config.php'; ?>
<!-- connexion a la bdd -->
<?php include PATH_ADMIN.'bdd.php';?>
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
    <link href="<?= URL_ADMIN?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= URL_ADMIN?>css/sb-admin-2.min.css" rel="stylesheet">
    <title>Ajouter un utilisateur</title>
</head>
<body>

    <?php include PATH_ADMIN.'includes/sidebar.php';?>

    <?php include PATH_ADMIN.'includes/topbar.php';?>

<!-- FORMULAIRE D'AJOUT -->
<div class="container">
    <!-- gestion alert error -->
<?php
    if (isset($_SESSION['error_add_utilisateur']) && $_SESSION['error_add_utilisateur']==false){
        alert ('danger',"Votre utilisateur n'as pas correctement été ajouter veuillez recommencer");
        unset($_SESSION['error_add_utilisateur']);
    }
?>
    <form action="<?= URL_ADMIN?>utilisateurs/action.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom : </label>
            <input type="text" name="nom" class="form-control">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom :</label>
            <input type="text" name="prenom" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo :</label>
            <input type="text" name="pseudo" class="form-control">
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Mail :</label>
            <input type="mail" name="mail" class="form-control">
        </div>
        <div class="mb-3">
            <label for="mot_de_passe" class="form-label">Mot de passe:</label>
            <input type="password" name="mot_de_passe" class="form-control">
        </div>    
        <div class="mb-3">
            <label for="num_telephone" class="form-label">Telephone :</label>
            <input type="text" name="num_telephone" class="form-control">
        </div>        
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar :</label>
            <input type="file" name="avatar" class="form-control">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse :</label>
            <input type="text" name="adresse" class="form-control">
        </div> 
        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" name="ville" class="form-control">
        </div> 
        <div class="mb-3">
            <label for="code_postal" class="form-label">Code postal :</label>
            <input type="text" name="code_postal" class="form-control">
        </div> 
            <div class="text-center mb-3">
            <input type="submit" name="btn_add_utilisateur" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
</div>


<?php include PATH_ADMIN . 'includes/footer.php';?>
