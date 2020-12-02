<?php

// Site information
$DEFAULT_PAGE = 'welcome';
$LOGGED_PAGES = array('logged');

// DB info
$DB_HOST = 'localhost';
$DB_NAME = 'hotel_neptune';
$DB_LOGIN = 'root';
$DB_PASSWORD = '';

// Login information
$ADMIN_LOGIN = 'admin';
$ADMIN_PWD = '123456';

// Form information
$VAR_PAGE = 'page';
$VAR_ACTION = 'action';
$VAR_LOGIN = 'login';
$VAR_PASSWORD = 'password';
$VAR_LOGGED = 'logged';

$ERRORS = [
	1 => " <div class='failed'> <a> Login failed ! </a></div> ",
	2 => "<div class='failed'> <a> Register failed ! </a></div>",
	3 => "Nani the fuck !",
    4 => "Missing field !",
    5 => "Ta chambre n'existe pas mon pote.",
    6 => "Problème de date mon pote.",
    7 => "Tu n'es pas admin...",
    8 => "Tu n'es pas logged..."
];