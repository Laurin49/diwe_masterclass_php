<div class="user-container">
    <?php foreach ($users as $user) : ?>
        <h4>
            <a href="Users=user?userid=<?php echo $user->userid; ?>">
                <?php echo $user->username; ?>
            </a>
        </h4>
    <?php endforeach; ?>
</div>
