<?php include '../config/config.php'?>
<?php include '../bdd.php';?>
<?php  
    if (!isConnect()) {
        header('location:../login.php');
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
    <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= URL_ADMIN?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= URL_ADMIN?>css/style.css" rel="stylesheet">

    <title>Créer une location</title>
</head>
<body>

    <?php include '../includes/sidebar.php';?>

    <?php include '../includes/topbar.php';?>

<!-- affichage infos livre -->
<?php 
    $sql = 'SELECT livre.titre,location.id AS id_loc,location.id_usager, location.id_livre, location.date_debut, location.date_fin, usager.nom, usager.prenom 
    FROM location
    INNER JOIN usager ON usager.id = location.id_usager
    INNER JOIN livre ON livre.id = location.id_livre';
    $req=$bdd->query($sql);
    $locations = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1 class="mb-4">Locations </h1>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Titre du livre</th>
            <th scope="col">Identité client</th>
            <th scope="col">Date début</th>
            <th scope="col">Date de fin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location) :?>
                <?php 
                $date_debut = new DateTime($location['date_debut']) ;
                $dateDebut = $date_debut->format('d/m/Y');

                if ($location['date_fin'] == null) {
                    $dateFin = '';
                }else {
                    $date_fin = new DateTime($location['date_fin']);
                    $dateFin = $date_fin->format('d/m/Y') ; 

                }
                ?>
            <tr>
                <td><?= $location['titre']?></td>
                <td><?= $location['nom'],' '.  $location['prenom']?></td>
                <td><?= $dateDebut?></td>
                <td><?= $dateFin ?></td>
                <td><a href="<?= URL_ADMIN?>location/update.php?id=<?= $location['id_loc']?>" class="btn btn-warning">Modifier</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<?php include '../includes/footer.php';?>
