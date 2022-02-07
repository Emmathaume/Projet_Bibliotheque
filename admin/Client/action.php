<!-- connexion a la bdd -->
<?php include '../bdd.php';?>


<!-- AJOUT USAGER EN BDD -->
<?php 
    // VERIFIER S'IL EXISTE UN $_POST DE BTN ADD USAGER
    if (isset($_POST['btn_add_usager'])) {
        var_dump($_POST);

        // TRANSFORMER LES DATAUSER EN HTMLENTITIES:SECU
        $nom = htmlentities($_POST["nom"]);
        $prenom = htmlentities($_POST["prenom"]);
        $adresse = htmlentities($_POST["adresse"]);
        $ville = htmlentities($_POST["ville"]);
        $code_postal = htmlentities($_POST["code_postal"]);
        $mail = htmlentities($_POST["mail"]);

        // FAIRE LE TTMNT DES DONNES (TAILLE CARACTERE ect...)

        // CREATION REQUETE SQL 
        $sql = "INSERT INTO usager VALUES(NULL, :nom, :prenom, :adresse, :ville, :code_postal, :mail)";
        var_dump($sql);
        // die;
        // ENVOIE DE LA REQUETE EN BDD VIA PREPARE DONC POSE FLAG SUR REQUETE SQL
        $requete = $bdd->prepare($sql);

        // CREATION TABLEAU A PASSER EN PARAM DE EXECUTE AVEC CORESPONDANCE FLAG=>VALEUR
        $data = array (
            ':nom'=> $nom,
            ':prenom'=> $prenom,
            ':adresse'=> $adresse,
            ':ville'=> $ville,
            ':code_postal'=> $code_postal,
            ':mail'=> $mail,
        );
        // EXECUTER REQUETE DANS UNE CONDITIONS POUR VERIFIER SI OK POUR REDIRECTION
        

        if (!$requete->execute($data)) {
            // erreur donc redirection vers form d'ajout
            header('location:add.php');
            die;
        }else {
            // ok donc redirection vers index client
            header('Location:index.php');
            die;
        }
    }
?>

<!-- MODIFIER USAGER BDD -->
<?php
    // verifier si on a un $_post de btn_update_usager
    if(isset($_POST['btn_update_usager'])) {
        var_dump($_POST);
        // changer les donnes en html entities+les enregistrer
        $id = htmlentities($_POST['id']);
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $adresse = htmlentities($_POST['adresse']);
        $ville = htmlentities($_POST['ville']);
        $code_postal = htmlentities($_POST['code_postal']);
        $mail = htmlentities($_POST['mail']);
        
        // requete sql pour update un usager
        $sql = "UPDATE usager SET nom=:nom, prenom=:prenom, adresse=:adresse, ville=:ville, code_postal=:code_postal, mail =:mail WHERE id=:id LIMIT 1";
        var_dump($sql);

        // tableau correspondance drapeau=>valeur
        $data= array(
            ':id'=> $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':adresse' => $adresse,
            ':ville' => $ville,
            ':code_postal' => $code_postal,
            ':mail' => $mail,
        );
        var_dump($data);
        // preparer la requete
        $requete = $bdd->prepare($sql);
        var_dump($requete);
        // die;
        // executer la requete si c ok redirection vers index sinon retour update.php?id= avec id 
        // $requete->execute($data);
        if (!$requete->execute($data)) {
            header("location:update.php?id=$id");
        }else {
            header('location:index.php');
            die;
        }
    };
?>

<!-- SUPPRIMER UN USAGER BDD -->
<?php
    var_dump($_GET);

    // si on recoit un id
    if (isset($_GET['id'])) {
        // intval de l'id car envoyé en get et donc modifiable
        var_dump($_GET['id']);
        $id= intval($_GET['id']);
        
        // on supprime
        // requete SQL avec prepare 
        $sql = "DELETE FROM usager WHERE id= :id";

        // on prepare
        $requete=$bdd->prepare($sql);
        
        // on execute
        if (!$requete->execute(array(':id'=>$id))) {
            header('location:index.php');
        }else {
            header('location:index.php');
        }
    }
?>