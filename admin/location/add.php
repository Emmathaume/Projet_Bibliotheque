<!-- chargement de la config -->
<?php include '../config/config.php';?>
<?php include PATH_ADMIN.'bdd.php';?>
<!-- function isConnect -->
<?php
 if (!isConnect()) {
     header('location:login.php');
     die;
 }
?>

<!-- requete livre dispo -->
<?php
    // recuperer les titres des livres disponible
    // requet sql 
    $sql = "SELECT id,titre FROM livre WHERE disponibilite = 0 " ;
    // prepare
    $req = $bdd->query($sql);
    $titres = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- requete usager -->
<?php
    // recuperer les titres des livres disponible
    // requet sql 
    $sql = "SELECT id,nom,prenom FROM usager " ;
    // prepare
    $req = $bdd->query($sql);
    $usagers = $req->fetchAll(PDO::FETCH_ASSOC);
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
        <!-- SELECT 2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <title>Espace Administrateur</title>
    </head>
    <body>
        <?php include PATH_ADMIN.'includes/sidebar.php';?>
        <?php include PATH_ADMIN.'includes/topbar.php';?>
    
        <!-- content -->
        <div class="container">
    <!-- gestion alerte error -->
    <!-- <?php
        if (isset($_SESSION['error_add_book']) && $_SESSION['error_add_book']==false){
            alert ('danger',"Votre livre n'as pas correctement été ajouter veuillez recommencer");
            unset($_SESSION['error_add_book']);
        }
    ?> -->
    <form class= "row" action="<?= URL_ADMIN?>location/action.php" method="POST" enctype="multipart/form-data">
        <div class="col-6 mb-3">
            <label for="titre" class="form-label">Titre :</label>
            <select class="js-example-basic form-control" name="titre"  style="width: 100%">
                <?php
                    foreach ($titres as $titre) : ?>
                        <option value="<?= $titre['id']?>"><?= $titre['titre'] ?></option>
                    <?php endforeach; ?>
                ?>
            </select>
        </div>
        <div class="col-6 mb-3">
            <label for="titre" class="form-label">Nom usager :</label>
            <select class="js-example-basic form-control" name="usager"  style="width: 100%">
                <?php
                    foreach($usagers as $usager) : ?>
                        <option value="<?= $usager['id']  ?>"><?= $usager['nom'] ?>, <?= $usager['prenom']?></option>
                    <?php endforeach; ?>
                ?>
            </select>            
        </div>
        <div class="col-6 mb-3">
            <label for="date_debut" class="form-label">Date de début :</label>
            <input type="date" name="date_debut" class="form-control">
        </div>
        <div class="col-6 mb-3">
            <label for="date_fin" class="form-label">Date de fin :</label>
            <input type="date" name="date_fin" class="form-control">
        </div>
        <div class="col-4 mb-3">
            <!-- <label for="titre" class="form-label">Titre :</label> -->
            <input type="submit" name="btn_add_loc" class="btn btn-primary">
        </div>
    </form>
</div>

        
        <?php include PATH_ADMIN.'includes/footer.php';?>
        
        
    











