<?php

global $errors;
// var_dump( $errors );
// var_dump( $_POST );

// var_dump($_SERVER['REQUEST_METHOD'] );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="assets/css/mainstyle.css" rel="stylesheet">
    <link href="assets/css/registerstyle.css" rel="stylesheet">
    <link href="assets/css/loginstyle.css" rel="stylesheet">
</head>
<body>
<section class="bg">
    <form method="post">
        <article id="welcomebox" style="display: block;">
            <div class="registerbox">
                <div class="polyroidImgRegister">
                    <img src="assets/img/logo/logo_986.svg">
                </div>
                <div class="title-wrapper">
                    <h3>Willkommen zurück!</h3>
                    <h4>Wie möchtst du dich Anmelden?</h4>
                </div>
                <div class="login-wrapper">
                   <div class="username-login-wrapper">
                       <label for="email">E-Mail-Adresse</label>
                       <input id="email" type="email" name="email" placeholder="Deine E-Mail-Adresse"/>
                   </div>
                    <div class="password-login-wrapper">
                        <label for="password">Passwort</label>
                        <input id="password" type="password" name="password" placeholder="Dein Passwort"/>
                    </div>
                    <div class="password-forgotten-wrapper">
                        <h6>Passwort vergessen</h6>
                    </div>
                    <div class="error-wrapper">
                        <?php if ( isset( $errors[ 'login' ] ) ):?>
                            <?php  foreach( $errors[ 'login' ] as $error_msg ):?>
                                <span id="errormessage"><?= $error_msg ?></span>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </div>
                    <div class="login-submit">
                        <input type="submit" value="login">
                        <a href="?page=register">Jetzt registrieren</a>
                    </div>
                </div>
                <div class="line-wrapper">
                    <hr>
                    <p>oder</p>
                    <hr>
                </div>
                <div class="register-googleApple-wrapper">
                    <div class="signIn-with-apple-wrapper">
                        <img src="assets/img/apple-icon.svg">
                        <h6>Sign in with Apple</h6>
                    </div>
                    <div class="signIn-with-google-wrapper">
                        <img src="assets/img/google-icon.svg">
                        <h6>Sign in with Google</h6>
                    </div>
                </div>
            </div>
        </article>
    </form>
</section>
</body>
</html>
