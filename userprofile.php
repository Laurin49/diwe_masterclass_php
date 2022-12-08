<?php
    require_once "init.php";

    $userDB = $container->build('userDatabase');
    $user = $userDB->getUser($_GET['userid']);

    if (!empty($user)) {
        echo "User-Vor und Nachname: " . $user['firstname'] . ", " . $user['lastname'] . "<br />";
        echo "User-Name: " . $user['username'] . "<br />";
        echo "User-Email: " . $user['mail'] . "<br />";
    }
?>
