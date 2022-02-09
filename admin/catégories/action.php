<?php include '../bdd.php'; ?>

<!-- AJOUTER UNE CATEGORIE EN BDD -->
<?php 
    // verifier qu'on recoit le bouton ajouter 
    if (isset($_POST['btn_add_categorie'])) {
        // si on l'as var dump 
        var_dump($_POST);
        // on enregistre les infos dans des variables
        // $id = intval($_POST['id']);
        $libelle = htmlentities($_POST['libelle']);
        // on creer la requete sql
        $sql = "INSERT INTO categorie VALUES (NULL, :libelle)"; 

        // on prepare car donne utilisateur
        $requete = $bdd->prepare($sql);
        // on crer le tableau cle valeur 
        // on execute
        if (!$requete->execute(array(':libelle' => $libelle))) {
            header('location:add.php');
            die;
        }else {
            // reidiriger vers index.php
            header('location:index.php');
            die;
        } 
    }
?>

<!-- MODIFIER UNE CATEGORIE -->
<?php
    // verifier qu'on recoit le bon bouton
    if (isset($_POST['btn_update_categorie'])) {
        // var dump de post
        var_dump($_POST);
        // enregistrer les infos
        $id = intval($_POST['id']);
        $libelle = htmlentities($_POST['libelle']);

        if ($id>0) {
            // creer la requete SQL 
            $sql = 'UPDATE categorie SET libelle= :libelle WHERE id= :id';
            
            // Prepare de la requte
            $requete = $bdd->prepare($sql);
            var_dump($requete);
            // die;

            $data = array(
                ':libelle' => $libelle,
                ':id'=> $id,
            );
            // execute + redirection
            if (!$requete->execute($data)){
                // redirige vers la page update avec l'id
                header("location:update.php?id=$id");
                die;
            }else {
                header('location:index.php');
                die;
            }
        }
    }
?>

<!-- SUPPRIMER UNE CATEGORIE -->
<?php
    // recevoir une donne en get
    if (isset($_GET['id'])){
        var_dump($_GET);

        $id = intval($_GET['id']);

        if ($id > 0) {
            
            // creer la requete sql
            $sql = 'DELETE FROM categorie WHERE id = ?'; 
            // prepare la requete
            $requete = $bdd->prepare($sql);
            // execute + redirection
            if (!$requete->execute(array($id))) {
                // repars vers index.php
                header ('location:index.php');
            }else {
                // repars vers php 
                header ('location:index.php');
            }

        }


    }

?>