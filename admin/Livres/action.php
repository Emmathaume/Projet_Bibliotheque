<?php include '../config/config.php'; ?>
<?php include PATH_ADMIN.'bdd.php'; ?>
<!-- function is connect -->
<?php  
    if (!isConnect()) {
        header('location:../login.php');
        die;
    }
?>
<!-- AJOUTER UN LIVRE -->
<?php 
    // verifier que le btn envoyer est le bon
    if (isset($_POST['btn_add_book'])) {

        // *******ILLUSTRATION
        // enregistrer le nom du tmp
        $tmp_name = $_FILES['illustration']['tmp_name'];
        // enregistrer le chemin de destination
        $dir = PATH_ADMIN.'img/illustration';
        // $dir = 'Img/illustration';
        // enregistrer le nom du fichier
        $name = $_FILES['illustration']['name'];
        // move_uploaded_file si ok on continue le script sinon retour index
        if (!move_uploaded_file($tmp_name, "$dir/$name")) {
            // erreur
            $_SESSION['error_add_book'] =false;
            header('location:add.php');
            die;
        }

        // verifier les données user avec html entities 
        $num_isbn = htmlentities($_POST['num_isbn']);
        $titre = htmlentities($_POST['titre']);
        $resume = htmlentities($_POST['resume']);
        $prix = intval($_POST['prix']);
        $nbre_page = intval($_POST['nbre_page']);
        $date = htmlentities($_POST['date']);
        $dispo = 0;
        $date_ecriture = htmlentities($_POST['date_ecriture']);
        $id_etat = htmlentities($_POST['etats'][0]);
        // TTMNT de données (nbre de caractère, mail, etc.)
        
        // Creation requete SQL pour inserer un livre
        $sql = "INSERT INTO livre VALUES(NULL,:num_isbn, :titre, :illustration, :resume, :prix, :nbre_page, :date, :dispo)";
        // prepare car données user
        $requete = $bdd->prepare($sql);        
        // tableau cle valeur de la table
        $data = array(
            ':num_isbn' => $num_isbn,
            ':titre' => $titre,
            ':illustration' => $name,
            ':resume' => $resume,
            ':prix' => $prix,
            ':nbre_page' => $nbre_page,
            ':date' => $date,
            ':dispo' => $dispo,
        );
        // On execute la requete
        if (!$requete->execute($data)) {
            $_SESSION['error_add_book'] =false;
            header ("location:add.php");
            die;
        }else {
            // ENREGISTREMENT de l'id du livre
            $id_livre=$bdd->lastInsertId();

            // **********CATEGORIES
            foreach ($_POST['categories'] as $id_categorie) {
                $sql_cat = "INSERT INTO categorie_livre VALUES (:id_categorie, :id_livre)";
                $req_cat = $bdd->prepare($sql_cat);

                $data_cat = [
                    ':id_categorie' => $id_categorie,
                    ':id_livre'=>$id_livre
                ];

                if (!$req_cat->execute($data_cat)) {
                    $_SESSION['error_add_book'] =false;
                    header ("location:add.php");
                    die;
                }
            }
            //********AUTEURS
            foreach ($_POST['auteurs'] as $id_auteur) {
                $sql_auteur = "INSERT INTO auteur_livre VALUES (:id_auteur, :id_livre, :date_ecriture)";
                $req_auteur = $bdd->prepare($sql_auteur);
                $data_auteur = [
                    ':id_auteur' => $id_auteur ,
                    ':id_livre' => $id_livre,
                    ':date_ecriture'=> $date_ecriture
                ];
                if (!$req_auteur->execute($data_auteur)) {
                    $_SESSION['error_add_book'] =false;
                    header ("location:add.php");
                    die;
                }
                ;
            }
            // ETAT
                // requete sql
                $sql_etat = 'INSERT INTO etat_livre VALUES (:id_livre, :id_etat)';
                // prepare
                $req_etat = $bdd->prepare($sql_etat);
                $data_etat = [
                    ':id_livre' => $id_livre,
                    ':id_etat' => $id_etat
                ];
                // execute
                if (!$req_etat->execute($data_etat)) {
                    $_SESSION['error_add_book'] =false;
                    header ("location:add.php");
                    die;
                }
            
                

            // ACTION 
            // ** ajouter id(liaison), id utilisateur, id livre, id auteur, id categories, id etat, id role, id_action
                // requete sql
                $id_utilisateur = $_SESSION['user']['id'];
                if (isAdmin($bdd)) {
                    $id_role = 1;
                }else{
                    $id_role = 2;
                }
                $sql_action = "INSERT INTO utilisateur_action VALUES (NULL, :id_utilisateur,NULL, :id_livre, NULL, NULL, :id_auteur, :id_categorie, :id_etat, :id_role, 1 , NULL,NOW())";
                var_dump($sql_action);
                  // prepare
                    // tableau data
                $req_action = $bdd->prepare($sql_action);

                $data_action = [
                    ':id_utilisateur'=> $id_utilisateur,
                    ':id_livre'=>$id_livre,
                    ':id_auteur'=>$id_auteur,
                    ':id_categorie'=>$id_categorie,
                    ':id_etat'=>$id_etat,
                    ':id_role'=>$id_role,
                ];
                
                // execute
                if (!$req_action->execute($data_action)) {
                    $_SESSION['error_add_book'] =false;
                    header ("location:add.php");
                    die;
                }
            $_SESSION['error_add_book'] =true;
            header ("location:index.php");
        }
    }
?>

<!-- MODIFIER UN LIVRE -->
<?php 
    // verifier si on a un $_post de btn_update_usager
    if (isset($_POST['btn_update_book'])) {
        // enregistrer les infos dans des variables pour
        $id= intval($_POST['id']);
        // var_dump($_POST);
        // die;
        if ( $id <= 0 ) {
            // erreur
            $_SESSION['error_update_book'] = false;
            header ("location:index.php");
            die;
        }
        $num_ISBN= htmlentities($_POST['num_ISBN']);
        $titre = htmlentities($_POST['titre']);
        // $illustration = htmlentities($_POST['illustration']);
        $resume = htmlentities($_POST['resume']);
        $prix = htmlentities($_POST['prix']);
        $nb_pages = htmlentities($_POST['nb_pages']);
        $date_achat= htmlentities($_POST['date']);
        $id_etat = $_POST['etat']['0'];

        // avant de creer la requete on verifie si user a ajouter une illustration 'empty'
        if (!empty($_FILES['illustration']['name'])) {

            // si il change on recupere le nom de l'illustration
            $illustration = $_FILES['illustration']['name'];
            // requete sql pour selectionner l'illustration suivant l'id livre
            $sql_livre = 'SELECT illustration FROM livre WHERE id = ?';
            // prepare
            $req_livre = $bdd->prepare($sql_livre);
            // execute
            $req_livre->execute([$id]);

            // enregistrer le fetch de la requete pour recup le nom de l'illustration ajouter
            $hold_illustration = $req_livre->fetch(PDO::FETCH_ASSOC);
            $hold_illustration = $hold_illustration['illustration'];
            var_dump($hold_illustration);
            // enregistrer le chemin
            // $chemin_illustration = PATH_ADMIN . 'img/illustration/' . $hold_illustration;
            $chemin_illustration = SRC.'Img/' . $hold_illustration;
            var_dump($chemin_illustration);
            // avec is_file veirfier si l'ancienne image existe
            if (!is_file($chemin_illustration)) {
                // s'il n'existe pas on repar a ajout user
                $_SESSION['error_update_book'] = false;
                header('location:update.php?id=' . $id);
                die;
            }else {
                // si on supprimer pas on repars vers id 
                if (!unlink($chemin_illustration)) {
                    $_SESSION['error_update_book'] = false;
                    header('location:update.php?id=' . $id);
                    die;
                }
                // si c'est ok => on supprime unlink
            }
                
            // ****Gestion nouvelle illustration
                // enregistrer le tmp name
                $tmp_name = $_FILES['illustration']['tmp_name'];
                // enregistrer dir destination
                $dir = SRC.'Img/'.$illustration;
                
                // move_uploaded_file avec en param dir temp+ dir destination
                if (!move_uploaded_file($tmp_name, $dir)) {
                    // var_dump('jesuisenregistrer');
                    $_SESSION['error_update_book'] = false;
                    header('location:add.php');
                    die;
                    // die;
                }
                // requete pour ajouter livres avec nouvelle illustration
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
                // die;
        } else {
            // sinon reuqte sans illustration 
                // requete pour ajouter livres sans nouvelle illustration
            // creer la requete sql 
            $sql= 'UPDATE livre SET num_ISBN=:num_ISBN, titre=:titre, resume=:resume, prix=:prix, nb_pages=:nb_pages, date_achat=:date_achat WHERE id= :id LIMIT 1';
            // envoyer en prepare et donc avant preparer le tableau cle valeur
            $data = array(
                ':id'=> $id,
                ':num_ISBN' => $num_ISBN,
                ':titre'=> $titre,
                // ':illustration' => $illustration,
                ':resume' => $resume,
                ':prix' => $prix,
                ':nb_pages' =>  $nb_pages,
                ':date_achat' => $date_achat,
            );
        }
        // prepare la requete sql
        $requete= $bdd->prepare($sql);
        // execute la requete
        if (!$requete->execute($data)) {
            // si ça passe pas on retourne sur la feuille modif avec l'id correspondant
            $_SESSION['error_update_book'] = false;
            header("location:update.php?id=$id");
            die;
        }else {
            // **********CATEGORIES
                // supprimer les occurence de categorie_livre pour réajouter les nvlles
                $sql = "DELETE FROM categorie_livre WHERE id_livre = ?";
                $req = $bdd->prepare($sql);
                if (!$req->execute([$id])) {
                    // erreur
                    $_SESSION['error_update_book'] = false;
                    header("location:update.php?id=$id");
                    die;
                }

            foreach ($_POST['categorie'] as $id_categorie) {
                // onserer les nvlles occurences
                $sql_cat = "INSERT INTO categorie_livre VALUES (:id_categorie, :id)";
                $req_cat = $bdd->prepare($sql_cat);

                $data_cat = [
                    ':id_categorie' => $id_categorie,
                    ':id'=>$id,
                ];

                if (!$req_cat->execute($data_cat)) {
                    $_SESSION['error_update_book'] =false;
                    header ("location:update.php?id=".$id);
                    die;
                }
                $id_user = $_SESSION['user']['id'];
                if (isAdmin($bdd)) {
                    $id_role = 1;
                }else{
                    $id_role = 2;
                }
                $sql_action = "INSERT INTO utilisateur_action VALUES (NULL, :id_user, NULL, :id_livre, NULL, NULL, :id_auteur, :id_categorie, :id_etat, :id_role, 2 , NULL,NOW())";
                $req_action = $bdd->prepare($sql_action);
                $data_action = [
                    ':id_user'=>$id_user,
                    ':id_livre'=>$id,
                    ':id_auteur'=>$id_auteur,
                    ':id_categorie'=>$id_categorie,
                    ':id_etat'=> $id_etat,
                    ':id_role'=>$id_role,
                ];
                if (!$req_action->execute($data_action)) {
                    $_SESSION['error_update_book'] =false;
                    header ("location:update.php?id=".$id);
                    die;
                }
            }  

            // **********AUTEURS
            // supprimer les occurence de auteur_livre pour réajouter les nvlles
            $sql = "DELETE FROM auteur_livre WHERE id_livre = ?";
            $req = $bdd->prepare($sql);
            if (!$req->execute([$id])) {
                // erreur
                $_SESSION['error_update_book'] = false;
                header("location:update.php?id=$id");
                die;
            }
            foreach ($_POST['auteur'] as $id_auteur) {

                $sql_auteur = 'INSERT INTO auteur_livre VALUES (:id_auteur, :id, NOW())';

                $req_aut = $bdd->prepare($sql_auteur);

                $data_aut = [
                    ':id_auteur' => $id_auteur,
                    ':id'=>$id,
                ];

                if (!$req_aut->execute($data_aut)) {
                    $_SESSION['error_update_book'] =false;
                    header ("location:update.php?id=".$id);
                    die;
                }
                $id_user = $_SESSION['user']['id'];
                if (isAdmin($bdd)) {
                    $id_role = 1;
                }else{
                    $id_role = 2;
                }
                $sql_action = "INSERT INTO utilisateur_action VALUES (NULL, :id_user, NULL, :id_livre, NULL, NULL, :id_auteur, :id_categorie, :id_etat, :id_role, 2 , NULL,NOW())";
                $req_action = $bdd->prepare($sql_action);
                $data_action = [
                    ':id_user'=>$id_user,
                    ':id_livre'=>$id,
                    ':id_auteur'=>$id_auteur,
                    ':id_categorie'=>$id_categorie,
                    ':id_etat'=> $id_etat,
                    ':id_role'=>$id_role,
                ];
                if (!$req_action->execute($data_action)) {
                    $_SESSION['error_update_book'] =false;
                    header ("location:update.php?id=".$id);
                    die;
                }
            } 


            // on va vers l'index
            $_SESSION['error_update_book'] = true;
            header('location:index.php');
            die;
        }
    }
?>

<!-- SUPPRIMER UN LIVRE -->
<?php 

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        if ($id <= 0 ) {
            header('location:index.php');
            die;
        }

    // **** GESTION ILLUSTRATION
        // 1) recuperer le nom de l'illustration avec requete sql
        // 2) verifier s'il existe dns dossier (is_file)
        // 3) supprimer le fichier avec unlink
        $sql = 'SELECT illustration FROM livre WHERE id= ?';
        $req = $bdd->prepare($sql);
        $req->execute([$id]);

        $hold_illustration= $req->fetch(PDO::FETCH_ASSOC);

        $hold_illustration = $hold_illustration['illustration'];

        $dir_illustration_livre = PATH_ADMIN . 'img/illustration/'. $hold_illustration;

        if(!is_file($dir_illustration_livre)) {
            // error illustration n'existe pas
            $_SESSION['error_delete_book'] = false;
            header('location:index.php');
            die;
        }
        if(!unlink($dir_illustration_livre)) {
            $_SESSION['error_delete_book'] = false;
            header('location:index.php');
            die;
        }
        // creer la requete SQL 
        $sql = 'DELETE FROM livre WHERE id = ? LIMIT 1';
        
        $requete = $bdd->prepare($sql);
        if (!$requete->execute(array($id))) {
            $_SESSION['error_delete_book'] = false;
            header('location:index.php');
        die;
        }else {
        $_SESSION['error_delete_book'] = true;
        header('location:index.php');
        die;
        }
    }
?>