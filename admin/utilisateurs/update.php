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

<!-- Requete affichage bdd -->
<?php 
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        if ($id > 0) {
            $sql = "SELECT * FROM utilisateur WHERE id = ?";
            var_dump($sql);
            $requete = $bdd->prepare($sql);
            $requete->execute(array($id));
            $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
    }else {
        header("Location:index.php");
    }
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
    <title>Modifier un utilisateur</title>
</head>
<body>

    <?php include PATH_ADMIN.'includes/sidebar.php';?>

    <?php include PATH_ADMIN.'includes/topbar.php';?>

<!-- FORMULAIRE D'AJOUT -->
<div class="container">

<!-- gestion alerte error -->
<?php
    if (isset($_SESSION['error_add_book']) && $_SESSION['error_add_book']==false){
        alert ('danger',"Votre livre n'as pas correctement été ajouter veuillez recommencer");
        unset($_SESSION['error_add_book']);
    }
?>
    <form action="<?= URL_ADMIN?>utilisateurs/action.php" method="POST">
    <input type="hidden"  name="id" value="<?= $utilisateur['id'] ?>">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom : </label>
            <input type="text" name="nom" class="form-control" value="<?= $utilisateur['nom'] ?>">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom :</label>
            <input type="text" name="prenom" class="form-control" value="<?= $utilisateur['prenom'] ?>">
        </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo :</label>
            <input type="text" name="pseudo" class="form-control" value="<?= $utilisateur['pseudo'] ?>">
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Mail :</label>
            <input type="mail" name="mail" class="form-control" value="<?= $utilisateur['mail'] ?>">
        </div>
        <div class="mb-3">
            <label for="mot_de_passe" class="form-label">Mot de passe:</label>
            <input type="password" name="mot_de_passe" class="form-control" value="<?= $utilisateur['mot_de_passe'] ?>">
        </div>    
        <div class="mb-3">
            <label for="num_telephone" class="form-label">Telephone :</label>
            <input type="text" name="num_telephone" class="form-control" value="<?= $utilisateur['num_telephone'] ?>">
        </div>        
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar :</label>
            <input type="file" name="avatar" class="form-control" value="<?= $utilisateur['avatar'] ?>">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse :</label>
            <input type="text" name="adresse" class="form-control" value="<?= $utilisateur['adresse'] ?>">
        </div> 
        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" name="ville" class="form-control" value="<?= $utilisateur['ville'] ?>">
        </div> 
        <div class="mb-3">
            <label for="code_postal" class="form-label">Code postal :</label>
            <input type="text" name="code_postal" class="form-control" value="<?= $utilisateur['code_postal'] ?>">
        </div> 
            <div class="text-center mb-3">
            <input type="submit" name="btn_update_utilisateur" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
</div>


<?php include PATH_ADMIN . 'includes/footer.php';?>
