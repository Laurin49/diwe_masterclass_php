<?php require_once __DIR__ . "/../../../App/Design/header.php"; ?>
<?php require_once __DIR__ . "/Elements/navbar.php"; ?>

<div class="container">
    <h1 class="alert alert-warning text-center">Willkommen im Dashboard <?php echo $_SESSION["username"] ?></h1>
</div>
<br>
<br>
<br>
<div class="container">
    <div class="row align-items-start">
        <div class="col">
            <div class="card">
                <img style="width: 100px; margin: auto; padding: 10px" src="../../../../../masterclass/mainsrc/UserDashboard/MVC/Views/Medien/PngItem_330111.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Zu deinem Fotoalben</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Zu den Alben</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img style="width: 100px; margin: auto; padding: 10px" src="../../../../../masterclass/mainsrc/UserDashboard/MVC/Views/Medien/Profile-PNG-Clipart.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Zu deinem Profil</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Zum Profil</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img style="width: 100px; margin: auto; padding: 10px" src="../../../../../masterclass/mainsrc/UserDashboard/MVC/Views/Medien/NicePng_android-png_2371034.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Setting</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Zu den Setting</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php require_once __DIR__ . "/Elements/footer.php"; ?>
<?php require_once __DIR__ . "/../../../App/Design/footer.php"; ?>
