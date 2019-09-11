<?php ob_start(); ?>

    <div id="content" class="row content">
        <section class="col-sm-9 ">
            <?php foreach($allChapters as $c): ?>

                <h4 class="chapter">Chapitre <?= $c->getChapterNumber(); ?></h4>
                <h5><?= $c->getTitle(); ?></h5>
                <p class="date">Publié le <?= $c->getCreationDate(); ?></p>
                <p class="chapter"><?= $c->getContent(); ?></p>

                <a title="Modifier ce chapitre" href="<?= HOST ?>modifier-chapitre/<?= $c->getId(); ?>" class="button">
                    <i class="far fa-edit"></i>
                    Modifier le chapitre
                </a>
                <a title="Supprimer ce chapitre" href="<?= HOST ?>supprimer-chapitre/<?= $c->getId(); ?> " class="button" onclick="return confirm('Êtes-vous sûr.e de vouloir supprimer ce chapitre ?')">
                    <i class="far fa-trash-alt"></i>
                    Supprimer le chapitre
                </a>
            <?php endforeach; ?>
        </section>

        <section class="col-sm-3">
            <a title="Nouveau chapitre" class="btn btn-info" href="<?= HOST ?>nouveau-chapitre/">
                <i class="far fa-file"></i>
                Nouveau chapitre
            </a>
        </section>
    </div>

<?php $content=ob_get_clean();?>
<?php require "src/View/templateadmin.php"; ?>
