<?php
ob_start(); ?>

    <div id="content" class="row content">
        <section class="col-sm-9 ">

            <h4>Chapitre numéro <?= $result->getChapterNumber(); ?></h4>


            <h5><?= $result->getTitle(); ?></h5>

            <p><?= $result->getContent(); ?></p>

            <p><?= $result->getCreationDate(); ?></p>
        </section>

        <section class="col-sm-3">
            <h4>L'auteur : </h4>
            <aside>
                <img src="../public/img/auteur.png"
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

<section class="row">

    <?php foreach ($result->getComments() as $co): ?>
        <div class="col-sm-8 offset-sm-2">
            <p><?= $co->getUsername(); ?></p>
            <p><?= $co->getContent(); ?></p>
            <p><?= $co->getCommentDate(); ?></p>
        </div>

    <?php endforeach; ?>
</section>

<?php
$content=ob_get_clean();
require "src/View/template.php";
?>