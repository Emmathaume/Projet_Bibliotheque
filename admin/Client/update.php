<?php include '../config/config.php'; ?>
<!-- MODIFIER UN USAGER -->

<!-- connexion a la bdd -->
<?php include '../bdd.php';?>
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>


<!-- requete bdd pour affichage -->
<?php 
    // VERIFIE SI ON A UN ID EN GET 
    if (isset($_GET['id'])) {
        // enregistre l'infos (intval passe a zero si c'est une string)
        $id = intval($_GET['id']);
        // si notre id est sup a zero on peut travailler avc
        if ($id > 0) {
            $sql = "SELECT * FROM usager WHERE id = ?";
            $requete = $bdd->prepare($sql);
            $requete->execute(array($id));
            $usager = $requete->fetch(PDO::FETCH_ASSOC);
        }else {
            header('location:index.php');
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
    <title>Modifier un client</title>
</head>
<body>

    <?php include '../includes/sidebar.php';?>

    <?php include '../includes/topbar.php';?>

<!-- FORMULAIRE DE MODIFICATION -->
<div class="container">
    <!-- gestion alerte error -->
<?php 
    if(isset($_SESSION['error_update_client']) && $_SESSION['error_update_client']==false){
        alert('danger','Une erreur est survenue veuillez recommencer');
        unset($_SESSION['error_update_client']);
    } 
?>
    <form action="action.php" method="POST">
    <input type="hidden" name="id" value=" <?= $usager['id'] ?>">
        <div class="mb-3">
            <label for="nonm" class="form-label">Nom : </label>
            <input type="text" name="nom" class="form-control" value="<?= $usager['nom'] ?>">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" name="prenom" class="form-control" value="<?= $usager['prenom'] ?>">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Addresse :</label>
            <input type="text" name="adresse" class="form-control" value="<?= $usager['adresse'] ?>">
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" name="ville" class="form-control" value="<?= $usager['ville'] ?>">
        </div>
        <div class="mb-3">
            <label for="code_postal" class="form-label">Code postal :</label>
            <input type="text" name="code_postal" class="form-control" value="<?= $usager['code_postal'] ?>">
        </div>    
        <div class="mb-3">
            <label for="mail" class="form-label">Mail :</label>
            <input type="email" name="mail" class="form-control"  value="<?= $usager['mail'] ?>">
        </div>
            <div class="text-center mb-3">
            <input type="submit" name="btn_update_usager" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
</div>


<?php include '../includes/footer.php';?>
