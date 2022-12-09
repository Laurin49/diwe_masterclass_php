<?php
    require_once "init.php";

    $userController = $container->build('userController');
    $userController->userprofile($_GET['userid']);

?>
