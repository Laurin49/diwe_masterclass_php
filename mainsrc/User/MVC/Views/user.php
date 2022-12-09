<?php

    if (!empty($user)) : ?>
        <h3><?php echo "User-Vor und Nachname: " . $user->getName();?></h3>
        <h4><?php echo "User-Name: " . $user["username"];?></h4>
        <h4><?php echo "User-Email: " . $user->mail?></h4>
    <?php endif;