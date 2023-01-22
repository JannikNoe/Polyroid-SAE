
<?php

error_reporting( E_ALL);
ini_set( 'display_errors', 1);

// Session starten
session_start();

// Ausgabe der Session per var_dump
var_dump( $_SESSION );

define( 'DATA_USERS' , __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'users.txt' );

/** @var array $errors */
$errors = [];

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php';

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'login-function.php';   //enthält Funktionen zur Validierung der Nutzereingaben für den Login
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'register-function.php';   //enthält Funktionen zur Validierung der Nutzereingaben für die Registrierung
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'templates.php';           // Funktionen zum arbeiten in Templates
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'users.php';               // Arbeiten mit der user.txt. Datei


if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    switch( $_GET[ 'page' ] ?? NULL ) {
        // Login
        case 'login':
            if ( login( $errors ) ) {
                redirect( "?page=profile", 'login' );
            }
            break;
        // Registrierung
        default:
            if ( register( $errors ) ) {
                redirect( "?page=login", 'register' );
            }
            break;
    }
}

switch( $_GET[ 'page' ] ?? NULL ) {
    case 'login':
        // Einbinden vom Template 'login.php'
        include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'login.php';
        break;
    case 'logout':
        logout();
        // Weiterleitung zum Login
        redirect( "?page=login", 'logout' );
        break;
    case 'profile':
        if ( is_loggedin() ) {
            // Einbinden vom Template 'profile.php'
            include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'profile.php';
        }
        else {
            redirect( "?page=login", 'profile' );
        }
        break;
    default:
        // Einbinden vom Template 'register.php'
        include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'register.php';
        break;
}

 //include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR  . 'register.php';





