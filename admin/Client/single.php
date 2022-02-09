<?php include '../config/config.php'; ?>
<!-- AFFICHER UN SEUL CONTACT -->
<?php include PATH_ADMIN.'bdd.php';?>

<?php 
// var_dump($_GET);
// recevoir l'id de l'occurence selectionner
// faire une verification qu'il existe pour executer le code 
    if (isset($_GET['id'])){
        // s'il existe enregistrer + intval pour securit
        $id = intval($_GET['id']);
        // var_dump($_GET['id']);
        // creer la requete sql 
        $sql = "SELECT * FROM usager WHERE id = :id";
        // var_dump($sql);
        // prepare de la requette 
        $requete = $bdd->prepare($sql);
        // execute
        $requete->execute(array(':id' => $id));
        //  ?FETCH ? 
        // Recupere les infos bdd
        $contact = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($contact);
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

<div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Adresse</th>
            <th scope="col">Ville</th>
            <th scope="col">Code Postal</th>
            <th scope="col">Mail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?= $contact['nom']?></td>
            <td><?= $contact['prenom']?></td>
            <td><?= $contact['adresse']?></td>
            <td><?= $contact['ville']?></td>
            <td><?= $contact['code_postal']?></td>
            <td><?= $contact['mail']?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container mt-5">
    <table class="table">
    <thead>
        <tr>
        <th class="text-center" colspan="4">Information locations</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <!-- <th scope="row">1</th> -->
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <!-- <th scope="row">2</th> -->
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <!-- <th scope="row">3</th> -->
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
        </tr>
    </tbody>
    </table>
</div>

    <?php include '../includes/footer.php';?>