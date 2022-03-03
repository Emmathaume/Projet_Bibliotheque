
<!--funcction qui genere une alerte si on ajoute/modifie ou supprime un livre -->
<?php 
    function alert ($couleur,$message) {?>
        <div class="alert alert-<?= $couleur;?>" role="alert">
            <?= $message;?>
        </div>
    <?php };
?>

<!-- function pour verifier si un utilisateur est connecté -->
<?php
    function isConnect(){
        // si la session connecte existe et si elle est = a true alors on est connecté
        if (isset($_SESSION['connect']) && $_SESSION['connect']==true ) {
            return true;
        }
        return false;
    }
?>

<!-- function pour verifier role utilisateur -->
<?php
    /**
     * checkRoles
     * vérifie le role d'un utilisateur
     * @return boolean
     */
    function checkRoles($id,$bdd) {
        if (intval($id<=0)) {
            // ereur
            return false;
        }
        // creer la requete sql qui récupère le libelle du role suivant l'id utilisateur lié dans role_utilisateur
        $sql = 'SELECT libelle 
        FROM role_utilisateur 
        INNER JOIN role ON role.id = role_utilisateur.id_role
        WHERE role_utilisateur.id_utilisateur = ?';
        // on prepare
        $req = $bdd->prepare($sql);
        // on execute
        $req->execute([$id]);
        // onfetch dans $role et on var_dump
        $roles = $req->fetchAll(PDO::FETCH_NUM);
        // return $roles;
        // die;
        if(count($roles) > 1 ){
            // si + de 1 role alors on merge les tableau
            $roles = array_merge($roles[0], $roles[1]);
            // var_dump(array_merge($roles[0], $roles[1]));
            // return $roles;
            // die;
        }else {
            $roles = $roles[0];
        }
        // on doit la normalement enregistrer en session le tableau pour actualiser a chauqe appel de la fonction
        $_SESSION['roles'] = $roles;
        return $roles;
    }
?>

<!-- function is ADMIN -->
<?php
    // @return boolean
    function isAdmin($bdd) {
        // doit verifier si le tableau role en session contient le nom du role recherché
        $id = $_SESSION['user']['id'];
        checkRoles($id,$bdd);
        if (!in_array('admin', $_SESSION['roles'])) {
            // si oui utilisateur à le role recherché
            return false;
            die;
        }else {
            // sinon il ne l'as pas donc false
            return true;
            die;
        }
    }
?>

<!-- function is SALARIE -->
<?php
    // @return boolean
    function isSalarie($bdd) {
        // doit verifier si le tableau role en session contient le nom du role recherché
        $id = $_SESSION['user']['id'];
        checkRoles($id,$bdd);
        if (!in_array('salarié', $_SESSION['roles'])) {
            // si oui utilisateur à le role recherché
            return false;
            die;
        }else {
            // sinon il ne l'as pas donc false
            return true;
            die;
        }
    }
?>

<!-- function getCategories -->
<?php 
    function getCategories($_id_livre, $bdd) {
        // genere la req sql pour recuperer les cat par rapport a un id livre
        $sql = "SELECT categorie.libelle 
        FROM categorie 
        INNER JOIN categorie_livre ON categorie_livre.id_categorie = categorie.id
        WHERE categorie_livre.id_livre = ? ";
        // prepare
        $req = $bdd->prepare($sql);
        // execute
        $req->execute([$_id_livre]);
        // fetchAll
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
        // creer un tableau qui conteint les cat
        $tab_cat = [];
        // foreach pour récuperer la  valeur des sous tableau + implode pour les mettre en string
        foreach ($categories as $cat){
            $tab_cat[] = implode($cat);
        }
        // return implode (separateur, tableau)
        return implode(', ', $tab_cat);
    }
?>

<!-- function getAuteur -->
<?php 
    function getAuteurs($_id_livre, $bdd) {
        // genere la req sql pour recuperer les cat par rapport a un id livre
        $sql = "SELECT auteur.nom_de_plume
        FROM auteur 
        INNER JOIN auteur_livre ON auteur_livre.id_auteur = auteur.id
        WHERE auteur_livre.id_livre = ? ";
        // prepare
        $req = $bdd->prepare($sql);
        // execute
        $req->execute([$_id_livre]);
        // fetchAll
        $auteurs = $req->fetchAll(PDO::FETCH_ASSOC);
        // creer un tableau qui conteint les cat
        $tab_aut = [];
        // foreach pour récuperer la  valeur des sous tableau + implode pour les mettre en string
        foreach ($auteurs as $aut){
            $tab_aut[] = implode($aut);
        }
        // return implode (separateur, tableau)
        return implode(', ', $tab_aut);
    }
?>