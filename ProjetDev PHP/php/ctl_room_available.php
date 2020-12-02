    <?php

$start = postVar("start");
$end = postVar("end");

if(!is_bool($start) && !is_bool($end)){
	// start should be before end
	if($start > $end){
		header("Location: ?page=form_room_available&error=3");
		die();
	}
	includePhp('dao_room');
	$availables = getAvailableRooms($start, $end);
	echo ("Numéros des chambres disponibles : <br>");
	foreach ($availables as $available) {
	    echo ("Chambre ");
	    echo $available . "<br>" . "\n";
    }
    echo '<a class="boutton" href="?page=form_registration"><button>Réserver</button></a>';
    echo '<a class="boutton" href="?page=form_room_available"><button>Retour</button></a>';
    die();
}

header("Location: ?page=form_room_available&error=4");
die();
