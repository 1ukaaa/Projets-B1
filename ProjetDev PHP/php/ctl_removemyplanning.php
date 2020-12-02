<?php
if(isLogged()){
    global $VAR_LOGGED;
    $id = sessionVar($VAR_LOGGED);
    if(!is_bool($id)){
		includePhp('dao_room');
		removeMyPlanning($id);
		header('Location: ?page=removedmyplanning');
		exit(0);
	}
}
header('Location: ?page=removedallplanning&error=8');
exit(0);
