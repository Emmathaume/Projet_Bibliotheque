
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