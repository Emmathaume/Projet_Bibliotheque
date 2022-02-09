<!-- LISTE LES AUTEURS-->
<?php  include '../config/config.php'; ?>
<!-- connexion a la bdd -->
<?php include PATH_ADMIN.'bdd.php';?>

<?php 
    // VERIFIE SI ON A UN ID EN GET 
    if (isset($_GET['id'])) {
    //    var_dump($_GET['id']);
        // enregistre l'infos (intval passe a zero si c'est une string)
        $id = intval($_GET['id']);
        // si notre id est sup a zero on peut travailler avc
        if ($id > 0) {
            // REQUETE SQL POUR RECUPERER L'USAGER EN BDD
            $sql = "SELECT * FROM categorie WHERE id = ?";
            // var_dump($sql);

            // PREPARE LA REQUETE CAR GET donc on pose un flag (?)
            $requete = $bdd->prepare($sql);

            // EXECUTE LA REQUETTE CAR GET ou on passe la valeur du drapeau
            $requete->execute(array($id));
            // var_dump($requete);

            // RECUPERATION DES INFOS AVEC FETCH (CAR QUE UN USAGER) 
            $categorie = $requete->fetch(PDO::FETCH_ASSOC);
            // var_dump($categorie);
            //    die;

        }else {
            // REDIRIGER VERS INDEX.PHP
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
    <title>Modifier une catégories</title>
</head>
<body>

    <?php include PATH_ADMIN.'includes/sidebar.php';?>

    <?php include PATH_ADMIN.'includes/topbar.php';?>

<!-- FORMULAIRE D'AJOUT -->
<div class="container">
    <form action="<?= URL_ADMIN?>/catégories/action.php" method="POST">

        <input type="hidden" name="id" class="form-control" value="<?= $categorie['id'] ?>">

        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé :</label>
            <input type="text" name="libelle" class="form-control" value="<?= $categorie['libelle'] ?>">
        </div>
            <div class="text-center mb-3">
            <input type="submit" name="btn_update_categorie" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
</div>


<?php include PATH_ADMIN . 'includes/footer.php';?>