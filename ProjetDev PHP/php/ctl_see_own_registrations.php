<?php
global $VAR_LOGGED;
$id = sessionVar($VAR_LOGGED);
if(!is_bool($id)){
    includePhp('dao_room');
    $registrations[] = getOwnRegistrations($id);
    echo ("Réservations faites : <br>");
    print_r(($registrations));
}