<?php

function getRooms(){

}

function getRoomById($id){

}

function getAvailableRooms($start, $end){
    $sql = 'SELECT c.numero FROM chambres AS c WHERE c.numero NOT IN (SELECT c.numero FROM chambres AS c, planning AS p WHERE c.numero = p.chambre_id AND p.jour BETWEEN :start AND :end GROUP BY c.numero)';
    $db = getConnection();
    if(!$db){
        // Fail connecting to db
        die();
    }
    $select = $db->prepare($sql);
    $select->execute(array('start' => $start, 'end' => $end));
    $roomIds = array();
    foreach ($select->fetchAll() as $line){
        $roomIds[] = $line['numero'];
    }
    return $roomIds;
}

function getRegistrations(){
    $sql = 'SELECT p.chambre_id, p.jour, p.reservation, p.paye, p.client_id, p.user_id FROM planning as p ORDER BY p.chambre_id, p.jour ASC';
    $db = getConnection();
    if(!$db){
        // Fail connecting to db
        die();
    }
    $select = $db->prepare($sql);
    $select->execute();
    $registrations = array();
    foreach ($select->fetchAll() as $line) {
        $registrations[] = array(
            'chambre_id' => $line['chambre_id'],
            'jour' => $line['jour'],
            'paye' => ($line['paye'] == -1 ? false : true),
            'reservation' => ($line['reservation'] == -1 ? false : true),
            'client_id' => $line['client_id'],
            'user_id' => $line['user_id']
        );
    }
    return $registrations;
}

function getOwnRegistrations($user_id){
    $sql = 'SELECT chambre_id, jour, reservation, paye, client_id, user_id FROM planning WHERE `user_id` = :user_id ORDER BY chambre_id, jour ASC';
    $db = getConnection();
    if(!$db){
        // Fail connecting to db
        die();
    }
    $select = $db->prepare($sql);
    $select->execute(array('user_id'=>$user_id));
    $registrations = array();
    foreach ($select->fetchAll() as $line) {
        $registrations[] = array(
            'chambre_id' => $line['chambre_id'],
            'jour' => $line['jour'],
            'paye' => ($line['paye'] == -1 ? false : true),
            'reservation' => ($line['reservation'] == -1 ? false : true),
            'client_id' => $line['client_id'] ,
            'user_id' => $line['user_id']
        );
    }
    return $registrations;
}

function createReservation($jour, $chambre_id, $client_id, $user_id){
    $paye = -1;
    $reservation = -1;
    $sql = 'INSERT INTO `planning` (`chambre_id`, `jour`, `paye`, `reservation`, `client_id`, `user_id`) VALUES (:chambre_id, :jour, :paye, :reservation, :client_id, :user_id);';
    $db = getConnection();
    if(!$db){
        die();
    }
    $insert = $db->prepare($sql);
    $insert->execute(array('chambre_id'=>$chambre_id, 'jour'=>$jour, 'paye'=>$paye, 'reservation'=>$reservation, 'client_id'=>$client_id, 'user_id'=>$user_id));
}

function removeAllPlanning(){
    $sql = 'DELETE FROM `planning`';
    $db = getConnection();
    if(!$db){
        die();
    }
    $insert = $db->prepare($sql);
    $insert->execute();
}

function seeMyPlanning($user_id){
    $sql = 'DELETE FROM `planning` WHERE `user_id` = :user_id';
    $db = getConnection();
    if(!$db){
        die();
    }
    $insert = $db->prepare($sql);
    $insert->execute(array('user_id'=>$user_id));
}

function removeMyPlanning($user_id){
    $sql = 'DELETE FROM `planning` WHERE `user_id` = :user_id';
    $db = getConnection();
    if(!$db){
        die();
    }
    $insert = $db->prepare($sql);
    $insert->execute(array('user_id'=>$user_id));
}

function addRoom($numero, $capacite, $etage, $douche, $exposition, $tarif_id){
    $sql = 'INSERT INTO `chambres` (`numero`, `capacite`, `exposition`, `douche`, `etage`, `tarif_id`) VALUES (:numero, :capacite, :exposition, :douche, :etage, :tarif_id);';
    $db = getConnection();
    if(!$db){
        die();
    }
    $insert = $db->prepare($sql);
    $insert->execute(array('numero'=>$numero, 'capacite'=>$capacite, 'exposition'=>$exposition, 'douche'=>$douche, 'etage'=>$etage, 'tarif_id'=>$tarif_id));
}

// function updateRoom(???){

// }

// function createRoom(???){

// }