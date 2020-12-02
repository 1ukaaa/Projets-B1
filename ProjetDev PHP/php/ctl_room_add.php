<?php
includePhp('dao_room');

$numero = postVar('numero');
$capacite = postVar('capacite');
$exposition = postVar('exposition');
$douche = postVar('douche');
$etage = postVar('etage');
$tarif_id = postVar('tarif_id');
if(isLogged()){
    global $VAR_LOGGED;
    $id = sessionVar($VAR_LOGGED);
    if(!is_bool($id)){
		if ($id == 1){
			if(!is_bool($numero) && !is_bool($capacite) && !is_bool($exposition) && !is_bool($douche) && !is_bool($etage) && !is_bool($tarif_id)){
				//Vérifier les données
				addRoom($numero, $capacite, $etage, $douche, $exposition, $tarif_id);
				header('Location: ?page=roomadded');
				exit(0);
			}
			header('Location: ?page=roomadded&error=4');
			exit(0);
		}
		header('Location: ?page=roomadded&error=7');
		exit(0);
	}
	header('Location: ?page=roomadded&error=8');
	exit(0);
}
header('Location: ?page=roomadded&error=8');
exit(0);
