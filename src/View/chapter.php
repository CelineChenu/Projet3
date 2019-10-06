<?php
ob_start(); ?>

    <div id="content" class="row content">
        <section class="col-sm-9 ">

            <h4>Chapitre numéro <?= $result->getChapterNumber(); ?></h4>
            <h5><?= $result->getTitle(); ?></h5>
            <p class="date">Publié le <?= $result->getCreationDate(); ?></p>
            <p><?= $result->getContent(); ?></p>

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
                        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                    </span>
                <span id="twitter" class="socialLink">
                        <a href="#"><i class="fab fa-twitter-square fa-2x"></i></a>
                    </span>
                <span id="instagram" class="socialLink">
                        <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                    </span>
                <span id="linkedin" class="socialLink">
                        <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
                    </span>
            </aside>
        </section>
    </div>

    <h4>Commentaires : </h4>
    <section class="row">

        <?php foreach ($result->getComments() as $co): ?>
            <div class="col-sm-8 offset-sm-1">
                <p class="date">Commentaire posté le <?= $co->getCommentDate(); ?> : </p>
                <p class="username"><?= htmlspecialchars($co->getUsername()) ; ?></p>
                <p>
                    <?php if ($co->getReported()== true) :
                        echo '<i>Ce commentaire a été signalé et est en cours de modération.</i>';
                    elseif ($co->getModerated()== true) :
                        echo '<i>Ce commentaire a été supprimé par le modérateur.</i>';
                    else :
                    echo htmlspecialchars($co->getContent());
                    ?>
                </p>

                <a title="Signaler ce commentaire" href="<?= HOST ?>signaler-commentaire/<?= $result->getId(); ?>-<?= $co->getId(); ?>" class="button cm-reportButton"><i class="fas fa-exclamation-triangle"></i> Signaler ce commentaire</a>
                    <?php endif; ?>
            </div>

        <?php endforeach; ?>

        <div class="col-sm-6">
            <h4 class="comment">Publier un commentaire</h4>
            <article class="post">
                <?php if(isset($_SESSION['comment-error'])) :?>
                    <div> <?= $_SESSION['comment-error'] ?></div>
                    <?php unset($_SESSION['comment-error']); endif; ?>
                <form action='<?= HOST ?>ajouter-commentaire' method="post">
                    <div class="form-group ">
                        <label class="control-label " for="username">Votre nom</label>
                        <input class="form-control" id="username" name="username" type="text" required/>
                    </div>

                    <div class="form-group ">
                        <label class="control-label" for="content">Commentaire</label>
                        <textarea class="form-control" id="content" name="content" required></textarea>
                    </div>

                    <input type="hidden" value="<?= $result->getId(); ?>" name="chapter_id">

                    <div class="form-group">
                            <button class="submitBtn" name="envoyer" value="envoyer" type="submit">
                                Envoyer
                            </button>
                    </div>
                </form>
            </article>
        </div>
    </section>

<?php $content=ob_get_clean();?>
<?php require "src/View/template.php"; ?>

<script>

$('.cm-reportButton').click(function() {
if(confirm('Êtes-vous sûr.e de vouloir signaler ce commentaire ?')) {
return true;
} else {
return false;
}

});

</script>

