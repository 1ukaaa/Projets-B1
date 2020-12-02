<?php
includePhp('dao_user');

$login = postVar('login');
$password = postVar('password');
$lastname = postVar('lastname');

if(!is_bool($login) && !is_bool($password) && !is_bool($lastname)){
    $id=createUser($login, $password, $lastname);
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    global $VAR_LOGGED;
    $_SESSION[$VAR_LOGGED] = $id;
    header('Location: ?');
    exit(0);
}
header("Location: ?page=form_login&error=2");
exit(0);
