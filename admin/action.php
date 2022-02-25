<?php include 'config/config.php'; ?>
<?php include 'bdd.php'; ?>



<!-- VERIFICATION SESSION MDP -->
<?php 
    // verifier qu'on recoit le btn_connect
    if (isset($_POST['btn_connect'])) {
        // var_dump($_POST);
        // TTMNT des données user
        
        // securisation des info recu
        $mail= htmlentities($_POST['mail']);
        $password= htmlentities($_POST['password']);
        // chekc de user mail en bdd 
        // requete sql
        $sql = "SELECT * FROM utilisateur WHERE mail = ?";
        
        // prepare + execute
        $req = $bdd->prepare($sql);
        $req->execute([$mail]);
        // fetch pour afficher
        $utilisateur = $req->fetch(PDO::FETCH_ASSOC);
        // var_dump($utilisateur);
        
        // si le fetch nous renvoie false alors le mail n'existe pas
        if (!$utilisateur) {
            // le mail ou pseudo nexiste pas
            // creer un $_session qui enregistre l'erreur
            $_SESSION['connect'] = false;
            header ('location:login.php');
            die;
        }
        // on verifie le mot de passe avc password verify
        // s'il n'existe pas on se connecte pas
        if (!password_verify($password, $utilisateur["mot_de_passe"])) {
            // creer un $_session qui enregistre l'erreur
            $_SESSION['connect'] = false;
            header ('location:login.php');
            die;
        }
        // si tout ok on supprime mdp de la session avc unset
        unset($utilisateur['mot_de_passe']);
        // on enregistre les info dont on a besoin dans un tableau
            // les info de l'utilisateur
        $_SESSION['user'] = $utilisateur;
            // L'heure de connexion
        $_SESSION['date_connect'] = new DateTime;
            // enregistrer son role et ses droits en session
        checkRoles($_SESSION['user']['id'],$bdd);
            // s'il est connecté
        $_SESSION['connect'] = true;
        // et on redirige vers index de admin
        header('location:index.php');

        die;
    }
?>

<!-- LOG OUT -->
<?php 
    if (isset($_GET['connect']) && $_GET['connect']== 'false') {
        $_SESSION = [];
        header('location:../index.php');
        die;
    }
?>



