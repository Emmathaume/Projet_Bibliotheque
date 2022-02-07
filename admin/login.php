<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONT ROBOTO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/login.css">
    <title>Se Connecter</title>
</head>
<body class="m-0">
    
    <div class="content-container">
        <div class="wrap-container">

            <form action="js/login.php" method="POST" onsubmit="return validateForm()">
                <div class="login-form-title mb-30">
                    Connexion
                </div>
                <div class="wrap-input validate-input mb-20" data-validate="Enter un nom d'utilisateur" >
                    <input class="input-login " name="name_user" type="text" placeholder="Nom d'utilisateur">
                    <span class="user_error"></span>
                </div>
                
                <div class="wrap-input validate-input" data-validate="Entrez un mot de passe ">
                    <input class="input-login"  name="password" type="password" placeholder="Votre mot de passe">
                    <span class="password_error"></span>
                </div>
                <span class="forget-password mb-30"><a href="">Mot de passe oublié</a></span>
                
                <div class="submit-login-container">
                    <input class="submit-login" type="submit" name="login_form" value="Se connecter">
                </div>
            </form>
            <div class="sign-in">
                <span class=""><a href="">Créer un compte</a></span>
            </div>

        <!-- end wrap-container -->
        </div>
 
    <!-- end content container -->
    </div>


<!-- <script type="text/javascript" src="js/login.js"></script> -->

</body>
</html>