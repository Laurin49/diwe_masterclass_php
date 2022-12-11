<?php require_once __DIR__ . "/../../../App/Design/header.php"; ?>

<div class="col col-8 mt-4 offset-2">
    <div class="mb-3 container clearfix">
        <div class="">
            <a class="float-end" href="Logout"><button class="btn btn-secondary">Logout</button></a>
        </div>
    </div>
    <div class="container">
        <h1 class="alert alert-warning text-center">Willkommen im Dashboard <?php echo $_SESSION["username"] ?></h1>
    </div>
</div>

<?php require_once __DIR__ . "/../../../App/Design/footer.php"; ?>
