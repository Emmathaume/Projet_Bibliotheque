<?php include '../config/config.php'; ?>
<?php include '../bdd.php'; ?>
<!-- function isConnect -->
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>


<!--  AJOUTER UN AUTEUR -->
<?php
    // si on reçoit le bouton add Auteurs
    if (isset($_POST['btn_add_auteur'])) {
        // var_dump($_POST);
        // die;
            // AJOUTER UNE PHOTO AUTEUR
        $tmp_name = $_FILES['photo']['tmp_name'];
        $dir = PATH_ADMIN . 'img/photo_auteur';
        $name= $_FILES["photo"]["name"];
        if(!move_uploaded_file($tmp_name,"$dir/$name")) {
            $_SESSION['error_add_auteur'] = false;
            header('location:index.php');
            die; 
        }

        // Enregistrer les donnes + html entities ou inval 
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $nom_de_plume = htmlentities($_POST['nom_de_plume']);
        $adresse = htmlentities($_POST['adresse']);
        $ville = htmlentities($_POST['ville']);
        $code_postal = htmlentities($_POST['code_postal']);
        $mail = htmlentities($_POST['mail']);
        $numero = htmlentities($_POST['numero']);

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
            ':photo'=>$name,
        );
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
            $_SESSION['error_update_auteur']= false;
            header("location:update.php?=id=$id");
            die;
        }else {
            // on renvoie vers l'index.php
            $_SESSION['error_update_auteur']= true;
            header('location:index.php');
            die;
        }
        
    }
?>

<!-- SUPPRIMER UN AUTEUR  -->
<?php 

    if (isset($_GET['id'])) {
        
        // enregistrer l'id en intval
        $id= intval($_GET['id']);
        if ($id <= 0 ) {
            // erreur
            header('Location:index.php');
            die;
        }
        // ** GESTION DE L'IPHOTO
            // 1) recuperer le nom de photo utilisateur avec requete sql
            // 2) vérifier si il existe dans le dossier
            // 3) le supprimer
            $sql = 'SELECT photo FROM auteur WHERE id = ?';
            $req = $bdd->prepare($sql);
            $req->execute([$id]);
            $hold_photo = $req->fetch(PDO::FETCH_ASSOC);
                // permet d'enregistrer uniquement le nom de l'image
            $hold_photo= $hold_photo['photo'];
            $dir_photo_auteur = PATH_ADMIN . 'img/photo_auteur/' . $hold_photo;

            if (!is_file($dir_photo_auteur)) {
                // erreur la photo n'existe pas ou plus dans le dossier
                $_SESSION['error_delete_auteur'] = false;
                header('location:index.php');
                die;
            }
            if (!unlink($dir_photo_auteur)) {
                // erreur on peut pas supprimer la photo
                $_SESSION['error_delete_auteur'] = false;
                header('location:index.php');
                die;
            }
            // SUPPRESSION DE L'UTILISATEUR EN BDD
                // creer la requete sql 
                $sql = 'DELETE FROM auteur WHERE id= ? LIMIT 1';
                // prepare la requete sql
                $requete = $bdd->prepare($sql);
                // execute + redirection
                if (!$requete->execute(array($id))) {
                    $_SESSION['error_delete_auteur'] = false;
                    header('location:index.php');
                    die;
                }else {
                    $_SESSION['error_delete_auteur'] = true;
                    header('location:index.php');
                    die;
                }
    }
?>