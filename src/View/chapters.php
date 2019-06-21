<?php
ob_start(); ?>

    <div id="content" class="row content">
        <section class="col-sm-9 ">

            <h4>Tous les chapitres</h4>

            <?php foreach($allChapters as $c): ?>
                <h5><?= $c->getTitle(); ?></h5>
                <p><?= $c->getContent(); ?></p>
                <p> <?= $c->getCreationDate(); ?></p>

            <?php endforeach; ?>
        </section>

        <section class="col-sm-3">
            <h4>L'auteur : </h4>
            <aside>
                <img src="https://cdn.icon-icons.com/icons2/1736/PNG/512/4043279-afro-avatar-male-man_113244.png"
                     alt="Jean Forteroche, auteur de Billet Simple pour l'Alaska" height="160" width="170"
                     class="mx-auto d-block">
                <h5>Jean Forteroche</h5>
                <p>Jean Forteroche est né en 1962 à Menton. Attiré dés son plus jeune âge par le froid et la neige, il déménage à Toronto en 1979 pour y poursuivre ses études. Il n'en repartira jamais.</p>
            </aside>
            <h4>Réseaux sociaux</h4>
            <aside id="social">
                    <span id="facebook" class="socialLink">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </span>
                <span id="twitter" class="socialLink">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </span>
                <span id="instagram" class="socialLink">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </span>
                <span id="linkedin" class="socialLink">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </span>
            </aside>
        </section>
    </div>

<?php
$content=ob_get_clean();
require "src/View/template.php";
?>