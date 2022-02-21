<!-- Afficher toutes les locations -->

<?php include '../config/config.php'?>
<!-- connexion a la bdd -->
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

    <!-- Recuperer les infos livres en bdd -->
<?php 
    // creer la requete SQL
    // $sql = 'SELECT * FROM livre';
    $sql= "SELECT * FROM etat_livre INNER JOIN etat ON etat.id = etat_livre.id_etat INNER JOIN livre ON livre.id = etat_livre.id_livre";
    // var_dump($sql);
    // utilise la methode query pour envoyer la requete a la bdd -->
    $requete = $bdd->query($sql);
    // var_dump($requete);
    // faire un fetchall pour permettre d'afficher toutes les occurence de la table récupéré
    $livres= $requete->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($livres);
    // die;

?>


<!-- table location -->

<!-- recupere avec id usager son nom prenom mail  -->
<!-- recuperer le livre avec son id son titre son illustration -->
<!-- recuperer avec l'id de etat début le libellé dans la table etat -->

<?php 

$sql = 'SELECT usager.id as usager_id, usager.prenom, usager.nom, usager.mail, livre.titre, livre.illustration, livre.disponibilite, etat.libelle, location.id AS id_loc
FROM location 
INNER JOIN usager ON location.id_usager = usager.id 
INNER JOIN livre ON location.id_livre = livre.id
INNER JOIN etat_livre ON location.etat_debut = etat_livre.id_etat
INNER JOIN etat ON etat_livre.id_etat = etat.id
';

$requete = $bdd -> query($sql);
// var_dump($requete);

$locations = $requete ->fetchAll(PDO::FETCH_ASSOC);
var_dump($locations);
?>

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
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
                <td>Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>


<?php include '../includes/footer.php';?>
