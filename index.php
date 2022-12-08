<?php
    require_once "init.php";

    $userDB = $container->build('userDatabase');
    $users = $userDB->getUsers();
?>

<div class"users_container">
    <?php foreach ($users as $user) : ?>
        <h4>
            <a href="userprofile.php?userid=<?php echo $user['userid']; ?>">
                <?php echo $user['username']; ?>
            </a>
        </h4>
    <?php endforeach; ?>
</div>

