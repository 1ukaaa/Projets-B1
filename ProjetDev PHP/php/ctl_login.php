<?php

includePhp('dao_user');

$login = postVar('login');
$password = postVar('password');

if(!is_bool($login) && !is_bool($password)){
    // global $ADMIN_LOGIN;
    // global $ADMIN_PWD;
    $id = authenticate($login, $password);
    if($id != false){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        global $VAR_LOGGED;
        $_SESSION[$VAR_LOGGED] = $id;
        header('Location: ?');
        exit(0);
    }
}
// FAILURE !
header('Location: ?page=form_login&error=1');
exit(0);