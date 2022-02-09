<!-- LISTE LES AUTEURS-->
<?php  include '../config/config.php'; ?>
<!-- connexion a la bdd -->
<?php include PATH_ADMIN.'bdd.php';?>

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
    <title>Ajouter une catégories</title>
</head>
<body>

    <?php include PATH_ADMIN.'includes/sidebar.php';?>

    <?php include PATH_ADMIN.'includes/topbar.php';?>

<!-- FORMULAIRE D'AJOUT -->
<div class="container">
    <form action="<?= URL_ADMIN?>/catégories/action.php" method="POST">
        <!-- <div class="mb-3">
            <label for="id" class="form-label">Id : </label>
            <input type="text" name="id" class="form-control">
        </div> -->
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé :</label>
            <input type="text" name="libelle" class="form-control">
        </div>
            <div class="text-center mb-3">
            <input type="submit" name="btn_add_categorie" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
</div>


<?php include PATH_ADMIN . 'includes/footer.php';?>