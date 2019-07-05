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
    <h4>Commentaires : </h4>
<section class="row">

    <?php foreach ($result->getComments() as $co): ?>
        <div class="col-sm-8 offset-sm-1">
            <p class="date">Commentaire posté le <?= $co->getCommentDate(); ?> : </p>
            <p class="username"><?= $co->getUsername(); ?></p>
            <p>
                <?php if ($co->getReported() == 1) :
                    echo '<i>Ce commentaire a été signalé, nous sommes en train de l\'analyser.</i>';
                else :
                echo htmlspecialchars($co->getContent());
                ?>
            </p>
            <a title="Signaler ce commentaire" href="http://localhost/projet3/signaler-commentaire/<?= $result->getId(); ?>-<?= $co->getId(); ?>" onclick="return confirm('Êtes-vous sûr.e de vouloir signaler ce commentaire ?')"> <i class="fas fa-exclamation-triangle"></i>
            </a>
            <?php endif; ?>
        </div>

    <?php endforeach; ?>

    <div class="col-sm-6">
        <h4>Publier un commentaire</h4>
        <article class="post">
            <form action='/chapter?id=<?= $chapter->getId(); ?>' method="post">
                <?php if (isset($errorsForm['insertion'])) :
                    echo '<div class="alert alert-danger mx-auto text-center" style="font-size: large"><b>' . $errorsForm['insertion'] . '</b></div>';
                elseif (isset($errorsForm['success'])) :
                    echo '<div class="alert alert-success mx-auto text-center" style="font-size: large"><b>' . $errorsForm['success'] . '</b></div>';
                endif; ?>
                <div class="form-group ">
                    <label class="control-label " for="username">Votre nom</label>
                    <input class="form-control
                                <?php if (isset($errorsForm['author'])) :
                        echo ' error-form';
                    endif; ?>"
                           id="username" name="username" type="text"
                           required
                        <?php if (isset($_POST['username'])) :
                            echo 'value="' . htmlspecialchars($_POST['username']) . '"';
                        endif; ?>/>
                    <?php if (isset($errorsForm['username'])) :
                        echo '<p class="error-text"> ' . $errorsForm['username'] . '</p>';
                    endif; ?>
                </div>
                <div class="form-group ">
                    <label class="control-label" for="comment">Commentaire</label>
                    <textarea class="form-control
                            <?php if (isset($errorsForm['comment'])) :
                        echo ' error-form';
                    endif; ?>"
                              id="comment" name="comment" required><?php if (isset($_POST['comment'])) :
                            echo htmlspecialchars($_POST['comment']);
                        endif; ?></textarea>
                    <?php if (isset($errorsForm['comment'])) :
                        echo '<p class="error-text"> ' . $errorsForm['comment'] . '</p>';
                    endif; ?>
                </div>
                <div class="form-group">
                    <div>
                        <button class="submitBtn" name="envoyer" value="envoyer" type="submit">
                            Envoyer
                        </button>
                    </div>
                </div>
            </form>
        </article>
    </div>
</section>

<?php
$content=ob_get_clean();
require "src/View/template.php";
?>