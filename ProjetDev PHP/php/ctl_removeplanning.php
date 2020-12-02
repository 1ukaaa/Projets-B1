<?php
if(isLogged()){
    global $VAR_LOGGED;
    $id = sessionVar($VAR_LOGGED);
    if(!is_bool($id)){
		if ($id == 1){
			includePhp('dao_room');
			removeAllPlanning();
			header('Location: ?page=removedallplanning');
			exit(0);
		}
		header('Location: ?page=removedallplanning&error=7');
		exit(0);
	}
}
header('Location: ?page=removedallplanning&error=8');
exit(0);