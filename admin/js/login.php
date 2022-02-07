<?php session_start(); 
// initialisation du tableau
$_SESSION = array(
    "info-log" => array(),
    "ok-log" => array(),
    "error-log" => array()
);
?>

<script type="text/javascript">

    /* /* fonction qui récupère Username et Password */ 
function validateForm(){

    // récupere la valeur de l'input user name
    let user_name = document.querySelector('[name=name_user]').value;
    
    // récupère la value de password
    let password = document.querySelector('[name="password"]').value;

    // Procéder a la vérification
    if (user_name == "" || password == "") {

        let span_error_name = document.querySelector('.user_error');
        let span_error_password = document.querySelector('.password_error');

            if (user_name == "") {
                span_error_name.innerHTML = "Veuillez Entrez un nom d'utilisateur";
                // recuperer l'input user
                let input_user = document.querySelector('[name=name_user]');
                console.log(input_user);
                input_user.style.borderColor = "red";
                input_user.style.borderStyle = "solid";
                input_user.style.borderWidth = "1px";
                    // Vider la span du mdp
                span_error_password.innerHTML = "";
                return false;      
                
            }else {
                span_error_name.innerHTML ="";
            }
            if (password == "") {
                span_error_password.innerHTML = "Veuillez entrez un mot de passe";
                let input_password = document.querySelector('[name="password"]');

                input_password.style.borderColor = "red";
                input_password.style.borderStyle = "solid";
                input_password.style.borderWidth = "1px";
                return false;
            }
    }
    //  return true;
    }
</script>

<?php 
var_dump($_POST);
    if (isset($_POST)) {
        // boucler sur le tableau post en récuperant le nom du champ+sa value
        foreach ($_POST as $key => $value) {
            //  $key retourne le nom du champs
            // $value retourne l'entré utilisateur
            // echo $key . '</br>'. $value . '</br>';
            // eliminer le login_form
            if ($key != "login_form") {
                // verifier que les value sont != de empty
                if ($value != "") {
                    echo 'jsuis pas vide' . '</br>' ;
                    $_SESSION['info-log'] += [$key => $value];
                    var_dump($_SESSION['info-log']);
                    header ('location:../action.php');
                }
            }
        }
    }
?>