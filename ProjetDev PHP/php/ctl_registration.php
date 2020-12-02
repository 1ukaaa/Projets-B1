<?php

$start = postVar("start");
$end = postVar("end");
$chambre_id = postVar("chambre_id");
if(!is_bool($start) && !is_bool($end) && !is_bool($chambre_id) && isLogged()){
	global $VAR_LOGGED;
	$id = sessionVar($VAR_LOGGED);
	$lastdate = $start;
	includePhp('dao_room');
	if ($chambre_id > 0 and $chambre_id < 13) {
		if ($end > $start) {
			while ($end >= $lastdate) {
				var_dump($start);
				var_dump($end);
				var_dump($chambre_id);
				var_dump($lastdate);
				var_dump($id);
				
				
				createReservation($lastdate, $chambre_id, $id, $id);
				$lastdate = date('Y-m-d', strtotime($lastdate. ' + 1 days'));
				header('Location: ?page=reserved');
			}
			exit(0);
		}
		header('Location: ?page=reserved&error=6');
		exit(0);
	}
	header('Location: ?page=reserved&error=5');
	exit(0);
}