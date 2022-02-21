<!-- chargement de la config -->
<?php include 'config/config.php';?>
<?php include 'bdd.php';?>
<!-- function isConnect -->
<?php
 if (!isConnect()) {
     header('location:login.php');
     die;
 }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Custom fonts for this template-->
        <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        
        <!-- Custom styles for this template-->
        <link href="<?= URL_ADMIN ?>css/sb-admin-2.min.css" rel="stylesheet">
        
        <title>Espace Administrateur</title>
    </head>
    <body>
        <!-- Connexion a la bdd -->
        <?php include 'bdd.php'?>
        
        
        
        <?php include 'includes/sidebar.php';?>
        
        <?php include 'includes/topbar.php';?>
        

        
        <?php include 'includes/footer.php';?>
        
        
    











