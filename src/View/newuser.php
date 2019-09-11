<?php
ob_start(); ?>


    <div class="register-form">
        <form action="http://localhost/projet3/adduser" method="post">
            <h2 class="text-center">Création de compte</h2>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Pseudo" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="login" class="form-control" placeholder="Identifiant" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Inscription</button>
            </div>
        </form>
    </div>

<?php $content=ob_get_clean();?>
<?php require "src/View/templateadmin.php"; ?>
