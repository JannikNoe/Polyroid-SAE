
<?php

error_reporting( E_ALL);
ini_set( 'display_errors', 1);

/** @var array $errors */
$errors = [];

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php';
require_once APPLICATIN_DIR . DIRECTORY_SEPARATOR . 'functions.php';

if ( forms_submitted() ) { // Prüft ob request von der Methode post ist und von nutzer abgeschickt ist
    register( $errors );
};

include_once APPLICATIN_DIR . DIRECTORY_SEPARATOR . 'register.php';
