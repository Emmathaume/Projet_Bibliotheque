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

<?php
  if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id <= 0) {
    // TODO: erreur session
    header('location:index.php');
    die;
    }
    // on creer la requete pour récuperer les infos de la loc 
    // +inner join pour faire affichage des libele /nom
    $sql = "SELECT location.id_usager, location.etat_debut, location.id_livre, location.date_debut,location.date_fin, usager.nom,usager.prenom, livre.titre 
    FROM location
    INNER JOIN usager ON usager.id = location.id_usager
    INNER JOIN livre ON livre.id = location.id_livre
    WHERE location.id = ?";
    // prepare
    $req = $bdd->prepare($sql);
    // execute
    $req->execute([$id]);
    $infos_loc = $req->fetch(PDO::FETCH_ASSOC);
    var_dump($infos_loc);
  }  
?>

<!-- SELECT2 etat -->
<?php
    $sql= 'SELECT * FROM etat';
    $req = $bdd->query($sql);
    $etats = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
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
        <input type="hidden" name="id_loc" value="<?= $id?>">
        <input type="hidden" name="id_usager" value="<?= $infos_loc['id_usager']?>">
        <input type="hidden" name="id_livre" value="<?= $infos_loc['id_livre']?>">
        <input type="hidden" name="etat_debut" value="<?= $infos_loc['etat_debut']?>">
        <div class="col-6 mb-3">
            <label for="titre" class="form-label">Titre :</label>
            <input type="text" class="form-control" name="titre" value="<?= $infos_loc['titre']?>">
        </div>
        <div class="col-6 mb-3">
            <label for="nom_usager" class="form-label">Nom usager :</label>
            <input type="text" class="form-control" name="nom_usager" value="<?= $infos_loc['nom'],' ' . $infos_loc['prenom']?>">
        </div>
        <div class="col-6 mb-3">
            <label for="date_debut" class="form-label">Date de début :</label>
            <input type="text" name="date_debut" class="form-control" value="<?= $infos_loc['date_debut']?>">
        </div>
        <div class="col-6 mb-3">
            <label for="date_fin" class="form-label">Date de fin :</label>
            <input type="text" name="date_fin" class="form-control" value="<?= $infos_loc['date_fin']?>">
        </div>
        <div class="col-6 mb-3">
            <label for="etat_retour" class="form-label">Etat retour :</label>
            <select class="js-example-basic form-control" name="etat_retour"  style="width: 100%">
                <?php
                    foreach($etats as $etat) : ?>
                        <option value="<?= $etat['id']  ?>"><?= $etat['libelle'] ?></option>
                    <?php endforeach; ?>
                ?>
            </select> 
        </div>
        <div class="col-12 mb-3">
            <label for="cloture" class="form-label">Terminer la location ?</label>
            <input type="checkbox" name="cloture" value="true">
        </div>
        <div class="col-12 mb-3">
            <input type="submit" name="btn_update_loc" class="btn btn-primary">
        </div>
    </form>
</div>

        
        <?php include PATH_ADMIN.'includes/footer.php';?>
