<?php include '../config/config.php'; ?>
<?php include PATH_ADMIN.'bdd.php'; ?>
<!-- function is connect -->
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>



<!-- Ajout d'une loc -->
<?php
    if (isset($_POST['btn_add_loc'])){
        var_dump($_POST);

        // on enregistre les infos qu'on recoit en post
        $id_livre = intval($_POST['titre']);
        $id_usager = intval($_POST['usager']);
        $date_debut= htmlentities($_POST['date_debut']);

        // on récupère etat_debut pour le insert into
        $sql = 'SELECT id_etat FROM etat_livre WHERE etat_livre.id_livre = ?';
        $req = $bdd->prepare($sql);
        if (!$req->execute([$id_livre])) {
            // TODO: remplir tableau erreur en session
            header('location:add.php');
            die;
        }
        $etat_debut = $req->fetch(PDO::FETCH_ASSOC);
        $etat = $etat_debut['id_etat'];


        // *****si date fin existe on execute une requete sinon l'autre
        if ($_POST['date_fin'] === '' || $_POST['date_fin'] === null) {
            $sql = 'INSERT INTO location VALUES (NULL, :id_usager, :id_livre, :date_debut, NULL, :etat_debut, NULL, 1)';

            // prepare
            $req = $bdd->prepare($sql);
            // data
            $data = [
                ':id_usager'=> $id_usager,
                ':id_livre'=> $id_livre,
                ':date_debut'=> $date_debut,
                ':etat_debut'=> $etat,
            ];
            // execute
            if (!$req->execute($data)) {
                // TODO: remplir tableau erreur en session
                header('location:add.php');
                die;
            } 
        }
        $date_fin = htmlentities($_POST['date_fin']);

        $sql = 'INSERT INTO location VALUES (NULL, :id_usager, :id_livre, :date_debut, :date_fin, :etat_debut, NULL, 1)';

        // prepare
        $req = $bdd->prepare($sql);
        // data
        $data = [
            ':id_usager'=> $id_usager,
            ':id_livre'=> $id_livre,
            ':date_debut'=> $date_debut,
            ':etat_debut'=> $etat,
            ':date_fin'=> $date_fin,
        ];
        // execute
        if (!$req->execute($data)) {
            // TODO: remplir tableau erreur en session
            header('location:add.php');
            die;
        } 

        // TODO: enregistrer en session que tout est ok 
        header('location:index.php');
        die;
    }
?>

<!-- Update loc -->
<?php
    if (isset($_POST['btn_update_loc'])) {
        var_dump($_POST);
        // die;
        // on enregistre toutes les infos 
        $id_loc = intval($_POST['id_loc']);
        if ($id_loc <= 0 ) {
            // TODO: erreur
            header('location:index.php');
            die;
        }
        $cloture = htmlentities($_POST['cloture']);
        $id_usager = intval($_POST['usager']);
        $id_livre = intval($_POST['titre']);
        $date_debut = htmlentities($_POST['date_debut']);
        $date_fin = htmlentities($_POST['date_fin']);
        $etat_debut = intval($_POST['etat_debut']);
        $etat_retour = intval($_POST['etat_retour']);

        if ($cloture === 'true') {
            // on creer la requeque sql update pour mettre a jour les infos/ statut = 0 
            $sql = "UPDATE location 
            SET id_usager = :id_usager, id_livre=:id_livre , date_debut= :date_debut, date_fin= :date_fin, etat_debut=:etat_debut, etat_retour= :etat_retour, statut= 0
            WHERE id = :id_loc";
            // prepare
            $req = $bdd->prepare($sql);
            
            $data = [
                ':id_usager'=> $id_usager,
                ':id_livre'=> $id_livre,
                ':date_debut'=> $date_debut ,
                ':date_fin'=>$date_fin ,
                ':etat_debut'=>$etat_debut ,
                ':etat_retour'=> $etat_retour,
                ':id_loc'=> $id_loc,
            ];
            // execute
            if (!$req->execute($data)) {
                // TODO: erreur session
                header('location: update.php?id='.$id_loc);
                die;
            }
    
        }
        // sinon 
            // on creer la requete sql update pr mettre a jour les infos
            // en laissant le statut à 1 (en cours)            
        $sql = "UPDATE location 
        SET id_usager = :id_usager, id_livre=:id_livre , date_debut= :date_debut, date_fin= :date_fin, etat_debut=:etat_debut, etat_retour= :etat_retour, statut= 1
        WHERE id = :id_loc";
        // prepare
        $req = $bdd->prepare($sql);
        
        $data = [
            ':id_usager'=> $id_usager,
            ':id_livre'=> $id_livre,
            ':date_debut'=> $date_debut ,
            ':date_fin'=>$date_fin ,
            ':etat_debut'=>$etat_debut ,
            ':etat_retour'=> $etat_retour,
            ':id_loc'=> $id_loc,
        ];
        // execute
        if (!$req->execute($data)) {
            // TODO: erreur session
            header('location: update.php?id='.$id_loc);
            die;
        }
        // TOUT EST OK 
        // TODO: remplir la session tout ok
        header("location: index.php");
        die;
    }

?>