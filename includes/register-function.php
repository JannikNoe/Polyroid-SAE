<?php

function forms_submitted() : bool {

    return $_SERVER[ 'REQUEST_METHOD' ] === 'POST';
}

/**function print_input_errors( array $errors, string $input_name) : void{
 *    if ( isset( $errors[ $input_name ] ) ) {
 *      echo '<span id="errormessage"><?= $error_msg ?></span>';
 *  }
 *  }
 */


function register( array &$errors ) : bool {


    /** @var string|NULL $username */
    $username = filter_input( INPUT_POST, 'username');

    /** @var string|NULL $name */
    $name = filter_input( INPUT_POST, 'name');

    /** @var string|NULL $birthday */
    $birthday = filter_input( INPUT_POST, 'birthday');

    /** @var string|NULL $email */
    $email = filter_input( INPUT_POST, 'email');

    /** @var string|NULL $password */
    $password = filter_input( INPUT_POST, 'password');

    /** @var string|NULL $password_repeat */
    $password_repeat = filter_input( INPUT_POST, 'password_repeat');

    /** @var string|NULL $sexuality */
    $sexuality = filter_input( INPUT_POST, 'sexuality');

    /** @var string|NULL $gender */
    $gender = filter_input( INPUT_POST, 'gender');

    /** @var string|NULL $gendersearch */
    $gendersearch = filter_input( INPUT_POST, 'genderresearch');

    /** @var string|NULL $agb */
    $agb = filter_input( INPUT_POST, 'agb');

    /** @var string|NULL $privacy */
    $privacy = filter_input( INPUT_POST, 'privacy');

    /** @var string|NULL $youthprotection */
    $youthprotection = filter_input( INPUT_POST, 'youthprotection');

/////////////////////

    /** @var bool $validate_username */
    $validate_username = validate_username( $errors, $username);

    /** @var bool $validate_gender */
    $validate_gender = validate_gender( $errors, $gender);

    /** @var bool $validate_sexuality */
    $validate_sexuality = validate_sexuality ($errors, $sexuality);

    /** @var bool $validate_gendersearch */
    $validate_gendersearch = validate_gendersearch ($errors, $gendersearch);

    /** @var bool $validate_email */
    $validate_email = validate_email ($errors, $email);

    /** @var bool $validate_password */
    $validate_password = validate_password ($errors, $password, $password_repeat );

    /** @var bool $validate_agb */
    $validate_agb = validate_agb ($errors, $agb);

    /** @var bool $validate_privacy */
    $validate_privacy = validate_privacy ($errors, $privacy);

    /** @var bool $validate_youthprotection */
    $validate_youthprotection = validate_youthprotection ($errors, $youthprotection);



    if (
        $validate_username
        && $validate_gender
        && $validate_gendersearch
        && $validate_sexuality
        && $validate_email
        && $validate_password
        && $validate_agb
        && $validate_privacy
        && $validate_youthprotection

    ) {

        /** @var array $user_data */
        $user_data = [
            'username' => $username,
            'gender' => $gender,
            'gendersearch' => $gendersearch,
            'sexuality' => $sexuality,
            'email' => $email,
            'password' => md5( $password ),
            'agb' => $agb,
            'privacy' => $privacy,
            'youthprotection' => $youthprotection
        ];

        $user = [];

        foreach( $user_data as $key => $value ) {
             $user[] = "{$key}:{$value}";
        }

        $new_user = implode( '|' , $user);

        file_put_contents( DATA_USERS, "{$new_user}\n", FILE_APPEND );

        {
            echo "
                 <head>
                    <meta charset='UTF-8'>
                    <title>Registrierung</title>
                    <link href='assets/css/mainstyle.css' rel='stylesheet'>
                    <link href='assets/css/registerstyle.css' rel='stylesheet'>
                  </head>
                 <body>
                 <section class='bg'>
                     <div class='finalbox'>
                        <div class='polyroidImgRegister'>
                            <img src='assets/img/logo/logo_986.svg'>
                        </div>
                        <div class='progress-bullets-wrapper'>
                            <div class='progress-bullet bullet-active'></div>
                            <div class='progress-bullet bullet-active'></div>
                            <div class='progress-bullet bullet-active'></div>
                            <div class='progress-bullet bullet-active'></div>
                            <div class='progress-bullet bullet-active'></div>
                            <div class='progress-bullet bullet-active'></div>
                            <div class='progress-bullet bullet-active'></div>
                            <div class='progress-bullet bullet-active'></div>
                            <div class='progress-bullet bullet-active'></div>
                        </div>
                        <div class='final-title'>
                            <h2>Nice</h2>
                            <p>Wir haben dir an die Adresse</p>
                            <h6> test@polyroid.de</h6>
                            <p>eine E-Mail mit dem Verifizierungslink geschickt. Bestätige deine E-Mail-Adresse um dein Polyroid Erlebnis zu starten.</p>
                        </div>
                        <div class='button-wrapper'>
                            <a href='?page=login'><button class='button-forward'>Zum Login</button></a>
                            <span class='send-again' id='mailSendAgain'>E-Mail erneut senden</span>
                        </div>
                        <div class='background-shape'>
                            <img src='assets/img/backgroundshape-regist.svg'>
                        </div>
                    </div>
                </section>
            </body>";
            exit();
        }

    }

    return FALSE;
}


function validate_password( array &$errors, ?string $password, ?string $password_repeat ) : bool {
    if (is_null( $password) || empty( $password ) ) {
        $errors[ 'password' ][] = 'Das Passwort muss eingetragen werden.';
    }

    if ( strlen( $password ) <= 8 ) {
        $errors[ 'password' ][] = 'Das Passwort muss mindestens 8 Zeichen enthalten';
    }

    if ( preg_match( '/\s/', $password ) === 1 ){
        $errors[ 'password' ][] = 'Das Passwort darf keine Leerzeichen enthalten';
    }

    if ( $password !== $password_repeat ) {

        $errors[ 'password_repeat' ][] = 'Das Passwort stimmt nicht überein';

    }

    return isset ($errors[ 'password'] ) === FALSE || count( $errors[ 'password' ] ) === 0;
}


function validate_email( array &$errors, ?string $email ) : bool {
    if ( is_null ( $email) || empty( $email ) ) {
        $errors[ 'email' ][] = 'Es muss eine E-Mail-Adresse eingetragen werden.';
    }

    // Überprüfen ob nutzername existiert
    if ( email_exists ( $email ) ) {
        $errors[ 'email'][] = 'Die E-Mail-Adresse existiert bereits';
    }

    if ( filter_var( $email, FILTER_SANITIZE_EMAIL ) === FALSE) {
        $errors[ 'email' ][] = 'Die E-Mail-Adresse ist fehlerhaft.';
    }

    return isset ( $errors[ 'email'] ) === FALSE;
}

function validate_gender( array &$errors, ?string $gender ) : bool {
    //Überprüfen ob das Gender NULL oder leer ist
    if ( is_null( $gender ) || empty( $gender ) ) {
        $errors[ 'gender' ][] = 'Es muss ein Geschlecht ausgewählt werden';
    }
    // Überprüfen ob Gender validen Wert hat
    if (in_array( $gender, [ 'gender--female', 'gender--male', 'gender--human'] ) === FALSE) {
        $errors[ 'gender' ][] = 'Das Geschlecht ist ungültigt,';
    }

    return isset ($errors[ 'gender' ] ) === FALSE || count( $errors[ 'gender' ] ) === 0;
}

function validate_gendersearch( array &$errors, ?string $gendersearch ) : bool {
    //Überprüfen ob das Gender NULL oder leer ist
    if ( is_null( $gendersearch ) || empty( $gendersearch ) ) {
        $errors[ 'gendersearch' ][] = 'Es muss ein Geschlecht ausgewählt werden';
    }
    // Überprüfen ob Gender validen Wert hat
    if (in_array( $gendersearch, [ 'genderresearch--female', 'genderresearch--male', 'genderresearch--human'] ) === FALSE) {
        $errors[ 'gendersearch' ][] = 'Das Geschlecht ist ungültigt,';
    }

    return isset ($errors[ 'gendersearch' ] ) === FALSE || count( $errors[ 'gendersearch' ] ) === 0;
}

function validate_sexuality( array & $errors, ?string $sexuality ) : bool {
    //Überprüfen ob sexualität 0 oder leer
    if ( is_null( $sexuality ) || empty( $sexuality ) ) {
        $errors[ 'sexuality' ][] = 'Wähle deine Sexualität.';
    }

    return isset ($errors[ 'sexuality' ] ) === FALSE || count ($errors[ 'sexuality' ] ) === 0;
}



function validate_username( array & $errors, ?string $username ) : bool {

    // Überprüfen ob der Nutzername Null oder '' ist.
    if ( is_null( $username ) || empty( $username ) ) {
        $errors[ 'username' ][] = 'Der Nutzername darf nicht leer sein.';
    }

    // Überprüfen ob nutzername besteht
    if ( username_exists ($username ) ) {
        $errors[ 'username'][] = 'Der Username existiert bereits';
    }

    // Überprüfen ob Nutzername kleiner als 4
    if ( strlen( $username ) < 4 ) {
        $errors[ 'username' ][] = 'Der Nutzername darf nicht kleiner als 4 Buchstaben sein.';
    }

    // Überprüft ob Nutzername größer als 18
    if ( strlen( $username ) > 18 ) {
        $errors[ 'username' ][] = 'Der Nutzername darf nicht länger als 18 Zeichen sein.';
    }
    // Überprüfen ob der Nutzername Whitespace enthält
    if ( preg_match( '/\s/', $username ) === 1 ){
        $errors[ 'username' ][] = 'Der Username darf keine Leerzeichen enthalten';
    }


    return isset( $errors[ 'username' ] ) === FALSE || count( $errors[ 'username' ] ) === 0;
}

function validate_agb( array &$errors, ?string $agb) : bool {
    if (is_null( $agb ) || $agb !== '1' ){
        $errors[ 'agb' ][] = 'Bitte akzeptiere die AGB bevor du weitermachst.';
    }

    return isset( $errors[ 'agb '] ) === FALSE || count( $errors[ 'agb' ] ) === 0;
}

function validate_privacy( array &$errors, ?string $privacy) : bool {
    if (is_null( $privacy ) || $privacy !== '1' ){
        $errors[ 'privacy' ][] = 'Bitte akzeptiere die Datenschutzbestimmung bevor du weitermachst.';
    }

    return isset( $errors[ 'privacy '] ) === FALSE || count( $errors[ 'privacy' ] ) === 0;
}

function validate_youthprotection( array &$errors, ?string $youthprotection) : bool {
    if (is_null( $youthprotection ) || $youthprotection !== '1' ){
        $errors[ 'youthprotection' ][] = 'Bitte akzeptiere die Datenschutzbestimmung bevor du weitermachst.';
    }

    return isset( $errors[ 'youthprotection '] ) === FALSE || count( $errors[ 'youthprotection' ] ) === 0;
}






