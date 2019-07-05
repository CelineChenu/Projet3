<?php
ob_start(); ?>

    <div id="content" class="row content">
        <section class="col-sm-9 ">

            <?php foreach($allChapters as $c): ?>

                <h4>Chapitre <?= $c->getChapterNumber(); ?></h4>
                <h5><?= $c->getTitle(); ?></h5>
                <p class="date">Publié le <?= $c->getCreationDate(); ?></p>
                <p><?= substr($c->getContent(),0 ,400); ?>... <a href="chapitre/<?= $c->getId()?>">Lire la suite</a></p>

            <?php endforeach; ?>
        </section>

        <section class="col-sm-3">
            <h4>L'auteur : </h4>
            <aside>
                <img src="./public/img/auteur.png"
                     alt="Jean Forteroche, auteur de Billet Simple pour l'Alaska" height="160" width="170"
                     class="mx-auto d-block">
                <h5>Jean Forteroche</h5>
                <p>Jean Forteroche est né en 1962 à Menton. Attiré dés son plus jeune âge par le froid et la neige, il déménage à Toronto en 1979 pour y poursuivre ses études. Il n'en repartira jamais.</p>
            </aside>
            <h4>Réseaux sociaux</h4>
            <aside id="social">
                    <span id="facebook" class="socialLink">
                        <a href="#"><i class="fab fa-facebook-f fa-2x"></i></a>
                    </span>
                <span id="twitter" class="socialLink">
                        <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                    </span>
                <span id="instagram" class="socialLink">
                        <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                    </span>
                <span id="linkedin" class="socialLink">
                        <a href="#"><i class="fab fa-linkedin-in fa-2x"></i></a>
                    </span>
            </aside>
        </section>
    </div>

<?php
$content=ob_get_clean();
require "src/View/template.php";
?>