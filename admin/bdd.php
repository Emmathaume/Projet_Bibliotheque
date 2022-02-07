<?php
// CONNEXION A LA BDD
        // Création des variables qui permettent de contenir les information
        // de connexion a la base de donnees
        $dsn='mysql:dbname=biblio2;host=localhost';
        $user= 'projet_bibliotheque';
        $password= 't(*eYz@s(OVxtj)Z'; 
        // permet de forcer l'encodage en utf8 
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
          );
        // Permet de verifier si le mot de passe est bon s'il est bon ok conexion 
        // sinon ça part dans le catch qui prend tjrs le meme paramètre(on peut y mettre une redirection)
        // die permet de stopper le script // get message renvoie 
        try {
            // Instanciation d'un nouvel objet PDO avec ses 3 paramètres obligatiore
            // pour lui permettre la connexion a la bdd
            //  + $option qui force l'encodage en utf8
            $bdd = new PDO ($dsn, $user, $password,$options);
        }catch (PDOException $e) {
            // die ('Problème de bdd'); // ok ok 
            echo 'erreur: ' . $e->getMessage(); // pour le dev
        }
?>