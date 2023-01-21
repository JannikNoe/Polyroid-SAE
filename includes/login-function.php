<?php

function login( array &$errors ) : bool {
    /** @var string|NULL $username */
    $email = filter_input( INPUT_POST, 'email' );
    /** @var string|NULL $password */
    $password = filter_input( INPUT_POST, 'password' );

    /** @var array|NULL $user */
    $user = get_user( $email );

    // Wenn die Variable $user einen Array zurückgibt, gibt es einen Nutzer für den Nutzernamen
    // Wenn die Funktion NULL zurückgibt, gib es keinen Nutzer für den Nutzernamen

    if ( is_null( $user ) === FALSE ) {
        if( $user[ 'password' ] === md5( $password ) ) {

            return TRUE;
        }
    }

    $errors [ 'login' ][] = 'Die Kombination aus E-Mail-Adresse und Passwort existiert nicht';

    return FALSE;
}
