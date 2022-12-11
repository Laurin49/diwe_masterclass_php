<?php require_once __DIR__ . "/../../../App/Design/header.php"; ?>

    <div id="loginform" class="col col-8 mt-4 offset-2">
        <h1>Login</h1>
        <br>
        <p style="color:red"><?php echo $error;  ?></p>
        <form method="post">
            <div class="row">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">Gib deine E-Mail Adresse an.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
                    <div id="passwordHelp" class="form-text">Gib dein Passwort an.</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

<?php require_once __DIR__ . "/../../../App/Design/footer.php"; ?>