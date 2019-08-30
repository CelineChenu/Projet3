<?php
ob_start(); ?>


    <div class="login-form">
        <form action="http://localhost/projet3/login" method="post">
            <h2 class="text-center">Identification</h2>
            <div class="form-group">
                <input type="text" name="login" class="form-control" placeholder="Identifiant" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
            </div>
        </form>
    </div>

<?php
$content=ob_get_clean();
require "src/View/template.php";
?>