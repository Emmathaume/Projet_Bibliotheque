<?php session_start();?>



<!-- VERIFICATION SESSION MDP -->
<?php 
    // session_destroy();
    // si mon tableau info log existe
    if (isset ($_SESSION['info-log'])) {
        // boucle sur le tableau avec un foreach pour verifier les value
        foreach ($_SESSION['info-log'] as $key => $value) {
            //  key = nom du champs et value = saisie utilisateur

            // Creer une variable qui permet de vérifier si les value sont valide
            $check = false;
            // s'assurer que le bouton ne soit pas pris en compte
            if ($key != 'login-form') {
                // on switch sur la key user et password pour verifier leur value
                switch ($key) {
                    case 'name_user':
                        if ($value == 'admin') {
                            $check = true;
                        }
                        break;
                    case 'password':
                        if ($value == 'DWWM22') {
                            $check = true;
                        }
                        break;
                }
                // on remplis les tableau correspondant ingo-log ou error
                if ($check) {
                    $_SESSION["ok-log"] += [$key => $value];
                }
                else {
                    $_SESSION['error-log'][] = $key;
                }
                // on redirige vers la page correspondante
                if (isset($_SESSION['error-log'])) {
                    header ('location:login.php');
                }
                if (count($_SESSION['ok-log']) === 2 ) {
                    header ("location:index.php");
                }
            }
        }
    }
// var_dump($_SESSION["ok-log"]);
// var_dump($_SESSION["error-log"]);
?>




