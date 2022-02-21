<?php include '../config/config.php';?>
<?php include '../bdd.php';  ?>
<!-- function isConnect -->
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>
<!-- function isAdmin -->
<?php 
if (!isAdmin($bdd)) {
    header('location:../index.php');
    die;
}
?>
<!-- AJOUTER UN UTILISATEUR -->
<?php 
    if(isset($_POST['btn_add_utilisateur'])){
        // ajouter avatard utilisateur
        // nom du ficher temporaire
        $tmp_name = $_FILES['avatar']['tmp_name'];
        // nom du fichier destination
        $dir_avatar_user = PATH_ADMIN . 'img/avatar_utilisateur';
        // nom en string du ficher
        $name = $_FILES['avatar']['name'];
        // move_uploaded_file (nomfichietemp, "destination/namefichier")
        if(!move_uploaded_file($tmp_name, "$dir_avatar_user/$name")) {
            // erreur
            $_SESSION['error_add_utilisateur'] = false;
            header('location:add.php');
            die;
        }
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $pseudo = htmlentities($_POST['pseudo']);
        $mail = htmlentities($_POST['mail']);
        $mot_de_passe = password_hash(htmlentities($_POST['mot_de_passe']),PASSWORD_DEFAULT);
        $num_telephone = htmlentities($_POST['num_telephone']);
        $adresse = htmlentities($_POST['adresse']);
        $ville = htmlentities($_POST['ville']);
        $code_postal = htmlentities($_POST['code_postal']);

        // Creer la requete SQL 
        $sql = "INSERT INTO utilisateur VALUES (NULL, :nom, :prenom, :pseudo,:mail, :mot_de_passe, :num_telephone,:avatar,:adresse, :ville, :code_postal)";
        // prepare pck donne user
        $requete = $bdd->prepare($sql);
        $data = [
            ':nom'=> $nom,
            ':prenom'=> $prenom,
            ':pseudo'=> $pseudo,
            ':mail'=> $mail,
            ':mot_de_passe'=>$mot_de_passe,
            ':num_telephone'=> $num_telephone,
            ':avatar'=> $name,
            ':adresse'=> $adresse,
            ':ville'=> $ville,
            ':code_postal'=>$code_postal,
        ];
        // execute
        if (!$requete->execute($data)) {
            $_SESSION['error_add_utilisateur'] = false;
            header ('location:add.php');
            die;
        }else {
            $_SESSION['error_add_utilisateur'] = true;
            header('location:index.php');
            die;
        }
    }
?>

<!-- MODIFIER UN UTILISATEUR -->
<?php 
    if (isset($_POST['btn_update_utilisateur'])) {

        $id = intval($_POST['id']);
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $pseudo = htmlentities($_POST['pseudo']);
        $mail = htmlentities($_POST['mail']);
        $mot_de_passe = htmlentities($_POST['mot_de_passe']);
        $num_telephone = htmlentities($_POST['num_telephone']);
        $avatar = htmlentities($_POST['avatar']);
        $adresse= htmlentities($_POST['adresse']);
        $ville = htmlentities($_POST['ville']);
        $code_postal = htmlentities($_POST['code_postal']);

        // creer la requete sql 
        $sql = "UPDATE utilisateur SET nom= :nom, prenom= :prenom, pseudo= :pseudo, mail= :mail, mot_de_passe= :mot_de_passe, num_telephone= :num_telephone, avatar= :avatar, adresse= :adresse,ville= :ville, code_postal= :code_postal WHERE id= :id LIMIT 1";
        // prepare
        $requete = $bdd->prepare($sql);
        $data = [
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':pseudo'=>$pseudo,
            ':mail'=>$mail,
            ':mot_de_passe'=>$mot_de_passe,
            ':num_telephone'=>$num_telephone,
            ':avatar'=>$avatar,
            ':adresse'=>$adresse,
            ':ville'=>$ville,
            ':code_postal'=>$code_postal,
            ':id'=>$id,
        ];
        // execute
        if (!$requete->execute($data)) {
            $_SESSION['error_update_utilisateur'] =false;
            header ("location:update.php?id=$id");
            die;
        }else {
            $_SESSION['error_update_utilisateur'] = true;
            header ("location:index.php");
            die;
        }
    }
?>

<!-- SUPPRIMER UN UTILISATEUR -->
<?php 
    if(isset($_GET["id"])) {
        $id= intval($_GET["id"]);
        if($id <= 0) {
            header("location:index.php");
            die;
        }
        // gestion de l'avatar
        // 1)recuperer nom avatar
        $sql = 'SELECT avatar FROM utilisateur WHERE id=?';
        $req = $bdd->prepare($sql);
        $req->execute([$id]);

        $hold_avatar= $req->fetch(PDO::FETCH_ASSOC);
        var_dump($hold_avatar);
        $hold_avatar = $hold_avatar['avatar'];
        var_dump($hold_avatar);
        // enregistrer le chemin ou trouver la photo
        $dir_avatar_utilisateur = PATH_ADMIN . 'img/avatar_utilisateur/' . $hold_avatar;
        var_dump($dir_avatar_utilisateur);
        // 2)veirifier s'il existe avs isfile
        if (!is_file($dir_avatar_utilisateur)) {
            $_SESSION['error_delete_utilisateur'] = false;
            header('location:index.php');
            die;
        }
        // 3) le supprimer avc unlink
        if (!unlink($dir_avatar_utilisateur)) {
            $_SESSION['error_delete_utilisateur'] = false;
            header('location:index.php');
            die;
        }


        //requete sql 
        $sql = 'DELETE FROM utilisateur WHERE id = ? LIMIT 1';
        // prepare
        $requete = $bdd->prepare($sql);
        // execute + redirection
        if (!$requete->execute(array($id))) {
            $_SESSION['error_delete_utilisateur'] = false;
            header('location:index.php');
            die;
        }else {
            $_SESSION['error_delete_utilisateur'] = true;
            header('location:index.php');
            die;
        }
    }
?>