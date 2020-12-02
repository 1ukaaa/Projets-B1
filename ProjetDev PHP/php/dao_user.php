    <?php

function getUserById($id){
    $sql = 'SELECT `lastname` FROM `users` WHERE `id` = :id';
    $db = getConnection();
    if(!$db){
        // Fail connecting to db
        die();
    }
    $select = $db->prepare($sql);
    $select->execute(array('id'=>$id));
    $result = $select->fetchAll();
    return empty($result) ? false : array('lastname' => $result[0]['lastname']);
}

function createUser($login, $password, $lastname){
    $sql = 'INSERT INTO `users` (`login`, `password`, `lastname`) VALUES (:login, :password, :lastname);';
    $db = getConnection();
    if(!$db){
        // Fail connecting to db
        die();
    }
    $insert = $db->prepare($sql);
    $insert->execute(array('login'=>$login, 'password'=>$password, 'lastname'=>$lastname));
    return $db->lastInsertId();
    // To do : chiffrer le mdp
}

function updateUser($password, $firstname, $lastname){

}

function deleteUser($id){

}

function authenticate($login, $password){
    $sql = 'SELECT `id` FROM `users` WHERE `login` = :login AND `password` = :password;';
    $db = getConnection();
    if(!$db){
        // Fail connecting to db
        die();
    }
    $select = $db->prepare($sql);
    $select->execute(array('login'=>$login, 'password'=>$password));
    $result = $select->fetchAll();
    return empty($result) ? false : $result[0]['id'];
}