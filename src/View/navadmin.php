<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="?">Administration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a class="nav-item nav-link" href="<?= HOST ?>administration">Accueil <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?= HOST ?>gestion-chapitres">Gestion des chapitres</a>
                <a class="nav-item nav-link" href="<?= HOST ?>moderation">Modération des commentaires</a>
                <a class="nav-item nav-link" href="<?= HOST ?>logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </div>

        </div>
    </div>
</nav>