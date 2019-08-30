<?php ob_start(); ?>

<section class="col-sm-12 ">
    <h4>Commentaires à modérer</h4>
    <div id="content" class="row content">

        <?php foreach ($comments as $cr):?>
            <div class="col-sm-8 offset-sm-1">
                <p class="date">Commentaire posté le <?= $cr->getCommentDate(); ?> : </p>
                <p class="username"><?= htmlspecialchars($cr->getUsername()) ; ?></p>
                <p class="content"><?= htmlspecialchars($cr->getContent()) ; ?></p>
                <a title="Valider ce commentaire" href="<?= HOST ?>valider-commentaire/<?= $cr->getId(); ?>" onclick="return confirm('Êtes-vous sûr.e de vouloir valider ce commentaire ?')">
                    <i class="fas fa-check-circle"></i>
                </a>
                <a title="Modérer ce commentaire" href="<?= HOST ?>moderer-commentaire/<?= $cr->getId(); ?>" onclick="return confirm('Êtes-vous sûr.e de vouloir modérer ce commentaire ?')">
                    <i class="fas fa-times-circle"></i>
                </a>
            </div>
        <?php endforeach; ?>
</section>

<section class="col-sm-12 ">
    <h4>Commentaires refusés</h4>
        <div id="content" class="row content">

            <?php foreach ($commentsModerated as $cm):?>
                <div class="col-sm-8 offset-sm-1">
                    <p class="date">Commentaire posté le <?= $cm->getCommentDate(); ?> : </p>
                    <p class="username"><?= htmlspecialchars($cm->getUsername()) ; ?></p>
                    <p class="content"><?= htmlspecialchars($cm->getContent()) ; ?></p>
                    <a title="Valider ce commentaire" href="<?= HOST ?>valider-commentaire/<?= $cm->getId(); ?>" onclick="return confirm('Êtes-vous sûr.e de vouloir valider ce commentaire ?')">
                        <i class="fas fa-check-circle"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>



<?php $content=ob_get_clean();?>
<?php require "src/View/templateadmin.php"; ?>