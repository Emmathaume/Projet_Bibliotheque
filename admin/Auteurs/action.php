<?php include '../config/config.php'; ?>
<?php include '../bdd.php'; ?>



<!--  AJOUTER UN AUTEUR -->
<?php
    // si on reçoit le bouton add Auteurs
    if (isset($_POST['btn_add_auteur'])) {
        var_dump($_POST);

        // Enregistrer les donnes + html entities ou inval 
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $nom_de_plume = htmlentities($_POST['nom_de_plume']);
        $adresse = htmlentities($_POST['adresse']);
        $ville = htmlentities($_POST['ville']);
        $code_postal = htmlentities($_POST['code_postal']);
        $mail = htmlentities($_POST['mail']);
        $numero = htmlentities($_POST['numero']);
        $photo = htmlentities($_POST['photo']);

        // creer la requete SQL 
        $sql = "INSERT INTO auteur VALUES (NULL, :nom, :prenom, :nom_de_plume, :adresse, :ville, :code_postal, :mail, :numero, :photo)";
        var_dump($sql);
        // envoie de la requete sql avec preparer
        $requete= $bdd->prepare($sql);
        // creation du tableau au cle valeur pour requete sql 
        $data = array(
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':nom_de_plume'=>$nom_de_plume,
            ':adresse'=>$adresse,
            ':ville'=>$ville,
            ':code_postal'=>$code_postal,
            ':mail'=>$mail,
            ':numero'=>$numero,
            ':photo'=>$photo,
        );
        var_dump($data);
        // execute de la requete avec redirection
        if (!$requete->execute($data)) {
            // rediriger vers add.php
            $_SESSION['error_add_auteur'] = false;
            header('location:add.php');
            die;
        }else {
            // rrediriger vers index
            $_SESSION['error_add_auteur'] = true;
            header('location:index.php');
        }
    }
?>

<!-- MODIFIER UN AUTEUR -->
<?php 
    // verifier si on a un btn_update auteur
    if (isset($_POST['btn_update_auteur'])) {
        var_dump($_POST);
        // enregistrer les info recu en post
        $id = intval($_POST['id']);
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $nom_de_plume = htmlentities($_POST['nom_de_plume']);
        $adresse = htmlentities($_POST['adresse']);
        $ville = htmlentities($_POST['ville']);
        $code_postal = intval($_POST['code_postal']);
        $mail = htmlentities($_POST['mail']);
        $numero = intval($_POST['numero']);
        $photo = htmlentities($_POST['photo']);  

        // creer la requet sql
        $sql = 'UPDATE auteur SET nom= :nom, prenom=:prenom,nom_de_plume=:nom_de_plume,adresse=:adresse,ville=:ville,code_postal=:code_postal,mail=:mail,numero=:numero,photo=:photo WHERE id=:id';

        // prepare la requete SQL 
        $requete = $bdd->prepare($sql);
        var_dump($requete);
        // creer tableau correspondance cle valeur
        $data = array(
            ':id'=>$id,
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':nom_de_plume'=> $nom_de_plume,
            ':adresse'=>$adresse,
            ':ville'=> $ville,
            ':code_postal'=> $code_postal,
            ':mail'=> $mail,
            ':numero'=> $numero,
            ':photo'=> $photo,
        );

        // execute la requete avec le data
        if (!$requete->execute($data)) {
            // on renvoi a la page modif +id en get
            header("location:update.php?=id=$id");
            die;
        }else {
            // on renvoie vers l'index.php
            header('location:index.php');
            die;
        }
        
    }






?>

<!-- SUPPRIMER UN AUTEUR  -->
<?php 

    if (isset($_GET['id'])) {
        var_dump($_GET);
        
        // enregistrer l'id en intval
        $id= intval($_GET['id']);
        var_dump($id);
        // creer la requete sql 
        $sql = 'DELETE FROM auteur WHERE id= ? LIMIT 1';
        var_dump($sql);
        // prepare la requete sql
        $requete = $bdd->prepare($sql);
        var_dump($requete);
        // die;
        // execute + redirection
        if (!$requete->execute(array($id))) {
            // on repars vers index. php
            header('location:index.php');
            die;
        }else {
            // on repars vers index
            header('location:index.php');
            die;
        }
    }
?>