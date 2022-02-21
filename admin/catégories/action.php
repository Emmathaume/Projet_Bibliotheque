<?php  include '../config/config.php'; ?>
<?php include '../bdd.php'; ?>
<!-- function isConnect -->
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>

<!-- AJOUTER UNE CATEGORIE EN BDD -->
<?php 
    // verifier qu'on recoit le bouton ajouter 
    if (isset($_POST['btn_add_categorie'])) {
        // on enregistre les infos dans des variables
        $libelle = htmlentities($_POST['libelle']);
        // on creer la requete sql
        $sql = "INSERT INTO categorie VALUES (NULL, :libelle)"; 
        // on prepare car donne utilisateur
        $requete = $bdd->prepare($sql);
        // on crer le tableau cle valeur 
        // on execute
        if (!$requete->execute(array(':libelle' => $libelle))) {
            $_SESSION['error_categories'] =false;
            header('location:add.php');
            die;
        }else {
            // reidiriger vers index.php
            $_SESSION['error_categories']= true;
            header('location:index.php');
            die;
        } 
    }
?>

<!-- MODIFIER UNE CATEGORIE -->
<?php
    // verifier qu'on recoit le bon bouton
    if (isset($_POST['btn_update_categorie'])) {
        // enregistrer les infos
        $id = intval($_POST['id']);
        $libelle = htmlentities($_POST['libelle']);

        if ($id>0) {
            // creer la requete SQL 
            $sql = 'UPDATE categorie SET libelle= :libelle WHERE id= :id';
            // Prepare de la requte
            $requete = $bdd->prepare($sql);

            $data = array(
                ':libelle' => $libelle,
                ':id'=> $id,
            );
            // execute + redirection
            if (!$requete->execute($data)){
                // redirige vers la page update avec l'id
                $_SESSION['error_update_categorie']=false;
                header("location:update.php?id=$id");
                die;
            }else {
                $_SESSION['error_update_categorie']=true;
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
        $id = intval($_GET['id']);
        if ($id > 0) {
            // creer la requete sql
            $sql = 'DELETE FROM categorie WHERE id = ?'; 
            // prepare la requete
            $requete = $bdd->prepare($sql);
            // execute + redirection
            if (!$requete->execute(array($id))) {
                // repars vers index.php
               $_SESSION['error_delete_categories'] = false;
               header ('location:index.php');
            }else {
                // repars vers php 
               $_SESSION['error_delete_categories'] = true;
                header ('location:index.php');
            }
        }
    }
?>