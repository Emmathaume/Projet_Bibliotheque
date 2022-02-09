<?php include '../config/config.php'; ?>
<?php include PATH_ADMIN.'bdd.php'; ?>

<!-- AJOUTER UN LIVRE -->
<?php 
    // verifier que le btn envoyer est le bon
    if (isset($_POST['btn_add_book'])) {
        var_dump($_POST);

        // verifier les données user avec html entities 
        $num_isbn = htmlentities($_POST['num_isbn']);
        $titre = htmlentities($_POST['titre']);
        $illustration = htmlentities($_POST['illustration']);
        $resume = htmlentities($_POST['resume']);
        $prix = intval($_POST['prix']);
        // $prix = floatval ou doubleval 
        $nbre_page = intval($_POST['nbre_page']);
        $date = htmlentities($_POST['date']);
        // $dispo = boolval($_POST['dispo']);
        $dispo = 0;

        // TTMNT de données (nbre de caractère, mail, etc.)

        // Creation requete SQL
        $sql = "INSERT INTO livre VALUES(NULL,:num_isbn, :titre, :illustration, :resume, :prix, :nbre_page, :date, :dispo)";
        var_dump($sql);
        // prepare car données user
        $requete = $bdd->prepare($sql);
        var_dump($requete);
        
        // tableau cle valeur de la table
        $data = array(
            ':num_isbn' => $num_isbn,
            ':titre' => $titre,
            ':illustration' => $illustration,
            ':resume' => $resume,
            ':prix' => $prix,
            ':nbre_page' => $nbre_page,
            ':date' => $date,
            ':dispo' => $dispo,
        );
        var_dump($data);
        // $requete->debugDumpParams();
        // flag + tableau cle valeur
        // On execute la requete
        if (!$requete->execute($data)) {
            // erreur alors on revient au formulaire
            header ("location:add.php");
        }else {
            // ok donc livres/index.php
            header ("location:index.php");
        }
    }
?>

<!-- MODIFIER UN LIVRE -->
<?php 
    // verifier si on a un $_post de btn_update_usager
    if (isset($_POST['btn_update_book'])) {
        var_dump($_POST);
        // enregistrer les infos dans des variables pour
        $id= intval($_POST['id']);
        $num_ISBN= htmlentities($_POST['num_ISBN']);
        $titre = htmlentities($_POST['titre']);
        $illustration = htmlentities($_POST['illustration']);
        $resume = htmlentities($_POST['resume']);
        $prix = htmlentities($_POST['prix']);
        $nb_pages = htmlentities($_POST['nb_pages']);
        $date_achat= htmlentities($_POST['date']);
        // creer la requete sql 
        $sql= 'UPDATE livre SET num_ISBN=:num_ISBN, titre=:titre, illustration=:illustration, resume=:resume, prix=:prix, nb_pages=:nb_pages, date_achat=:date_achat WHERE id= :id LIMIT 1';
        // envoyer en prepare et donc avant preparer le tableau cle valeur
        $data = array(
            ':id'=> $id,
            ':num_ISBN' => $num_ISBN,
            ':titre'=> $titre,
            ':illustration' => $illustration,
            ':resume' => $resume,
            ':prix' => $prix,
            ':nb_pages' =>  $nb_pages,
            ':date_achat' => $date_achat,
        );
        var_dump($data);
        // prepare la requete sql
        $requete= $bdd->prepare($sql);
        var_dump($requete);
        // execute la requete
        if (!$requete->execute($data)) {
            // si ça passe pas on retourne sur la feuille modif avec l'id correspondant
            header("location:update.php?id=$id");
            die;
        }else {
            // on va vers l'index
            header('location:index.php');
            die;
        }
        // var_dump($requete);
    }
?>

<!-- SUPPRIMER UN LIVRE -->
<?php 
    // recevoir un id en getMessage
    // si on recoit cette id en get 
    if (isset($_GET['id'])) {
        var_dump($_GET['id']);
        // intval de l'id + ENREGISTRER
        $id = intval($_GET['id']);
        var_dump($id);
        if ($id > 0 ) {
            // creer la requete SQL 
            $sql = 'DELETE FROM livre WHERE id = ? LIMIT 1';
            var_dump($sql);
            // prepare car get donc modifiable
            $requete = $bdd->prepare($sql);
            var_dump($requete);
            // execute la requete
            // $requete->execute(array($id));
            var_dump($requete);
            if (!$requete->execute(array($id))) {
               header('location:index.php');
               die;
            }else {
                header('location:index.php');
                die;
            }
        }
    }
?>