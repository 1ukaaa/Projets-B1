<?php
if(isLogged()){
    // Connected
    includePhp('dao_user');
    global $VAR_LOGGED;
    $id = sessionVar($VAR_LOGGED);
    $user = getUserById($id);
    echo '<div class="all_bouton">
      <div class="bouton2">
        <p>
          <a href="?action=logout">Deconnexion</a>
        </p>
      </div>
    </div>';
    echo '<div class="box_connexion">'.'<div class="title">' .
 '<h1 class="h1_lastname">' . 'Bonjour ' . $user['lastname'] . '</h1>' . '</div>';
    echo '<a href="?action=see_own_registrations"><button>Afficher mes réservation(s)</button></a>';
    echo '<a href="?action=removemyplanning"><button>Enlever toute mes réservation(s)</button></a>';
    echo '<a href="?page=form_room_available"><button>Registration</button></a>';

}else if(getPage() != 'form_login'){
    // Pas connected
    echo '<div class="all_bouton">
      <div class="bouton2">
        <p>
          <a href="?page=form_login">Connexion</a>
        </p>
      </div>
    </div>';
    // echo '<a href="?page=form_register_user"><button>REGISTER !!</button></a>';
}

if(isLogged() && $id == 1) {
    echo '<a href="?page=form_add_room"><button>Ajouter une chambre</button></a>';
    echo '<a href="?action=see_registrations"><button>Voir les réservations</button></a>';
    echo '<a href="?page=administration"><button>Voir les clients</button></a>';
    echo '<a href="?page=administration"><button>Voir les chambres</button></a>';
    echo '<a href="?action=removeplanning"><button>Enlever toute les réservation(s)</button></a>';
}
