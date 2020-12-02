<?php

includePhp('dao_room');
$registrations[] = getRegistrations();
echo ("Réservations faites : <br>");
print_r(($registrations));