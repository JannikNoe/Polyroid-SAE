<?php

function email_exists( ?string $email ) : bool {
    $users = get_users();

    foreach ( $users as $user) {

        if ( $user[ 'email' ] === $email ){
            return TRUE;
        }
    }

    return FALSE;
}

function get_user( string $email ) : ?array {
    /** @var array $users */
    $users = get_users();

    foreach( $users as $user ) {
        if ( $user[ 'email' ] === $email ) {

            return $user;
        }
    }

    return NULL;
}


function get_users() : array {
    $users = [];
    /** @var string $content */
    $content = file_get_contents( DATA_USERS );
    /** @var array $split_by_users */
    $split_by_users = explode( "\n", $content );

    foreach ( $split_by_users as $id => $user_line ) {
        $split_by_line = explode( '|', $user_line );

        foreach ( $split_by_line as $user_property ) {
            $split_by_dots = explode( ':', $user_property );

            // Überprüfen ob der array 'split_by_dots' zwei Werte enthält, um Leerzeilen auszuschließen
            if ( count( $split_by_dots ) === 2 ) {
                $key = $split_by_dots[ 0 ];
                $value = $split_by_dots[ 1 ];

                $users[$id][ $key ] = $value;
            }
        }
    }

    return $users;
}

function username_exists( ?string $username ) : bool {
    $users = get_users();
    foreach ( $users as $user){

        if ($user[ 'username' ] === $username ){
            return TRUE;
        }
    }

    return FALSE;
}